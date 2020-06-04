# NITS-SITE-initial
For Xampp:
Just create a database named nitAdmin and import the nitAdmin.sql file

For Manual:
create database named nitAdmin and grant all privileges to user(=root atm and no password) and flush privileges. import the nitAdmin.sql file to this database.
Currently connection to mysql involves only connecting to the root on the connection.php files. The user and password should be changed in the connection.php according to database users required.
