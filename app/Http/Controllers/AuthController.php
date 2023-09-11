<?php

namespace App\Http\Controllers;

use App\Events\EventNovoRegistro;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
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

    public function logout(Request $request)
    {

        $request->user()->token()->revoke();

        return $this->response('Usuário deslogado com sucesso!', 200);

    }

    public function ativarregistro($id, $token)
    {
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

    public function getPermission(int $id): JsonResponse
    {
        $user = User::find($id);
        if($user->creator && $user->admin){
            return $this->response('O usuário tem permissão de Adminstrador e Criador.', 200);
        } elseif ($user->admin) {
            return $this->response('O usuário tem permissão de Administrador.', 200);
        } else {
            return $this->response('O usuário tem permissão de Criador.', 200);
        }
    }

    public function setPermission(Request $request,int $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        $user->save();

        return $this->response('Permissão atualizada com sucesso!', 200,[$user]);
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
        return $this->response('Dados do usuário alterados com sucesso!', 200,[$user]);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return $this->response('Usuário deletado com sucesso!', 200, [$id]);
    }

    public function index(): string
    {
        return User::all()->toJson();
    }
}
