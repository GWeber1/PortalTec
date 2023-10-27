<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index() {
        $categorias = DB::table('categories')->get();
        return view('backend.posts.index', ['categorias' => $categorias, 'mensagemSucesso' => session('mensagem.sucesso')]);
    }

    public function add(Request $request) {
        if(isset($request->is_recente)) {
            $isRecente = true;
        } else {
            $isRecente = false;
        }
        $request['category_id'] = implode(',', $request['category_id']);
        $request['is_recente'] = $isRecente;
        $dataInsert = Post::create($request->except(['_token', 'image']));
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $dataInsert = DB::table('posts')->where('pid', $dataInsert['pid'])->update(['image' => $path]);
        }
        return to_route('posts.index')->with('mensagem.sucesso', "Post cadastrado com sucesso");
    }

    public function all() {
        $posts = DB::table('posts')->orderBy('pid', 'desc')->orderby('pid', 'DESC')->paginate(20);
        foreach($posts as $post) {
            $categories = explode(',', $post->category_id);
            foreach($categories as $cat) {
                $postcat = DB::table('categories')->where('cid', $cat)->value('title');
                $postcategories[] = $postcat;
                $postcat = implode(',', $postcategories);
            }
            $post->category_id = $postcat;
            $postcategories = [];
        }
        $totalPublicado = DB::table('posts')->where('status', 'publicado')->count();
        return view('backend.posts.allposts', ['posts' => $posts, 'totalPublicado' => $totalPublicado, 'mensagemSucesso' => session('mensagem.sucesso')]);
    }

    public function delete(Request $request) {
        $pid = $request->post_id;
        $nome = DB::table('posts')->where('pid', $pid)->get(['title'])->first();
        $dataDelete = DB::table('posts')->where('pid', $pid)->delete();
        $posts = DB::table('posts')->get();
        return to_route('posts.all', ['posts' => $posts])->with('mensagem.sucesso', "Post '$nome->title' excluído com sucesso");
    }

    public function edit(int $pid) {
        $data = DB::table('posts')->where('pid', $pid)->first();
        $postcat = explode(',', $data->category_id);
        $categorias = DB::table('categories')->get();
        return view('backend.posts.edit', ['post' => $data, 'categorias' => $categorias, 'postcat' => $postcat]);
    }

    public function update(Request $request) {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
        }
        if(isset($request->is_recente)) {
            $isRecente = true;
        } else {
            $isRecente = false;
        }
        $request['category_id'] = implode(',', $request['category_id']);
        $request['is_recente'] = $isRecente;
        $dataUpdate = DB::table('posts')->where('pid', $request->pid)->update($request->except(['_token', 'image']));
        if($request->hasFile('image')) {
            $dataUpdate = DB::table('posts')->where('pid', $request->pid)->update(['image' => $path]);
        }
        $post = DB::table('posts')->get();
        return to_route('posts.all', ['posts' => $post])->with('mensagem.sucesso', 'Post editado com sucesso'); 
    }
}
