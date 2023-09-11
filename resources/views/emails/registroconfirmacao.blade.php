<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Registro - Mojo</title>
</head>
<body>
<div style="max-width: 600px; margin: 0 auto; padding: 20px; color: #000;">
    <h4>Seja bem-vindo(a), <strong>{{ $nome }}</strong></h4>
    <p>Você acabou de se registrar no sistema utilizando o e-mail: <strong> {{ $email }}</strong></p>
    <p>Suas permissões no sistema são:
        <strong>
            @if($admin && $creator)
                Administrador/Criador
            @elseif($admin)
                Administrador
            @elseif($creator)
                Criador
            @endif
        </strong>
    </p>
    <p>Clique no link abaixo para confirmar seu e-mail de registro.</p>
    <a href="{{ $link }}"
       style="display: inline-block; padding: 10px 20px; background-color: #00C84B; color: #fff; text-decoration: none; border-radius: 5px; margin-top: 10px;">CONFIRMAR
        EMAIL</a>
    <br>
    <p>Data/Hora de acesso:<strong> {{ $datahora }}</strong></p>
</div>
</body>
</html>
