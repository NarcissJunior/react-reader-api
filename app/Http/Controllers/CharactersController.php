<?php
namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharactersController
{
    //Buscar todos os personagens
    public function index()
    {
        return Character::all();
    }

    //Criar um personagem novo trazendo a resposta da requisição
    public function store(Request $request)
    {
        return response()
            ->json(
                Character::create([
                    'name' => $request->name,
                    'vocation' => $request->vocation,
                    'sex' => $request->sex,
                    'level' => $request->level,
                    'world' => $request->world,
                    'residence' => $request->residence,

                ]), 201
            );
    }

    //Buscar um personagem
    public function show(int $id)
    {
        $character = Character::find($id);
        if (is_null($character)) {
            return response()->json('', 204);
        }
        return response()->json($character, 200);
    }

    //Atualizar um personagem
    public function update(int $id, Request $request)
    {
        $character = Character::find($id);
        if (is_null($character)) {
            return response()->json(["message" => "Personagem não encontrado!"], 404);
        }

        $character->fill($request->all());
        $character->save();

        return $character;
    }

    //Exclui um personagem
    public function destroy(int $id)
    {
        if (Character::destroy($id) === 0){
            return response()->json(["message" => "Personagem não encontrado!"], 404);
        }
        return response()->json(["message" => "Personagem removido com sucesso!"], 200);
    }
}