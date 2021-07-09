# Curso Laravel Microservices - Micro Gateway
[Saiba Mais Sobre o Curso](https://academy.especializati.com.br/curso/laravel-microservices-gateway)

## Requisitos
Este micro gateway depende do microservice 01, portanto, primeiramente subir o [micro 01](https://github.com/especializati/laravel-microservice-01)

E também depende do microservice 02, portanto, também subir o [micro 02](https://github.com/especializati/laravel-microservice-02)

E ambos, o micro 01 e o micro 02 dependem do micro e-mail, portanto, também subir o [micro e-mail](https://github.com/especializati/laravel-micro-email)

### Instalação
Clonar Projeto
```sh
git clone https://github.com/especializati/laravel-micro-gateway
```

Acessar o projeto
```sh
cd laravel-micro-gateway
```

Criar o Arquivo .env
```sh
cp .env.example .env
```

Atualizar as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=EspecializaTi
APP_URL=http://localhost:8098
```

Subir os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec micro_gateway bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Acessar o projeto
[http://localhost:8098](http://localhost:8098)
