### \# Module 1: Persistance des données

##### 

##### \## Objectifs



Mettre en place un conteneur PostgreSQL avec contraintes de production et vérifier la persistance des données.



##### \## Commandes exécutées

```bash

\# Création du conteneur avec contraintes production

docker run -d \\

&nbsp; --name tp-postgres \\

&nbsp; -p 2345:5432 \\

&nbsp; -e POSTGRES\_DB=mobile\_backend\_db \\

&nbsp; -e POSTGRES\_USER=admin \\

&nbsp; -e POSTGRES\_PASSWORD=securePass123 \\

&nbsp; --memory="50m" \\

&nbsp; --cpus="1.0" \\

&nbsp; -v "$(pwd)/db\_data:/var/lib/postgresql/data" \\

&nbsp; postgres:15



\# Création table mobile\_sessions

CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

CREATE TABLE mobile\_sessions (

&nbsp;   device\_id UUID NOT NULL PRIMARY KEY,

&nbsp;   model\_name varchar(100) NOT NULL,

&nbsp;   last\_login TIMESTAMP DEFAULT CURRENT\_TIMESTAMP

);



\# Insertion données test

INSERT INTO mobile\_sessions (device\_id, model\_name) 

VALUES (gen\_random\_uuid(), 'Android Device 1');



##### 

##### **Résultats obtenus**

* &nbsp;Conteneur PostgreSQL fonctionnel sur port 2345
* &nbsp;Table mobile\_sessions créée avec colonnes requises
* &nbsp;Extension uuid-ossp activée pour génération UUID
* &nbsp;Persistance des données vérifiée après redémarrage
* &nbsp;Respect des limites ressources: 19.07MiB/50MiB (38.15%)





#### **Réponses aux questions du TP**



1\. Où sont physiquement stockées les données actuelles ?



Les données sont stockées dans le volume Docker db\_data mappé au répertoire local ./db\_data/.



2\. Que constatez-vous concernant les données après suppression/re-création ?



Avec volume (-v): Les données persistent dans le dossier db\_data.

Sans volume: Les données seraient perdues à la suppression du conteneur.



3\. Analyse des métriques docker stats



CPU %: 0.04% (utilisation processeur minimale)



MEM USAGE/LIMIT: 19.07MiB / 50MiB (dans les limites)



MEM %: 38.15% (pourcentage mémoire utilisée)



NET I/O: 1.17kB reçu / 126B envoyé (trafic réseau)



BLOCK I/O: 0B lu / 4.1kB écrit (activité disque)







