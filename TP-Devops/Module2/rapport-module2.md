

\# **Module 2: Orchestration (Docker Compose - Partie 1)**



\## Découverte de l'API Backend

\*\*Technologie identifiée\*\*: PHP/MySQL  

\*\*Structure\*\*:

\- `connect.php` - Connexion base de données

\- `functions.php` - Fonctions utilitaires API

\- `studentAPI/` - Endpoints REST étudiants



\*\*Points d'entrée API\*\*:

\- `addStudent.php` - Ajouter étudiant

\- `viewAllStudents.php` - Lister étudiants

\- `updateStudent.php` - Modifier étudiant

\- `removeStudent.php` - Supprimer étudiant



**## Configuration Docker Compose**

Fichier `docker-compose.yml` initial:

```yaml

services:

&nbsp; database:

&nbsp;   image: mysql:8

&nbsp;   environment:

&nbsp;     MYSQL\_DATABASE: ouareddb

&nbsp;     MYSQL\_USER: admin

&nbsp;     MYSQL\_PASSWORD: securePass123

&nbsp;   ports: \["3306:3306"]

&nbsp;   networks: \[mobile-network]





##### **Problèmes rencontrés et solutions**

1\. Erreur OOM (Out Of Memory)

Symptôme: MySQL tué avec code 137 pendant l'initialisation

Cause: Limite mémoire 50MB insuffisante pour MySQL 8

Solution: Augmentation à 300MB dans deploy.resources.limits.memory



2\. Option MySQL obsolète

Symptôme: unknown variable 'default-authentication-plugin=mysql\_native\_password'

Solution: Retrait de l'option (MySQL 8 utilise caching\_sha2\_password par défaut)



Test de l'API sans base de données

Question TP: "Pourquoi, sans la base de données lancée, le statut de l'application est-il en erreur ?"

Réponse:

L'API PHP (connect.php) tente une connexion PDO immédiate à MySQL au démarrage.

Sans le conteneur MySQL en cours d'exécution, la connexion échoue avec l'erreur "Connection refused", provoquant une exception PDO qui empêche le fonctionnement normal de l'API.



Preuve:

Lors du test curl http://localhost:8080/connect.php sans MySQL:



Erreur: "Connection failed: could not find driver" (avant correction)



Erreur: "Connection failed: Connection refused" (après correction driver)



## Approche adoptée
Plutôt que de créer un docker-compose.yml minimal (uniquement la base de données) puis l'enrichir,
j'ai directement créé la version complète avec les deux services car:

1. **Problème de dépendance**: L'API PHP nécessite l'extension PDO MySQL
2. **Solution intégrée**: Le Dockerfile doit être créé pour résoudre ce problème
3. **Efficacité**: Configuration complète testée dès le début

**Note**: Normalement, le TP suggère de:
- Module 2: docker-compose.yml avec uniquement la base
- Module 4: Ajout du service API

Dans mon cas, les deux étapes ont été fusionnées pour résoudre le problème technique rencontré.

