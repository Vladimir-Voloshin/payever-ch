install
=================

Installation via composer.
After composer downloads all the libs needed, launch
`php bin/console doctrine:migrations:migrate`
Then from root folder under superuser: 
`setfacl -R -m u:apache:rwx -m u:your_username:rwx var/cache var/logs
setfacl -dR -m u:apache:rwx -m u:your_username:rwx var/cache var/logs`