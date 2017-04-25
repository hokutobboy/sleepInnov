# sleepInnov : Stockage et affichage de données médicales

### 1 : Proposer une structure de BDD permettant de répondre à ce besoin fonctionnel
![Screenshot](MLD.jpg)
### 2 : Quel moteur de BDD pour y stocker les données ? Pourquoi ?
Je proposerai InnoDB (sous MySQL), PostgreSQL ou SQLite, car open source, largement documentés et éprouvés
### 3 : Requête SQL pour la page "Journée d'un appareil"
```sql
select r.id AS reportId, r.created_at,
    (select COUNT(id) from measurement where report_id = r.id) as nbreMesures,
    SUM(CASE WHEN m.duration IS NOT NULL 
       THEN m.duration
       ELSE r.default_duration END) AS totalDuration
from report r
left join measurement m on m.report_id = r.id
where r.device_id = 57
and r.created_at LIKE '2017-02-23%'
group by r.id;
```

**Notes :** *pour cette requête, je pars du principe que l'ID du DM est connu (#57 dans cet exemple), ainsi que la date (envoyés au controlleur via la requête HTTP, par exemple)*

**TODO :** *Par manque de temps (et aussi d'expertise), je ne ramène pas les moyennes des valeurs [a, ..., g] pondérées par la durée de chaque mesure.
Pour être tout à fait honnête, j'évite tant que possible d'effecteur ce genre de calculs directement en SQL et préfère généralement opérer côté applicatif, si l'impact en termes de ressources n'est pas trop important.*

### 4 : Requête SQL pour la page "Journée d'un appareil"
```sql
select m.id as measurementId,
    m.a, m.b, m.c, m.d, m.e, m.f, m.g, 
    (CASE WHEN m.duration IS NOT NULL 
       THEN m.duration
       ELSE r.default_duration END) AS duration
from report r
left join measurement m on m.report_id = r.id
where r.id = 1
group by m.id;
```

**Notes :** *Pour cette requête je pars du principe que l'ID du rapport est connu (#1 dans cet exemple). Ces paramètres peuvent être passés directement dans l'en-tête de la requête HTTP (GET ou POST). On pourrait, bien entendu, filter sur le l'id du DM et la date/heure de création du rapport, en remplaçant "r.id = 1" par "where r.device_id = 57 and r.created_at = '2017-02-23 23:07:18'"*

### 5 : Code PHP pour le tableau de la page "Rapport d'un appareil"
- Voir action adminReportAction($id) du controleur "[ApplitestController](https://github.com/hokutobboy/sleepInnov/blob/master/Application/Controller/ApplitestController.php#L15)"
- Les tables "Device", "Report" et "Measurement" ont été mappées avec Doctrine (v 2.5.6)
- Je pars du principe que comme l'utilisateur vient de cliquer sur un lien (de la page "Journée d'un appareil") correspondant à un et un seul rapport (on affiche son heure de création, mais on connait son id au moment de l'affichage). L'URL appelée est donc de type "http://mon.domaine.com/applitest/report/1" (La valeur "1" correspondant à l'id du rapport sur lequel l'utilisateur vient de cliquer

### 6 : Les choix proposés sont ils optimaux en termes de performances (Lecture, écriture, recherche...) ? Pourquoi ?
- Si par "les choix proposés" on entendait le fait de lancer directement une (ou plusieurs) requête(s), à partir du controleur, pour obtenir un tableau de tableaux, alors non car ça génèrerais dans tous les cas une surconsommation de ressources sur le serveur de BDD
- La solution que je propose n'est pas optimale non plus, car il me paraît inutile, voire contreproductif, de convertir la collection d'objets Doctrine "Report->Measurements" en tableau de tableaux. Il serait beaucoup plus pertinent de ne passer que le tableau d'objets "Measurements" à la vue
- Comme évoqué plus haut, la cinématique d'utilisation décrite dans l'énoncé ne justifie pas l'exploitation de requêtes SQL complexes et laborieuses à exécuter côté BDD (sauf peut être pour ce qui est des moyennes pondérées). Puisqu'on part d'un appareil (Device) pour aller vers une journée (ensemble de "Report"), puis une heure précise (Report + Measurements associés), le "lazyloading" est pour ainsi dire "naturel".
