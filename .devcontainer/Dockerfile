FROM debian:stable
ARG DEBIAN_FRONTEND=noninteractive
ARG XDEBUG_MODE=coverage
RUN apt update -y && apt install -y git composer php-cli php-dom php-curl php-xdebug vim
WORKDIR /app
CMD cd /app/generator/doc && ./update.sh && \
    cd /app && composer install && \
    cd /app/generator && composer install && php ./safe.php generate
