FROM centos:centos7

# RUN yum update -y

RUN \
    yum install -y \
      wget \
      zip \
      unzip \
      git \
      httpd \
      epel-release \
 && rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
 && yum clean all


RUN \
    yum -y install --enablerepo=remi-php72 \
      php \
      php-cli \
      php-common \
      php-devel \
      php-mbstring \
      php-pgsql \
      php-gd \
      php-intl \
      php-xml \
 && yum clean all


RUN \
    curl -s https://getcomposer.org/installer | php \
 && mv composer.phar /usr/local/bin/

WORKDIR /opt/

RUN \
    composer.phar \
        create-project \
        --prefer-dist \
        --no-interaction \
        cakephp/app \
        control-apps-ui

# mv /opt/control-apps-ui /var/www/html/

# cd /var/www/html/control-apps-ui/bin
# ./cake bake all applications
# ./cake bake all config_templates
# ./cake bake all parameter_types
# ./cake bake all server_parameters
# ./cake bake all servers

# http://x.x.x.x:18080/
# http://x.x.x.x:18080/index.php/Servers/

CMD [ "/usr/sbin/httpd", "-DFOREGROUND" ]
