ПРоект по автоматизации доставки новостей на стену вк

Работает на docker
Для запуска перейди в папку docker, в ней docker-compose up --build -d

для записи в базу используй docker exec -it <docker_container> sh -c "php dbQueryPDO.php"

для отправки на стену docker exec -it <docker_container> sh -c "php index.php"

