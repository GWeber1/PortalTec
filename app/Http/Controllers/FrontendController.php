<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index() {
        $featured = DB::table('posts')->where('is_recente', true)->get();
        $general = DB::table('posts')->where('is_recente', false)->orderBy('pid', 'DESC')->get();
        $software = DB::table('posts')->where('category_id', 'LIKE', '6,%')->orWhere('category_id', 'LIKE', '6')->orderBy('pid', 'DESC')->get();
        $celulares = DB::table('posts')->where('category_id', 'LIKE', '7,%')->orWhere('category_id', 'LIKE', '7')->orderBy('pid', 'DESC')->get();
        $hardware = DB::table('posts')->where('category_id', 'LIKE', '2,%')->orWhere('category_id', 'LIKE', '2')->orderBy('pid', 'DESC')->get();
        $internet = DB::table('posts')->where('category_id', 'LIKE', '1,%')->orWhere('category_id', 'LIKE', '1')->orderBy('pid', 'DESC')->get();
        $eletronicos = DB::table('posts')->where('category_id', 'LIKE', '9,%')->orWhere('category_id', 'LIKE', '9')->orderBy('pid', 'DESC')->get();
        $metaverso = DB::table('posts')->where('category_id', 'LIKE', '10,%')->orWhere('category_id', 'LIKE', '10')->orderBy('pid', 'DESC')->get();
        $criptomoedas = DB::table('posts')->where('category_id', 'LIKE', '11,%')->orWhere('category_id', 'LIKE', '11')->orderBy('pid', 'DESC')->get();
        $ciberseguranca = DB::table('posts')->where('category_id', 'LIKE', '12,%')->orWhere('category_id', 'LIKE', '12')->orderBy('pid','DESC')->get();
        $sustentabilidade = DB::table('posts')->where('category_id', 'LIKE', '13,%')->orWhere('category_id', 'LIKE','13')->orderBy('pid', 'DESC')->get();
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
                                        'metaverso' => $metaverso,
                                        'criptomoedas' => $criptomoedas,
                                        'ciberseguranca' => $ciberseguranca,
                                        'sustentabilidade' => $sustentabilidade]);
    }

    public function category() {
        return view('frontend.category');
    }

    public function post() {
        return view('frontend.index');
    }

    public function article($pid, $slug) {
        $configuracoes = DB::table('settings')->first();
        $categorias = DB::table('categories')->where('status', 'Ativo')->get()->all();
        $article = DB::table('posts')->where('pid', $pid)->first();
        $vejamais = DB::table('posts')->where('category_id', 'LIKE', '%' . $article->category_id . '%')->orWhere('category_id', 'LIKE', $article->category_id)->get();
        if ($configuracoes) {
            $configuracoes->social = explode(',', $configuracoes->social);
            foreach($configuracoes->social as $social) {
                $icon = explode('.', $social);
                $icon = $icon[1];
                $icons[] = $icon;
            }
        }

        return view('frontend.article', ['configuracoes' => $configuracoes, 'categorias' => $categorias, 'article' => $article, 'vejamais' => $vejamais]);
    }
}
