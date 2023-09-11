<?php

namespace App\Http\Controllers;

use App\Events\EventNovoRegistro;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    use HttpResponses;
    public function registro(Request $request){

        $request->validate([
            'name' => 'required | string',
            'email' => 'required | string | email | unique:users',
            'password' => 'required | string | confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => Str::random(40),
            'admin' => $request->admin,
            'creator' => $request->creator,
        ]);

        $user->save();

        event(new EventNovoRegistro($user));

        return $this->response('Usuário cadastrado com sucesso!', 201);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | string | email',
            'password' => 'required | string'
        ]);

        if(Auth::attempt($request->only('email','password', 'active'))){
            return $this->response('Autorizado', 200, [
                'token' => $request->user()->createToken('Token'),
            ]);
        }
        else {
            return $this->response('Credenciais inválidas ou usuário inativo', 401);
        }
    }

    public function logout(Request $request){

        $request->user()->token()->revoke();

        return $this->response('Usuário deslogado com sucesso!', 200);

    }

    public function ativarregistro($id, $token){
        $user = User::find($id);
        if ($user) {
            if ($user->token == $token) {
                $user->active = true;
                $user->token = '';
                $user->save();

                return $this->response('Você acaba de se registrar com sucesso!', 200);
            }
        }
        return $this->response('Ocorreu um erro em seu registro!', 200);
    }
}
