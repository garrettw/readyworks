# PHP Docker image for Yii 2.0 Framework runtime
# ==============================================

FROM yiisoftware/yii2-php:7.4-apache

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y git unzip

COPY 000-default.conf /etc/apache2/sites-available/
