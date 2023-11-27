<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index() {
        $noticiasrecentes = DB::table('posts')->where('status', 'publicado')->where('is_recente', true)->get();
        $murais = DB::table('positions')->where('status', 'Ativo')->get();
        foreach($murais as $mural) {
            $noticias = DB::table('posts')
            ->join('categoriespost', 'posts.pid', 'categoriespost.pid')
            ->join('categories', 'categoriespost.cid', 'categories.cid')
            ->where('posts.status', 'publicado')
            ->where('is_recente', false)
            ->where('categories.position_id', $mural->pid)->get('posts.*');
            
            $noticiasGeral[$mural->pid] = $noticias;
        }
        $categorias = DB::table('categories')->where('status', 'Ativo')->get();
        $pages = DB::table('pages')->where('status', 'publicado')->get();
        $configuracoes = DB::table('settings')->first();
        
        if ($configuracoes) {
            $configuracoes->social = explode(',', $configuracoes->social);
            foreach($configuracoes->social as $social) {
                $icon = explode('.', $social);
                $icon = $icon[1];
                $icons[] = $icon;
            }
        }
        
        return view('frontend.index', ['noticiasGeral' => $noticiasGeral, 
                                        'noticiasrecentes' => $noticiasrecentes,
                                        'pages' => $pages,
                                        'categorias' => $categorias, 
                                        'icons' => $icons,
                                        'configuracoes' => $configuracoes]);
    }

    public function category() {
        return view('frontend.category');
    }

    public function post() {
        return view('frontend.index');
    }

    public function article(int $pid, string $slug) {
        $pages = DB::table('pages')->where('status', 'publicado')->get();
        $configuracoes = DB::table('settings')->first();
        $categorias = DB::table('categories')->where('status', 'Ativo')->get();
        $article = DB::table('posts')->where('pid', $pid)->first();
        DB::table('posts')->where('pid', $pid)->update(['views' => $article->views + 1]);
        $categoriespost = DB::table('categoriespost')->where('pid', $pid)->pluck('cid');
        $vejamais = DB::table('posts')
        ->join('categoriespost', 'posts.pid', 'categoriespost.pid')
        ->whereIn('categoriespost.cid', $categoriespost)
        ->where('posts.pid', '!=', $pid)
        ->get('posts.*');
        $recentes = DB::table('posts')->where('is_recente', true)->get();
        if ($configuracoes) {
            $configuracoes->social = explode(',', $configuracoes->social);
            foreach($configuracoes->social as $social) {
                $icon = explode('.', $social);
                $icon = $icon[1];
                $icons[] = $icon;
            }
        }

        return view('frontend.article', ['configuracoes' => $configuracoes, 'categorias' => $categorias, 'article' => $article, 'vejamais' => $vejamais, 'recentes' => $recentes, 'pages' => $pages]);
    }

    public function search() {
        $url = 'http://localhost:8000/article';
        $text = $_GET['text'];
        $data = DB::table('posts')->
        where('description', 'LIKE', '%' . $text . '%')->
        orWhere('title_posts', 'LIKE', '%' . $text . '%')->
        orWhere('lide', 'LIKE', '%' . $text . '%')->get();
        $output = '';
        echo '<ul class="search-result">';
        foreach($data as $d) {
            echo '<li><a href="' . $url.'/' . $d->pid . '/' . $d->slug. '">' . $d->title_posts . '</a></li>';
        }
        echo '</ul>';
        return $output;
    }

    public function page(int $pageid, string $slug) {
        $configuracoes = DB::table('settings')->first();
        $data = DB::table('pages')->where('pageid', $pageid)->first();
        $configuracoes = DB::table('settings')->first();
        $categorias = DB::table('categories')->where('status', 'Ativo')->get();
        $pages = DB::table('pages')->where('status', 'publicado')->get();
        if($configuracoes) {
            $configuracoes->social = explode(',', $configuracoes->social);
        }
        $recentes = DB::table('posts')->where('is_recente', true)->get();
        return view('frontend.page', ['data' => $data, 'configuracoes' => $configuracoes, 'pages' => $pages, 'categorias' => $categorias, 'recentes' => $recentes]);
    }

    public function contactUs() {
        $configuracoes = DB::table('settings')->first();
        $configuracoes = DB::table('settings')->first();
        $categorias = DB::table('categories')->where('status', 'Ativo')->get();
        $pages = DB::table('pages')->where('status', 'publicado')->get();
        if($configuracoes) {
            $configuracoes->social = explode(',', $configuracoes->social);
        }
        $recentes = DB::table('posts')->where('is_recente', true)->get();
        return view('frontend.contact', ['configuracoes' => $configuracoes, 'pages' => $pages, 'categorias' => $categorias, 'recentes' => $recentes]);
    }

    public function sendMessage(Request $request) {
        $dataInsert = Message::create($request->except(['_token']));
        $configuracoes = DB::table('settings')->first();
        $categorias = DB::table('categories')->where('status', 'Ativo')->get();
        $pages = DB::table('pages')->where('status', 'publicado')->get();
        $recentes = DB::table('posts')->where('is_recente', true)->get();
        return view('frontend.contact', ['configuracoes' => $configuracoes, 'pages' => $pages, 'categorias' => $categorias, 'recentes' => $recentes, 'mensagemSucesso' => 'Obrigado por entrar em contato! Vamos responder o mais rápido possível']);
    }
}
