#!/bin/bash

cd /home/aerovir/vk_feeder/docker/
docker-compose down
docker-compose up --build -d
sleep 60
docker exec -it docker_vk-feeder_1 sh -c "php dbQuery.php"
docker exec -it docker_vk-feeder_1 sh -c "php index.php"
docker-compose down
