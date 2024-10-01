#!/bin/bash
docker build -t image_ubuntu .

# Créer un réseau Docker personnalisé
docker network create my_network

# Lancer les trois conteneurs et les connecter au réseau
docker run -d --name first_container --network my_network image_ubuntu
docker run -d --name second_container --network my_network image_ubuntu
docker run -d --name third_container --network my_network image_ubuntu

echo "Les trois conteneurs sont en cours d'exécution et connectés au réseau 'my_network'"
