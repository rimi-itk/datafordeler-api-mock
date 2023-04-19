# Datafordeler API mock

```sh
docker composer up --detach
docker composer exec phpfpm composer install
open "http://$(docker compose post 8080)"
```

## Coding standards

```sh
docker compose exec phpfpm composer install
docker compose exec phpfpm composer coding-standards-check

docker compose exec phpfpm composer coding-standards-apply
```

```sh
docker compose run --rm node yarn install
docker compose run --rm node yarn coding-standards-check

docker compose run --rm node yarn coding-standards-apply
```
