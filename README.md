<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

##  Instalação e Configuração o ambiente 

### 1. Clonar o repositório
```bash
git clone git@github.com:luispaulo/luis-docker-laravel.git
cd luis-docker-laravel
```

### 2. Subir o ambiente Docker
```bash
docker-compose up --build -d
```

### 3. rodando migrate
```bash
docker exec -it laravel_app php artisan migrate
```

### 4. Acessando o ambiente

```bash
Agora, o Laravel estará rodando em ` http://localhost:8000/api`  🚀
```

### 5. Rotas para testar API utitilizando POSTMAN ou similar:

- Rota para testar API:
```bash
curl -X GET http://localhost:8000/api/test
```

- Criar novo usuario
```bash
Criar novo usuario:  curl -X POST http://localhost:8000/api/users \
     -H "Content-Type: application/json" \
     -d '{"name": “Luis Paulo, "email": “luispaulolpsn@gmail.com"}'
```

- Listar usuários
```bash
curl -X GET http://localhost:8000/api/users
```

- Buscar usuário por ID
```bash
curl -X GET http://localhost:8000/api/users/1
```

- Atualizar usuário
```bash
curl -X PUT http://localhost:8000/api/users/1 \
     -H "Content-Type: application/json" \
     -d '{"name": “Paulo Luis“, "email": “pauloluis@gmail.com"}'
```

- Deletar usuário
```bash
curl -X DELETE http://localhost:8000/api/users/1
```
