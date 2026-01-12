\## État: COMPLET (réalisé dans Module 2)



\### Contexte

Le travail du Module 4 (ajout du service API à docker-compose.yml) a été réalisé 

dès le Module 2 pour les raisons suivantes:



1\. \*\*Dépendance technique\*\*: L'API PHP nécessitait le Dockerfile pour installer PDO MySQL

2\. \*\*Test intégré\*\*: Impossible de tester l'API sans le service database configuré

3\. \*\*Approche pragmatique\*\*: Résolution du problème "could not find driver" nécessitait 

&nbsp;  une configuration complète



\### Vérifications Module 4 réalisées

Même si le docker-compose.yml complet a été créé plus tôt, les vérifications 

requises pour Module 4 ont été effectuées:

\- ✅ Communication réseau PHP → MySQL

\- ✅ Configuration réseau privé `mobile-network`

\- ✅ Dépendance `depends\_on: database`

\- ✅ Test complet du système

##### **Configuration reseau**



###### **Réseau privé Docker**



Nom: mobile-network (type bridge)



Isolation: Services isolés du réseau hôte



DNS interne: Résolution par nom de service



###### **Communication entre services**



PHP → MySQL: Utilise le nom database (DNS Docker)

MySQL → PHP: Utilise le nom php-backend

