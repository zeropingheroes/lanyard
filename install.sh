#!/bin/bash
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
GREEN='\033[0;32m'
BLACK='\033[0m'

printf "${GREEN}Installing dependencies with apt${BLACK}\n"
add-apt-repository -y ppa:ondrej/php
apt update -y
apt install -y python-software-properties
apt install -y php7.1-cli
apt install -y php7.1-mbstring
apt install -y php7.1-dom
apt install -y php7.1-json
apt install -y php7.1-libxml
apt install -y php7.1-xml
apt install -y php7.1-xdebug
apt install -y composer
apt install -y zip
apt install -y unzip

printf "${GREEN}Installing dependencies with Composer${BLACK}\n"
cd ${SCRIPT_DIR} && composer install
