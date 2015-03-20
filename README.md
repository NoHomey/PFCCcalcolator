Ivo Stratev, Borislav Stratev.

Project is named PFCCcalcolator.

PFCCcalcalcolator stands for Protein, Fat & Carbs. Calorie calcolator.

    The Purpose of this project is to make calcolations based on:
        Protein, Fat & Carbs. Calories for multiple foods.


Project start date: 18.02.2015-10:36:01.

Project is developed by Team Project.
The rights for the code in this repository and for final & staged product are held by:

    Ivo Stratev:
        The creator of the idea for this project and this repository.
        
        
How to install and run locally:

    run sudo apt-get update
    sudo apt-get install apache2
    run sudo apt-get install php5 libapache2-mod-php5
    run sudo apt-get install mysql-server mysql-client
    run sudo mysql_install_db
    run /usr/bin/mysql_secure_installation
        set pswd
    run sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin
    run sudo dpkg-reconfigure mysql-server-5.5
    run  mysql -u root -p
        Enter pswd
            create new user at server_name and grant priveleges
    run mysql -u user -h 'server_name' -p      
    run sudo apt-get install phpmyadmin
    run sudo dpkg-reconfigure phpmyadmin
    run sudo php5enmod mcrypt
    run sudo mkdir -p /var/www/server_name.com/public_htmlmkdir 
    run sudo chown -R $USER:$USER /var/www/server_name.com/public_html
    run sudo chmod -R 755 /var/www
    run sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/server_name.conf
    run nano /etc/apache2/sites-available/server_name.conf
       Write the following:
            ServerAdmin admin@pfcccalcolator.com
        	ServerName pfcccalcolator.com
        	ServerAlias www.pfcccalcolator.com
        	DocumentRoot /var/www/pfcccalcolator.com/public_html
        	ErrorLog ${APACHE_LOG_DIR}/error.log
    	    CustomLog ${APACHE_LOG_DIR}/access.log combined
    	        press Ctrl+o followed by Ctrl+x
    run sudo a2ensite server_name.conf
    run ifconfig
    run sudo nano /etc/hosts
        Add:
            ip  server_name
                press Ctrl+o followed by Ctrl+x
    run sudo nano /etc/mysql/my.cnf
        Change: bind-adress      = 'localhost'
            To: bind-adress      = ip
                 press Ctrl+o followed by Ctrl+x
    run sudo nano /etc/apache2/sites-enabled/000-default.conf
        Write the following:
            ServerAdmin admin@pfcccalcolator.com
        	ServerName pfcccalcolator.com
        	ServerAlias www.pfcccalcolator.com
        	DocumentRoot /var/www/pfcccalcolator.com/public_html
        	ErrorLog ${APACHE_LOG_DIR}/error.log
    	    CustomLog ${APACHE_LOG_DIR}/access.log combined
    	        press Ctrl+o followed by Ctrl+x
    run sudo nano /etc/apache2/apche2.conf
        Add following lines:
            ServerName pfcccalcolator.com
            DocumentRoot "/var/www/pfcccalcolator.com/public_html"
            Include /etc/phpmyadmin/apache.conf
                press Ctrl+o followed by Ctrl+x
    run sudo nano /etc/phpmyadmin/config.inc.php
        Change $dbserver = 'localhost';
            To: $dbserver = 'pfcccalcolator.com';
                press Ctrl+o followed by Ctrl+x
    run sudo nano /etc/phpmyadmin/config-db.php
        Change $dbuser = 'root';
            To: $dbuser = 'user';
                press Ctrl+o followed by Ctrl+x
    run sudo service apache2 restart
    run sudo service mysql restart
    Open Borser and Type your ip in adress field
    Do the same with ip/phpmyadmin
    Both should work if not search the  errors you get!
    Now import database using the phpmyadmin from browser
    Now return to your ip and you are ready to go.
    
    
    
            
    
    
	        
    
        