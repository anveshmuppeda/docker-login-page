#### Logging into Worker node:  
- There are two ways to access the worker node:  
    - SSH using key.  
    - Using a pod.  

### 1. SSH Key:  
- As we deployed our application in **DigitalOcean**, it doesn't allow SSH access to the worker nodes.  

### 2. Using a Pod:  
- Let's create a pod definition file.  
- The above **ssh-worker.yaml** file creates a pod named **ssh-node** with specified configuration.  
- Explanation of code snippet:  
    1. ```
        apiVersion: v1
        kind: Pod
        metadata:
            name: ssh-node
            labels:
                plugin: ssh-node
       ```