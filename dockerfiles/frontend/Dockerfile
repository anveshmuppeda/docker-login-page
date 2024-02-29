FROM ubuntu:18.04  

#maintainer
LABEL maintainer="sample-docker-login-application" 

#install nginx
RUN  apt-get -y update && apt-get -y install nginx

#copying files
COPY default /etc/nginx/sites-available/default
COPY index.html /usr/share/nginx/html/index.html
COPY signup.html /usr/share/nginx/html/signup.html
COPY styles.css /usr/share/nginx/html/styles.css

#exposing the port
EXPOSE 80

CMD ["/usr/sbin/nginx", "-g", "daemon off;"]