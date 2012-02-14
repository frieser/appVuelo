DOCUMENTACION
=============
Instalacion Servidor
--------------------

Instalacion y configuracion PGSQL y POSTGIS
-------------------------------------------

sudo apt-get install postgresql-8.4-postgis git openssh-server apache2 phppgadmin

nano /etc/apache2/conf.d/phppgadmin

cambiar(comentar/descomentar): 
allow from 127.0.0.0/255.0.0.0 ::1/128
por:
allow from all

su posgres
pgsql
alter user postgres with password 'clave';

nano /etc/phppgadmind/config.inc.php

Se sustituye el valor true por false en $conf['extra_login_security'] = false;

/etc/init.d/apache2 restart
/etc/init.d/postgresql restart


createdb -U postgres vuelo

createlang -U postgres plpgsql vuelo

psql -U postgres -f /usr/share/postgresql/8.4/contrib/postgis-1.5/postgis.sql vuelo

psql -U postgres -f /usr/share/postgresql/8.4/contrib/postgis-1.5/spatial_ref_sys.sql vuelo

Instalacion y configuracion de symfony
--------------------------------------

cp /etc/apache2/sites-available/default /etc/apache2/sites-available/appvuelo

cambiar la ruta a la aplicacion

a2dissite default

a2ensite appvuelo

/etc/init.d/apache2 restart

chmod -R 777 app/cache/ app/logs/


nano /etc/php5/apache2/php.ini

date.timezone = Europe/Madrid
short_open_tag = Off

apt-get install php5-sqlite php-apc php5-intl

/etc/init.d/apache2 restart

datos configuracion symfony
[parameters]
    database_driver="pdo_pgsql"
    database_host="localhost"
    database_port=""
    database_name="vuelo"
    database_user="posgres"
    database_password="clave"
    mailer_transport="smtp"
    mailer_host="localhost"
    mailer_user=""
    mailer_password=""
    locale="en"
    secret="token"

