<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index() {
        $featured = DB::table('posts')->where('is_recente', true)->get();
        $general = DB::table('posts')->where('is_recente', false)->get();
        $categorias = DB::table('categories')->where('status', 'Ativo')->get()->all();
        $configuracoes = DB::table('settings')->first();
        if ($configuracoes) {
            $configuracoes->social = explode(',', $configuracoes->social);
            foreach($configuracoes->social as $social) {
                $icon = explode('.', $social);
                $icon = $icon[1];
                $icons[] = $icon;
            }
        }
        return view('frontend.index', ['categorias' => $categorias, 'featured' => $featured, 'general' => $general, 'configuracoes' => $configuracoes, 'icons' => $icons]);
    }

    public function category() {
        return view('frontend.category');
    }

    public function post() {
        return view('frontend.index');
    }
}
