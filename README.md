# 1- Creation de projet symfony 

### symfony new TestTechnique --webapp

# 3- choix de plugin d'authentification

utilisations de composant symfony security en fait make:user et make:auth pour definir un authenticator , dans le security.yaml faut definir la access roles , ce composant utilise le firewall main pour authentifier les user .


# 5- Choix de plugin de pagination 

utilisation de plugin knppaginatorbundle c'est assez riche de functionnalite  et on peut le configurer pour render custom 

composer require knplabs/knp-paginator-bundle


# 6- Test Unitaire avec PHPUNIT

run this command for testing sone test added to the facture entity 

php bin/phpunit

#7- Installation de l'application

1-faire git clone for this projet 
git clone https://github.com/fadhelali1996/TestTechnique.git

2-in TestTechnique directory run

composer install

3- verifier les information de .env file pour les informations de base de donnee , j'ai utiliser une base de donnee mysql 

4- run projet with symfony serve -d 

#8- dockeriser l'application symfony :

vous pouvez executer une base de donnee ou niveau d'un container par exempe , il faut modifier le fichier docker-compose.yaml  pour ajouter ce features , on peut aussi ajouter des container pour effectuee de test (unitaire, fonctionnel,regression,non fonctionnel,TDD) ,executer des container pour l'analyse static de code avec PHPSTAN et container pour la verification de regle de codoage par PHPCS

