<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index() {
        $featured = DB::table('posts')->where('is_recente', true)->get();
        $general = DB::table('posts')->where('is_recente', false)->orderBy('pid', 'DESC')->get();
        $software = DB::table('posts')->where('category_id', 'LIKE', '%6%')->orderBy('pid', 'DESC')->get();
        $celulares = DB::table('posts')->where('category_id', 'LIKE', '%7%')->orderBy('pid', 'DESC')->get();
        $hardware = DB::table('posts')->where('category_id', 'LIKE', '%2%')->orderBy('pid', 'DESC')->get();
        $internet = DB::table('posts')->where('category_id', 'LIKE', '%1%')->orderBy('pid', 'DESC')->get();
        $eletronicos = DB::table('posts')->where('category_id', 'LIKE', '%9%')->orderBy('pid', 'DESC')->get();
        $maisnoticias = DB::table('posts')->where('category_id', 'LIKE', '%8%')->orderBy('pid', 'DESC')->get();
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
        return view('frontend.index', ['categorias' => $categorias, 
                                        'featured' => $featured, 
                                        'general' => $general, 
                                        'configuracoes' => $configuracoes, 
                                        'icons' => $icons,
                                        'software' => $software,
                                        'celulares' => $celulares,
                                        'hardware' => $hardware,
                                        'internet' => $internet,
                                        'eletronicos' => $eletronicos,
                                        'maisnoticias' => $maisnoticias]);
    }

    public function category() {
        return view('frontend.category');
    }

    public function post() {
        return view('frontend.index');
    }
}
