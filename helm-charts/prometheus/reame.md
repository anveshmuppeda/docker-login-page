# Prometheus  


kubectl expose service prometheus-server --type=NodePort --target-port=9090 --name=prometheus-server-ext


k expose service prometheus-server --type=NodePort --target-port=9090 --name=prometheus-server-ext


kubectl expose service grafana --type=NodePort --target-port=3000 --name=grafana-ext


k expose service grafana --type=NodePort --target-port=3000 --name=grafana-ext
