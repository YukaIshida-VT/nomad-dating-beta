### セットアップ

- git clone
```
git clone git@github.com:YukaIshida/nomad-dating-beta.git
cd nomad-dating-beta
cp .env.example .env
```

- 初回起動
```
./vendor/bin/sail up
```

- 初回以降の起動は以下でOK
```
docker-compose up -d
```

- コンテナ停止
```
docker-compose down
```

- SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed対策
```
docker-compose rm -v
docker-compose down -v
docker volume prune
docker-compose up -d
コンテナに入って
php artisan migrate
```
https://gamushiros.hatenablog.com/entry/2018/07/29/211219

### 一般画面

```
http://127.0.0.1:40050/
```