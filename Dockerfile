# ÇÓÊÎÏÇã äÓÎÉ PHP ãÚ Apache ÌÇåÒÉ ááÇÑÇÝíá
FROM php:8.2-apache

# ÊËÈíÊ ÇáÅÖÇÝÇÊ ÇááÇÒãÉ ááÇÑÇÝíá æÞÇÚÏÉ ÇáÈíÇäÇÊ
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# ÊËÈíÊ ÅÖÇÝÇÊ PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# ÊÝÚíá Apache Rewrite Module (ÖÑæÑí ÌÏÇð ááÇÑÇÝíá)
RUN a2enmod rewrite

# ÖÈØ ãÌáÏ ÇáÚãá ÏÇÎá ÇáÓíÑÝÑ
WORKDIR /var/www/html

# äÓÎ ãáÝÇÊ ÇáãÔÑæÚ Åáì ÇáÓíÑÝÑ
COPY . .

# ÊËÈíÊ Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# ÊÛííÑ ãáßíÉ ÇáãáÝÇÊ áÜ Apache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ÊÚÏíá ÅÚÏÇÏÇÊ Apache áíÚãá ãä ãÌáÏ public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# ÝÊÍ ÇáãäÝÐ 80
EXPOSE 80

CMD ["apache2-foreground"]
