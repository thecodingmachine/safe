FROM debian:stable
ARG DEBIAN_FRONTEND=noninteractive
RUN apt update -y && apt install -y git composer php-cli php-dom php-curl vim
WORKDIR /app
CMD cd /app/generator/doc && ./update.sh && cd /app/generator && composer install && php ./safe.php generate
