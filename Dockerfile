FROM node:24-alpine3.21 AS tailwind-build

WORKDIR /tailwind

COPY package.json package-lock.json ./
RUN npm install
COPY input.css tailwind.config.js *.php ./
RUN npx tailwindcss -i input.css -o style.css --minify


FROM php:8.2.28-apache

WORKDIR /var/www/html

COPY *.php .
COPY --from=tailwind-build /tailwind/style.css .

EXPOSE 80