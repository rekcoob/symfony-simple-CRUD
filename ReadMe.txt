# check if composer is installed
Composer

# create projects without binary - server,...
composer create-project symfony/skeleton my_project_name


#create routes anotations
composer require annotations

#bundle that allows us to use GET, POST, .. methods - installed with anotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

# twig template bundle
composer require twig
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#doctrine 
composer require doctrine maker

#change username, password and dbname in .env file
php bin/console doctrine:database:create

php bin/console make:entity Post

#generate new table
php bin/console doctrine:migrations:diff

#make migration
php bin/console doctrine:migrations:migrate

# if need to add column - fix entity -> diff and then migrate

# add form
composer require symfony/form


