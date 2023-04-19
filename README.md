# Datafordeler API mock

```sh
docker composer up --detach
docker composer exec phpfpm composer install
open "http://$(docker compose post 8080)"
```

## REST (CVR)

<https://confluence.sdfi.dk/pages/viewpage.action?pageId=17139087>

### REST - HentCVRData

<https://confluence.sdfi.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-REST-HentCVRData>

#### Metode - hentVirksomhedMedCVRNummer

<https://confluence.sdfi.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVRNummer>

`/CVR/HentCVRData/1/rest/hentVirksomhedMedCVRNummer?pCVRNummer=xxxxxxxx`

Omit the `pCVRNummer` parameter to see all known values.

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
