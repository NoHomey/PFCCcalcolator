**Ivo Stratev, Borislav Stratev.**

**Project is named PFCCcalcolator.**

> PFCCcalcalcolator stands for Protein, Fat & Carbs. Calorie calcolator.

> The Purpose of this project is to make calcolations based on:

> Protein, Fat & Carbs. Calories for multiple foods.

**Project start date: 18.02.2015-10:36:01.**

**Project is developed by Team Project.**

> The rights for the code in this repository and for final & staged product are held by:

> Ivo Stratev:

>     The creator of the idea for this project and this repository.
        
        
# How to setup locally:

**If you have *LAMP (Linux, Apache, MySQL and PhpMyAdmin)* and seted *Virtual Host* on your machine go to *How to run locally* part :**

**Else :**
    
**Run the following set of commands in order to install *LAMP (Linux, Apache, MySQL and PhpMyAdmin)* on your machine :**

**Press *Y* everytime you are asked to install extra pakages***
    
> sudo apt-get update

> sudo apt-get upgrade

> sudo apt-get install apache2

> sudo apt-get install mysql-server mysql-client

***Eneter new password for MySQL***

***Repeat it***

> sudo apt-get install phpmyadmin

***Press Enter when asked:  Configure database for phpmyadmin with dbconfig-common?***

***Enter the same password you used for MySQL***

***Renter the same password***

***Reneter it one more time***

***Press Enter when asked:  Configure database for phpmyadmin with dbconfig-common?***
    
> sudo apt-get install php5 libapache2-mod-php5

> sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin

**Run the following set of commands in order to *Create new Virtual Host* on your machine :** 

> sudo mkdir -p /var/www/pfcccalcolator.com/public_htmл 

> sudo chown -R $USER:$USER /var/www/pfcccalcolator.com/public_html

> sudo chmod -R 755 /var/www

> sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/server_name.conf

> sudo nano /etc/apache2/sites-available/pfcccalcolator.com.conf
    
**Write the following lines to the file:**

> ServerAdmin admin@pfcccalcolator.com

> ServerName pfcccalcolator.com

> ServerAlias www.pfcccalcolator.com

> DocumentRoot /var/www/pfcccalcolator.com/public_html

> ErrorLog ${APACHE_LOG_DIR}/error.log

> CustomLog ${APACHE_LOG_DIR}/access.log combined

**Press *Ctrl+o* to acces saving**

**Press *Enter* to save it***

**Press *Ctrl+x* to exit**
        
**Run the following set of commands in order to allow the *Virtual Host* on your machine :**        
        
> sudo a2ensite pfcccalcolator.com.conf

> sudo cp /etc/apache2/sites-available/pfcccalcolator.com.conf /etc/apache2/sites-available/000-default.conf

> sudo nano /etc/hosts

**Add the following line :**    
        
> your_ip_adress  pfcccalcolator.com

**If you dont know *your ip adress* Run the following command :**

> ifconfig 

**If you are on ethernet conection look for :**

> eth0

>  inet addr:***.***.*.***

**Else look for :**

> wlan0

>  inet addr:***.***.*.***

**Everytime you eccounter *your_ip_adress* write those: ***.***.*.*** !!!**

**Press *Ctrl+o* to acces saving**

**Press *Enter* to save it***

**Press *Ctrl+x* to exit**
        
**Run the following command in order to configure as global your *Virtual Host* on your *Apache2* server :**       

> sudo nano /etc/apache2/apache2.conf

**Add following lines on top of the file :**    
    
> ServerName pfcccalcolator.com

> DocumentRoot "/var/www/pfcccalcolator.com/public_html"

> Include /etc/phpmyadmin/apache.conf

**Press *Ctrl+o* to acces saving**

**Press *Enter* to save it***

**Press *Ctrl+x* to exit**

**Run the following set of commands in order to secure, configure, create new priveleged  user & test if everything is OK with *MySQL* on your machine :**

> mysql -u root -p

***Enter password***

