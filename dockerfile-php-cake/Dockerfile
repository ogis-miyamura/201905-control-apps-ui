FROM centos:centos7

ARG HTTP_PROXY=http://10.0.0.40:8080


# RUN yum update -y

RUN \
    echo "proxy=${HTTP_PROXY}" >> /etc/yum.conf \
 && yum -y install \
      wget \
      zip \
      unzip \
      git \
      httpd \
      epel-release \
 && yum clean all

RUN \
    rpm --httpproxy ${HTTP_PROXY} -Uvh \
      http://rpms.famillecollet.com/enterprise/remi-release-7.rpm


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
    curl -x ${HTTP_PROXY} -s https://getcomposer.org/installer | php \
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
