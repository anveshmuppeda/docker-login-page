FROM mysql:5.7
COPY ./backend/init.sql /docker-entrypoint-initdb.d/

