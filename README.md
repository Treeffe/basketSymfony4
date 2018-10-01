# Projet : Apprentissage Symphony4

Dans certain cas possible que les dump ne fonctionne pas. Changer la longueur de l'email 
(la mettre par exemple à 150 au lieu de 255)

Pour la communication à la base modifier le security.yml ainsi que .env (DATABASE_URL)
ainsi que les fichiers du dossier db destiné à l'importation des dumb de la bdd

Enfin les commande suivante permettront un mapping entre le code et la bdd

creation de la BDD ==>  php bin/console doctrine:database:create

sauvegarder la migration : php bin/console doctrine:migration:diff *********
 php bin/console doctrine:migration:migrate 

Ceci est un squelette d'une application et l'initiation à un framework en autodidactie 

use Doctrine\ORM\Mapping\ManyToOne; ******  use Doctrine\ORM\Mapping\JoinColumn;    Permet
d'utiliser les clé étrangére

update bdd to entity : php bin/console doctrine:schema:update --force

update entity to bdd : php bin/console doctrine:generate:entity 
(pas encore utilisé donc est ce vraiment le cas. ??)

Initialiser apache : php -S 127.0.0.1:8000 -t public/

via xamp htdocs windows: (httpd-vhosts.conf)
virtualhost : 
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/basketSymfony4/public"
    ServerName basketSymfony.local
</VirtualHost>

C:\Windows\System32\drivers\etc --- hosts
127.0.0.1 basketSymfony.local





                   
