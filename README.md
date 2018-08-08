# Projet : Apprentissage Symphony4

Dans certain cas possible que les dump ne fonctionne pas. Changer la longueur de l'email 
(la mettre par exemple à 150 au lieu de 255)

Pour la communication à la base modifier le security.yml ainsi que .env (DATABASE_URL)
ainsi que les fichiers du dossier db destiné à l'importation des dumb de la bdd

Enfin les commande suivante permettront un mapping entre le code et la bdd

php bin/console doctrine:migration:diff ********* php bin/console doctrine:migration:migrate 

Ceci est un squelette d'une application et l'initiation à un framework en autodidactie 


                   