<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Local;
use App\Traits\HttpResponses;

class LocalController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index(): string
    {
        return Local::all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $local = new Local
        ([
            'local_name' => $request->local_name,
            'cep' => $request->cep,
            'city' => $request->city,
            'street' => $request->street,
            'number' => $request->number,
        ]);

        $local->save();

        return $this->response('Local cadastrado com sucesso!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $local = Local::find($id);
        $local->update($request->all());
        $local->save();
        return $this->response('Campos atualizados com sucesso!',200,[$local]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        Local::destroy($id);

        return $this->response('Local deletado com sucesso!', 200, [$id]);
    }
}
