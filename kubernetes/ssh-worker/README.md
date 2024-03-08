### Logging into Worker node:  
- There are two ways to access the worker node:  
    - SSH using key.  
    - Using a pod.  

### 1. SSH Key:  
- As we intentionally disabled the SSH access (due to security reasons), we cannot access using SSH.    

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
       - **apiVersion** specifies the version of the Kubernetes API that object uses.  
       - **kind** type of K8s object i.e., POD.    
       - **metadata** contains the metadata of the pod like name and its labels.  
            - **name** of the Pod.  
            - **labels** the label key is "plugin," and the value is "ssh-node", it can be helpful for identifying or categorizing the pods based on their functionality or purpose.
    2. ```
        spec:
            nodeName: pool-448noeajl-o5sgi
       ```
       - **spec** describes the desired state of the pod.  
       - **nodeName** specifies the name of the node where the pod should run.  
    3. ```
        containers:
        - name: ssh-node
          image: busybox
          imagePullPolicy: IfNotPresent
          command: ["chroot", "/host"]
          tty: true
          stdin: true
          stdinOnce: true
          securityContext:
            privileged: true
          volumeMounts:
          - name: host
            mountPath: /host
       ```
       - **containers** defines the containers within the pod.  
       - **name** specifies the name of the container, here it is "ssh-node"  
       - **image** specifies the container image to be used, here it is busybox.  
       - **imagePullPolicy** defines when to pull the container image (IfNotPresent means it will use the local image if available)  
       - **command** specifies what command to run within the container (chroot /host in this case)  
       - **tty** allocates a pseudo-TTY, which allows the interactive shell access.  
       - **stdin** redirects the standard input to the container.  
       - **stdinOnce** closes the standard input once attached.  
       - **securityContext** sets the security context for the container, which allows it to run in the privileged mode.  
       - **volumeMounts** mounts a volume named "host" at the path "/host" inside the running container.   
    4. ```
        volumes:
        - name: host
          hostPath:
          path: /
       ```
       - **volumes** defines the volumes that can be mounted by the containers.  
       - **name** specifies the name of the volume, here it is host.  
       - **hostPath** mounts the host's root directory ("/") into the container.  
    5. ```
        hostNetwork: true
        hostIPC: true
        hostPID: true
        restartPolicy: Never
       ```
       - **hostNetwork** enables the use of the host's network namespace.  
       - **hostIPC** enables the use of the host's IPC namespace.  
       - **hostPID** enables the use of the host's PID namespace.  
       - **restartPolicy** specifies the pod's restart policy. Here, it is set to "Never," which means the pod won't be restarted automatically if it exits.  
- After creating the definition file for a pod, apply the changes using the command:  
    ```
    kubectl apply -f <file-name>
    ```
    ```
    kubectl apply -f ssh-worker.yaml
    ```
- Once the pod is created, we can log in using:  
    ```
    kubectl exec -it <pod-name> sh
    ```
    ```
    kubectl exec -it ssh-node sh
    ```      
- Finally, you are logged in...!  