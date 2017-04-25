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
group by r.id
```
### 4 : Requête SQL pour la page "Journée d'un appareil"
