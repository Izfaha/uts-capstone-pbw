FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

# install extensi myswli di php untuk database connection 
# jika tidak di install maka akan muncul error
# "Fatal error: Uncaught Error: Class "mysqli" not found in /var/www/html/koneksi.php:9 Stack trace: #0 {main} thrown in /var/www/html/koneksi.php on line 9"
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# install timezone
RUN apk add --no-cache tzdata
ENV TZ=Asia/Jakarta

# ENV TZ=Asia/Jakarta
# RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY . .