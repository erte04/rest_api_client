
W celu przetestowania modułu przy pomocy dockera (potrzebny docker i docker-compose):
1. przejdź do katalogu modułu
2. otwórz konsolę na katalogu
3. wpisz komendę: docker-compose up -d
4. przejdź do konsoli kontenera poleceniem: docker exec -it -u dev rest_client_php bash
5. cd html
6. composer install
7. pod adresem localhost:81 można sprawdzić przykłady:
  - localhost:81/examples/get.php
  - localhost:81/examples/delete.php
  - localhost:81/examples/put.php
  - localhost:81/examples/basicauth.php
  - localhost:81/examples/jwtauth.php
