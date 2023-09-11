# Mojo backend

- Este projeto feito com o framework Laravel 10.

***

## Instalação

Clone Repositório

```sh
git clone https://github.com/rccheruti/mojo-back.git
```

Instalar as dependências do projeto

```sh
composer install
```

Gerar a key do projeto Laravel

```sh
php artisan key:generate
```
***

## Módulos

### Usuários

>> Cadastrar
> - Utilizando uma requisição POST para enviar um JSON.
>
>```dosini
> /api/v1/registro
>```
>
>Conteúdo do JSON
>
>```dosini
>    {
>        "name" : "Nome de usuário",
>        "email" : "usuario@email.com",
>        "password" : "123456",
>        "password_confirmation" : "123456",
>        "admin":true,
>        "creator":false
>    }
>```
>
>- Nome do usuário (pode ser nome completo)
>- Email (usar um email valido)
>- Password
>- Confirmar Password
>- Se é Adminstrador
>- Se é Criador
>
>Como não ficou bem claro se deveria ser um só implementei a possibilidade de a pessoa executar as duas tarefas, logicamente administrador tem todo o poder, mas por fim deixei assim.
<br>
> O usuário irá receber em seu email uma mensagem para confirmação do cadastro,
> somente será possível o login após confirmação.

>> #### Ver todos os registros
> 
> - Enviar uma requisição GET para
> ```dosini
> /api/v1/registro/listar
>```

>> #### Alterar registro
> 
> - Enviar uma requisição PATCH com o id que deseja alterar
> ```dosini
> /api/v1/registro/editar/{id}
>```


>> ##### Deletar um registro
> 
>  - Enviar uma requisição DELETE com o id que deseja excluir
> ```dosini
> /api/v1/registro/editar/{id}
>```

***
### Login
>
> - Utilizando uma requisição POST para enviar um JSON.
>
>```dosini
> /api/v1/login
>```
>
>```dosini
>    {
>        "email" : " ",
>        "password" : " "        
>    }
>```
>
> - Email cadastrado
> - Password cadastrado
>
>Retornará um JSON, nele haverá um token de acesso para poder executar as demais funções do sistema.

***

### Locais
> 
> > Mostrar todos locais registrados
> - Utilizando uma requisição GET traz todos locais cadastrados.
>
>```dosini
> /api/v1/local
>```

>> Criar novo local
> - Utilizando uma requisição POST para enviar um JSON.
>
>```dosini
> /api/v1/local/store
>```
>
>``` dosini
>
>   {
>       "local_name":"Nome do local",
>       "cep":"99899898",
>       "city":"Cidade",
>       "street":"Avenida do limoeiro",
>       "number":100
>    }
>```

>> Atualizar local
> - Utilizando uma requisição PATCH para enviar um JSON com as informações que deseja atualizar.
>
>```dosini
> /api/v1/local/update/{id}
>```
>
>```dosini
>   {
>       "local_name":"Base Canoas",
>       "cep":"99899898",
>       "city":"Canoas",
>       "street":"Rua Caí",
>       "number":2000
>   }
>```
>

>> Deletar local
> - Utilizando uma requisição DELETE com o id que deseja excluir.
>
>```dosini
> /api/v1/local/delete/{id}
>```
>

***

### Permissões do usuário

>> Consulta tipo de permissao
> 
> - Enviar uma requisição GET com o id que deseja consultar
> ```dosini
>   permissao/usuario/{id}/consulta
>```
> 

>> Atualizar o tipo de permissao
> 
> - Enviar uma requisição PATCH
> 
>```dosini
> permissao/usuario/{id}/atualizar
>```
>
>```dosini
>   {
>       "admin":false,
>       "creator":true
>   }
>```
>

***
#### Quero agradeçer a oportunidade de poder tentar fazer o teste, sempre é bom nos desarfiarmos, tive diversos contratempos
#### durante a execução do teste, o que cuminou no atraso e na elminação do processo. Mas de toda forma sou grato.

###### Roger Cheruti 
###### Whatsapp (48) 99171-9504
