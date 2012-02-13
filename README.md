DOCUMENTACION

Instalacion Servidor
====================

Instalacion y configuracion PGSQL y POSTGIS
===========================================

sudo apt-get install postgresql-8.4-postgis git openssh-server apache2 phppgadmin

nano /etc/apache2/conf.d/phppgadmin

cambiar: 
#allow from 127.0.0.0/255.0.0.0 ::1/128
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



