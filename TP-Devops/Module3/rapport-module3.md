

\# Module 3: Conteneurisation de l'API (Dockerfile)



\## Dockerfile créé

```dockerfile

FROM php:8.2-apache



\# Install MySQL PDO extension

RUN docker-php-ext-install pdo pdo\_mysql



\# Enable Apache mod\_rewrite

RUN a2enmod rewrite



\# Copy application files

COPY . /var/www/html/



\# Set proper permissions

RUN chown -R www-data:www-data /var/www/html



EXPOSE 80



###### **Construction de l'image**



docker build -t mobile-php-api:latest .



Résultat: Image de 708MB compressée à 176MB avec cache Docker fonctionnel.



##### 

##### **Automatisation du build**



Trois scripts créés pour différentes plateformes: build.ps1 -- build.bat -- build.sh

