# Setup
========================

Install vagrant
Install virtualbox

Download this project and put it into a directory

Create 'webroot' folder in directory

$ vagrant up (STOP PUTTY PUPPET BEFORE DOING THIS - WINDOWS ONLY)

$ vagrant ssh (username will be 'vagrant')

-

$ cd /vagrant/webroot

$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ composer install

setup timezone
sudo vi /etc/php5/apache2/php.ini
date.timezone = "Europe/London"

sudo apt-get install ruby-rvm

rvm install ruby-1.9.3-p484

sudo gem install bundler

bundle install


sudo apt-get install npm
sudo npm cache clean -f
sudo npm install -g n
sudo n stable

npm config set registry http://registry.npmjs.org/

sudo npm install
sudo npm install -g grunt-cli

grunt watch

=====


http://localhost:8888   - homepage

phpmyadmin: http://localhost:8888/phpmyadmin

username: root
password: root





