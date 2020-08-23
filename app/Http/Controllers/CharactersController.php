<?php
namespace App\Http\Controllers;

use App\Character;
use Illumiante\Http\Request;

class CharactersController
{
    public function index()
    {
        return Character::all();
    }
}