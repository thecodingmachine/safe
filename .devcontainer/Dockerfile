FROM debian:testing
ARG DEBIAN_FRONTEND=noninteractive
ARG XDEBUG_MODE=coverage
RUN apt update -y && apt install -y git composer php-cli php-dom php-curl php-xdebug vim
WORKDIR /app
RUN git config --global --add safe.directory /app && \
    git config --global --add safe.directory /app/generator/docs
CMD cd /app && composer install && \
    cd /app/generator && composer install && \
    php ./safe.php download-docs && \
    php ./safe.php generate