***From here enter the following lines in your *mssql* console :**

> CREATE USER 'user'@'pfcccalcolator.com' IDENTIFIED BY '*HERE ENTER THE PASSWORD YOU WANT TO BE USED FOR THAT USER!!!*';

> GRANT ALL PRIVILEGES ON *.* TO 'user'@'pfcccalcolator.com'

> WITH GRANT OPTION;

> CREATE USER 'user'@'%' IDENTIFIED BY '*HERE ENTER THE PASSWORD YOU WANT TO BE USED FOR THAT USER!!!*';

> GRANT ALL PRIVILEGES ON *.* TO 'user'@'%'

> WITH GRANT OPTION;

**The Console log should look like this :**

> mysql> CREATE USER 'user'@'pfcccalcolator.com' IDENTIFIED BY 'some_pass';

> mysql> GRANT ALL PRIVILEGES ON *.* TO 'monty'@'pfcccalcolator.com'

>       ->     WITH GRANT OPTION;

> mysql> CREATE USER 'user'@'%' IDENTIFIED BY 'some_pass';

> mysql> GRANT ALL PRIVILEGES ON *.* TO 'user'@'%'

>       ->     WITH GRANT OPTION;

**Press *Ctrl+c* to exit** 
        
> sudo nano /etc/mysql/my.cnf
  
**Change the line *bind-adress      = 127.0.0.1* :**

Before: | After:
------------ | ---
bind-adress      = 127.0.0.1 | bind-adress      = your_ip_adress

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**

**Run the following set of commands in order to secure &  configure *PhpMyAdmin* on your machine :**

> sudo php5enmod mcrypt

> sudo nano /etc/phpmyadmin/config.inc.php

**Change the line *$dbserver = 'localhost';* :**

Before: | After:
------------ | ---
$dbserver = 'localhost'; | $dbserver = 'pfcccalcolator.com';

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**

> sudo nano /etc/phpmyadmin/config-db.php

**Change the line $dbuser = 'phpmyadmin'; or $dbuser = 'root';* :**

Before: | After:
------------ | ---
$dbuser = 'phpmyadmin'; or $dbuser = 'root' | $dbuser = 'user';

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**
    
**Run the following set of commands to restart *MySQL* and *Apach2* servers :**
        
> sudo service apache2 restart

> sudo service mysql restart

> mysql -u user -h 'pfcccalcolator.com' -p  

***Enter password***

**Pres *Ctrl + c* to exit***

**I my self *Ivo Stratev* reinstalled and reconfigured all following previus steps twice and i had no problem under *Ubuntu 14.04.02 LTS* OS**

**If any error ocure during the installaion or setup please search them and try to fix them if you can!**
    
# How to run locally :   
    
**Navigate to */var/www/ppfcccalcolator.com/public_html* folder** 

**Copy all the files from the repository folder *Project* in */var/www/ppfcccalcolator.com/public_html** folder*
    
**Open Borser and Type *pfcccalcolator.com* in adress field**

**Do the same with *pfcccalcolator.com*/phpmyadmin**

**Login with :**

**Username:**

> user

**Password:**

> The password you set when you created the user 'user'

**Click**

> Go


**Both should work!**

**If they dont work search the errors you get!!!**

**Now import database using the *phpmyadmin* from browser**

**Now return to *pfcccalcolator.com* and you are ready to go**

# How to reinstall locall setup of LAMP :

**Run the following two commands :**

> sudo apt-get purge apache2 php5-cli apache2-mpm-prefork apache2-utils apache2.2-common libapache2-mod-php5 libapr1 libaprutil1 libdbd-mysql-perl libdbi-perl libnet-daemon-perl libplrpc-perl libpq5 mysql-client mysql-common mysql-server php5-common php5-mysql phpmyadmin

> sudo apt-get autoremove

**And now follow the *How to setup locally* section**

# Login:

**The login is a copy of *https://github.com/panique/php-login-minimal* distibuted under MIT LICENSE**