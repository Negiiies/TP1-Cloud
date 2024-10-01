# Utiliser une image de base d'Ubuntu
FROM ubuntu:latest

# Installer Apache et PHP
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql && \
    apt-get clean

# Copier les fichiers index.html et db.php dans le répertoire racine d'Apache
COPY ./index.html /var/www/html/
COPY ./db.php /var/www/html/

# Ouvrir le port 80 pour Apache
EXPOSE 80

# Démarrer Apache au démarrage du conteneur
CMD ["apachectl", "-D", "FOREGROUND"]
