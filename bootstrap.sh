#!/usr/bin/env bash

sudo yum update -y
rpm -Uvh http://download.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
# sudo yum install httpd -y

sudo yum install -y vim curl phyton-software-properties

sudo yum update -y

sudo yum --enablerepo=remi install httpd -y

sudo service httpd start

sudo yum --enablerepo=remi install php php-mysql -y

sudo yum --enablerepo=remi install php-mcrypt -y

sudo yum --enablerepo=remi install mysql-server -y

#sudo yum install php54w.x86_64 php54w-cli.x86_64 php54w-common.x86_64 php54w-gd.x86_64 php54w-ldap.x86_64 php54w-mbstring.x86_64 php54w-mcrypt.x86_64 php54w-mysql.x86_64 php54w-pdo.x86_64 mysql-server-5.5 php-mysql git -y

sudo yum install -y php-xdebug

#msql
/etc/init.d/mysqld start
/usr/bin/mysqladmin -u root password 'arn6688'


#apache stuff
sudo a2enmod rewrite

sudo rm -rf /var/www/html

sudo ln -fs /vagrant/public /var/www/html

service httpd restart

curl  -k -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

cd /vagrant
chmod -R o+w app/storage
