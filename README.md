# Ivo Stratev, Borislav Stratev.

## Project is named PFCCcalcolator.
         PFCCcalcalcolator stands for Protein, Fat & Carbs. Calorie calcolator.
    The Purpose of this project is to make calcolations based on:
        Protein, Fat & Carbs. Calories for multiple foods.

### Project start date: 18.02.2015-10:36:01.

#### Project is developed by Team Project.
    The rights for the code in this repository and for final & staged product are held by:

    Ivo Stratev:
        The creator of the idea for this project and this repository.
        
        
# How to install and run locally:
    
**Run the following set of commands in order to install *LAMP (Linux, Apache, MySQL and PHPmyAdmin)* on your machine :**
    
> sudo apt-get update

> sudo apt-get upgrade

> sudo apt-get install apache2

> sudo apt-get install mysql-server mysql-client

> sudo apt-get install phpmyadmin

> sudo apt-get install php5 libapache2-mod-php5

> sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin

**Run the following set of commands in order to secure, configure, create new priveleged  user & test if everything is OK**

> sudo mysql_install_db

> sudo /usr/bin/mysql_secure_installation

> mysql -u root -p

> mysql -u user -h 'server_name' -p  

**Press *Ctrl+c* to exit** 

> sudo dpkg-reconfigure phpmyadmin

> sudo php5enmod mcrypt

> sudo dpkg-reconfigure mysql-server-5.5


    
        

        sudo mkdir -p /var/www/server_name.com/public_htmlmkdir 
        sudo chown -R $USER:$USER /var/www/server_name.com/public_html
        sudo chmod -R 755 /var/www
        sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/server_name.conf
        sudo nano /etc/apache2/sites-available/server_name.conf
    
**ReWrite the file to this:**

> ServerAdmin admin@pfcccalcolator.com

> ServerName pfcccalcolator.com

> ServerAlias www.pfcccalcolator.com

> DocumentRoot /var/www/pfcccalcolator.com/public_html

> ErrorLog ${APACHE_LOG_DIR}/error.log

> CustomLog ${APACHE_LOG_DIR}/access.log combined

    	    
**Press *Ctrl+o* to save it**
**Press *Ctrl+x* to exit**
        
        
        
    sudo a2ensite server_name.conf
    ifconfig
    sudo nano /etc/hosts
    
    
        Add:
            ip  server_name
            
        press Ctrl+o followed by Ctrl+x
        
        
        
    sudo nano /etc/mysql/my.cnf
    
        Change: bind-adress      = 'localhost'
            To: bind-adress      = ip
        press Ctrl+o followed by Ctrl+x
        
        
    sudo nano /etc/apache2/sites-enabled/000-default.conf
    
        Write the following:
        
        
            ServerAdmin admin@pfcccalcolator.com
        	ServerName pfcccalcolator.com
        	ServerAlias www.pfcccalcolator.com
        	DocumentRoot /var/www/pfcccalcolator.com/public_html
        	ErrorLog ${APACHE_LOG_DIR}/error.log
    	    CustomLog ${APACHE_LOG_DIR}/access.log combined
    	    
    	  press Ctrl+o followed by Ctrl+x
    	  
    	  
    sudo nano /etc/apache2/apche2.conf
    
    
        Add following lines:
            ServerName pfcccalcolator.com
            DocumentRoot "/var/www/pfcccalcolator.com/public_html"
            Include /etc/phpmyadmin/apache.conf
            
            
        press Ctrl+o followed by Ctrl+x
        
        
    sudo nano /etc/phpmyadmin/config.inc.php
    
        Change $dbserver = 'localhost';
            To: $dbserver = 'pfcccalcolator.com';
            
        press Ctrl+o followed by Ctrl+x
        
        
    sudo nano /etc/phpmyadmin/config-db.php
    
    
        Change $dbuser = 'root';
            To: $dbuser = 'user';
            
        press Ctrl+o followed by Ctrl+x
        
        
    sudo service apache2 restart
    sudo service mysql restart
    
    
    
    Open Borser and Type your ip in adress field
    Do the same with ip/phpmyadmin
    Both should work if not search the  errors you get!
    Now import database using the phpmyadmin from browser
    Now return to your ip and you are ready to go.