<?php

namespace App\Http\Controllers\director;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    public static function populateList()
    {
        $categorias = Categoria::all();
        return $categorias;
    }

    public static function getCategoriasPorIdioma(string $id_idioma)
    {
        $categorias = Categoria::query()->where('id_idioma', $id_idioma)->get();
        return $categorias;
    }

  
}
