### Creating a Dockerfile:  
- A Dockerfile is a text document that contains all the commands a user can call on the command line to assemble an image.  
- We have created a Dockerfile for backend.  
- What it does???  
    - **FROM mysql:5.7** : Used the MySQL Docker image tagged with version 5.7 as the base image.  
    - **ENV MYSQL_ROOT_PASSWORD=pass** : Sets the environment variable 'MYSQL_ROOT_PASSWORD' to 'pass'. This environment variable is used to set the root password for the MySQL database server.  
    - **ENV MYSQL_DATABASE=database** : Sets the environment variable 'MYSQL_DATABASE' to 'database'. This variable specifies the name of the initial database that will be created when the MySQL server starts.  
    - **ENV MYSQL_USER=username** : Sets the environment variable MYSQL_USER to 'username'. This variable specifies the username of a new user to be created with certain privileges.  
    - **ENV MYSQL_PASSWORD=password** : Sets the environment variable MYSQL_PASSWORD to 'password'. This variable specifies the password for the new user created with the MYSQL_USER variable.  
    - **COPY ./backend/init.sql /docker-entrypoint-initdb.d/** : Copies the init.sql file from the local ./backend/ directory into the /docker-entrypoint-initdb.d/ directory within the Docker image. Files placed in this directory are executed by MySQL when the container is first started.

### Building an Image from Dockerfile:  
- Command to build a Docker image:  
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

### Use of init.sql file:  
- Contains SQL commands to initialize the MySQL database with required tables when the Docker container starts.
    
