# Utiliser une image officielle MySQL
FROM mysql:latest

# Copier le script SQL
COPY init.sql /docker-entrypoint-initdb.d/

# Définir des variables d'environnement pour MySQL
ENV MYSQL_ROOT_PASSWORD=root_password
ENV MYSQL_DATABASE=my_database
ENV MYSQL_USER=user
ENV MYSQL_PASSWORD=password

# Ouvrir le port 3306 pour MySQL
EXPOSE 3306
