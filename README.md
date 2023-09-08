
# Mojo backend

- Este projeto feito com o framework Laravel 10.x

## Instalação

Clone Repositório
```sh
git clone https://
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

## Modulos

Cadastro usuário:
- Utilizando uma requisição POST para enviar um JSON.
 
```dosini
    {
        "nome" : " ",

        "email" : " ",

        "password" : " ",

        "password_confirmation" : " "
    }
```


- Nome do usuário (pode ser nome completo)
- Email (usar um email valido)
- Password
- Confirmar Password

> O usuário irá receber em seu email uma mensagem para confirmação do cadastro,
>somente será possível o login após confirmação.
 
 Login:
- Utilizando uma requisição POST para enviar um JSON.
```dosini
    {
        "email" : " ",

        "password" : " "
        
    }
```
- Email cadastrado
- Password cadastrado