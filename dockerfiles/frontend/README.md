# Application Code

This repository contains the following PHP pages located in the `src` folder:

- [home.php](src/home.php)
- [index.php](src/index.php)
- [index1.php](src/index1.php)
- [signup.php](src/signup.php)*
- [signup1.php](src/signup1.php)
- [styles.css](src/styles.css)

## File Structure

- `index.php`: 
- `styles.css`: Stylesheet for defining the look and feel of the pages.
- `signup.php`: 






### Creating a Dockerfile:  
- A Dockerfile is a text document that contains all the commands a user can call on the command line to assemble an image.  
- We have created a Dockerfile for frontend.  
- What it does???  
    - **FROM php:7.4-apache** : This line specifies the base image to use for this Docker image. It uses the official PHP image with Apache web server, based on PHP version 7.4. 
    - **RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli** :This line executes commands within the container during the build process. It installs the mysqli extension for PHP using docker-php-ext-install, and then enables it using docker-php-ext-enable. This extension is commonly used for interacting with MySQL databases from PHP
    - **WORKDIR /var/www/html** : This line sets the working directory inside the container to /var/www/html. This is where Apache typically serves files from in the default configuration.
    - **COPY ./frontend/src/ /var/www/html/** : This line copies the contents of the ./frontend/src/ directory from the host machine into the /var/www/html/ directory within the Docker container. This is typically where the web server looks for files to serve.
    - **CMD CMD ["php", "-S", "0.0.0.0:80"]** : This line specifies the default command to run when the container starts. It starts the PHP built-in server (php -S) and binds it to listen on all network interfaces (0.0.0.0) on port 80.

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
