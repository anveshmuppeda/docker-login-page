FROM mysql:5.7

ENV MYSQL_ROOT_PASSWORD=pass
ENV MYSQL_DATABASE=database
ENV MYSQL_USER=username
ENV MYSQL_PASSWORD=password

COPY ./backend/init.sql /docker-entrypoint-initdb.d/

