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
    
> sudo apt-get update

> sudo apt-get upgrade

> sudo apt-get install apache2

> sudo apt-get install mysql-server mysql-client

> sudo apt-get install phpmyadmin

> sudo apt-get install php5 libapache2-mod-php5

> sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin

**Run the following set of commands in order to *Create new Virtual Host* on your machine :** 

> sudo mkdir -p /var/www/server_name.com/public_htmlmkdir 

> sudo chown -R $USER:$USER /var/www/server_name.com/public_html

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

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**
        
**Run the following set of commands in order to allow the *Virtual Host* on your machine :**        
        
> sudo a2ensite pfcccalcolator.com.conf

> sudo cp /etc/apache2/sites-available/server_name.conf /etc/apache2/sites-available/000-default.conf


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

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**
        
**Run the following command in order to configure as global your *Virtual Host* on your *Apache2* server :**       

> sudo nano /etc/apache2/apche2.conf

**Add following lines on top of the file :**    
    
> ServerName pfcccalcolator.com

> DocumentRoot "/var/www/pfcccalcolator.com/public_html"

> Include /etc/phpmyadmin/apache.conf

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**

**Run the following set of commands in order to secure, configure, create new priveleged  user & test if everything is OK with *MySQL* on your machine :**

> sudo mysql_install_db

> sudo /usr/bin/mysql_secure_installation

> sudo dpkg-reconfigure mysql-server-5.5

> mysql -u root -p

***Enter password***

***From here enter the following lines in your *mssql* console :**

> CREATE USER 'user'@'pfcccalcolator.com' IDENTIFIED BY '*HERE ENTER THE PASSWORD YOU WANT TO BE USED FOR THAT USER!!!*';

> GRANT ALL PRIVILEGES ON *.* TO 'user'@'pfcccalcolator.com'

> WITH GRANT OPTION;

> CREATE USER 'pfcccalcolator.com'@'%' IDENTIFIED BY '*HERE ENTER THE PASSWORD YOU WANT TO BE USED FOR THAT USER!!!*';

> GRANT ALL PRIVILEGES ON *.* TO 'user'@'%'

> WITH GRANT OPTION;

**The Console log should look like this :**

> mysql> CREATE USER 'user'@'pfcccalcolator.com' IDENTIFIED BY 'some_pass';

> mysql> GRANT ALL PRIVILEGES ON *.* TO 'monty'@'pfcccalcolator.com'

>       ->     WITH GRANT OPTION;

> mysql> CREATE USER 'user'@'%' IDENTIFIED BY 'some_pass';

> mysql> GRANT ALL PRIVILEGES ON *.* TO 'user'@'%'

>       ->     WITH GRANT OPTION;

> mysql -u user -h 'pfcccalcolator.com' -p  

***Enter password***

**Press *Ctrl+c* to exit** 
        
> sudo nano /etc/mysql/my.cnf
  
**Change the line *bind-adress      = 'localhost'* :**

Before: | After:
------------ | ---
bind-adress      = 'localhost' | bind-adress      = your_ip_adress

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**

**Run the following set of commands in order to secure &  configure *PhpMyAdmin* on your machine :**

> sudo dpkg-reconfigure phpmyadmin

> sudo php5enmod mcrypt

> sudo nano /etc/phpmyadmin/config.inc.php

**Change the line *$dbserver = 'localhost';* :**

Before: | After:
------------ | ---
$dbserver = 'localhost'; | $dbserver = 'pfcccalcolator.com';

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**

> sudo nano /etc/phpmyadmin/config-db.php

**Change the line $dbuser = 'root';* :**

Before: | After:
------------ | ---
$dbuser = 'root'; | $dbuser = 'user';

**Press *Ctrl+o* to save it**

**Press *Ctrl+x* to exit**
    
**Run the following set of commands to restart *MySQL* and *Apach2* servers :**
        
> sudo service apache2 restart

> sudo service mysql restart

**If any error ocure during the installaion or setup please search them and try to fix them if you can!**
    
# How to run locally :   
    
**Open Borser and Type *pfcccalcolator.com* in adress field**

**Do the same with *pfcccalcolator.com*/phpmyadmin**

**Both should work!**

**If they dont work search the errors you get!!!**


**Now import database using the *phpmyadmin* from browser**

**Now return to *pfcccalcolator.com* and you are ready to go**