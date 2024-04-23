# Use the official Composer image as the base image
FROM composer:latest

ARG NOVA_USER
ARG NOVA_LICENSE

# Set the working directory inside the container
WORKDIR /app

# Copy the composer.json and composer.lock from your project root to the working directory in the container
COPY composer.json ./

# Run composer install to install dependencies based on the composer.json file
RUN composer config http-basic.nova.laravel.com ${NOVA_USER} ${NOVA_LICENSE}
RUN composer install --no-interaction
RUN composer config --unset http-basic.nova.laravel.com

# Mount the vendor directory as a volume so it's accessible on the host
#VOLUME /app/vendor

# Set the entry point to an interactive shell for convenience
ENTRYPOINT ["/bin/sh"]