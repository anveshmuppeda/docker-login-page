### Creating a Dockerfile:  
- A Dockerfile is a text document that contains all the commands a user can call on the command line to assemble an image.  
- We have created a Dockerfile for frontend.  
- What it does???  
    - **FROM ubuntu:18.04** : Used a base image as Ubuntu of version 18.04.  
    - **LABEL maintainer="sample-docker-login-application"** : It is a label that indicates the creator or the maintainer for the project.  
    - **RUN apt-get -y update && apt-get -y install nginx** : Updates the package list and installs NGINX.  
    - **All the 4 COPY instructions** : Copying/overriding the the default nginx files with our appropriate files (index.html, signup.html, and styles.css)  
    - **EXPOSE 80** : Exposing it on the port 80, it is the default port for HTTP.  
    - **CMD ["/usr/sbin/nginx", "-g", "daemon off;"]** : **/usr/sbin/nginx** is the path to the NGINX executable and this starts the NGINX server, **-g** is used to pass a global configuration directive (configuration parameter) to NGINX when it starts and allows us to set the global configuration options that will be applied to the entire NGINX server, and **daemon off;** is used to specify whether the NGINX should run as a daemon or in the foreground (off is set to the NGINX server to run in the foreground instead of as a daemon).  

### Building an Image from Dockerfile:  
- Command to build a DOcker image:  
    `docker build -t <image-name> .`  
- Command to build a Docker image from a custom dockerfile name:  
    `docker build -t <image-name> -f <Dockerfile-name> .`  
- **-t** flag is used to specify a tag, here it is setting an image name.  

### Pushing an Image:  
- Steps to push an image into registry URL:  
    1. Login to the appropriate container registry using the command:  
        `docker login <registry_URL>`  
    2. It's a good practice to tag the image:  
        `docker tag <name_local_image> <registry_URL>/<repository_name>:<tag>`  
    3. Now, push the image to registry:  
        `docker push <registry_URL>/<repository_name>:<tag>` 