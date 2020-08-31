<?php
namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharactersController
{
    //Buscar todos os personagens
    public function index()
    {
        return Character::paginate(2);
    }

    //Criar um personagem novo trazendo a resposta da requisição
    public function store(Request $request)
    {
        $character = new Character;
        $character->fill($request->all());
        $character->save();

        return response()->json($character, 201);
    }

    //Buscar um personagem
    public function show(int $id)
    {
        return Character::findOrFail($id);
    }

    //Atualizar um personagem
    public function update(int $id, Request $request)
    {
        $character = Character::findOrFail($id);
        $character->fill($request->all());
        $character->save();
        
        return response()->json($character, 200);;
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