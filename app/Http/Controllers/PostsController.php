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
        $category_id = $request['category_id'];
        unset($request['category_id']);
        $request['is_recente'] = $isRecente;
        $dataInsert = Post::create($request->except(['_token', 'image']));
        foreach($category_id as $cat) {
            $dataInsertCategoriesPost = DB::table('categoriespost')->insert(['cid' => $cat, 'pid' => $dataInsert['pid']]);
        }
        $dataUpdate = DB::table('posts')->where('pid', $dataInsert['pid'])->update(['views' => 0]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $dataInsert = DB::table('posts')->where('pid', $dataInsert['pid'])->update(['image' => $path]);
        }
        return to_route('posts.index')->with('mensagem.sucesso', "Post cadastrado com sucesso");
    }

    public function all() {
        $posts = DB::table('posts')->orderBy('pid', 'desc')->orderby('pid', 'DESC')->paginate(20);
        $totalPublicado = DB::table('posts')->where('status', 'publicado')->count();
        $categoriesposts = DB::table('categoriespost')->get();
        $title = '';
        foreach($posts as $post) {
            $categoriesposts = DB::table('categoriespost')->where('pid', $post->pid)->get();
            $title = '';
            foreach($categoriesposts as $categoriespost) {
                $categorie = DB::table('categories')->where('cid', $categoriespost->cid)->get('title')->first();
                if($categorie) {
                    $title .= $categorie->title . '; ';
                }
            }
            $catpost = array('pid' => $post->pid, 'title' => $title);
            $catposts[] = $catpost;
        }
        return view('backend.posts.allposts', ['posts' => $posts,  'catposts' => $catposts, 'totalPublicado' => $totalPublicado, 'mensagemSucesso' => session('mensagem.sucesso')]);
    }

    public function delete(Request $request) {
        $pid = $request->post_id;
        $nome = DB::table('posts')->where('pid', $pid)->get(['title_posts'])->first();
        $dataDelete = DB::table('posts')->where('pid', $pid)->delete();
        $posts = DB::table('posts')->get();
        return to_route('posts.all', ['posts' => $posts])->with('mensagem.sucesso', "Post '$nome->title_posts' excluído com sucesso");
    }

    public function edit(int $pid) {
        $data = DB::table('posts')->where('pid', $pid)->first();
        $postcat = DB::table('categoriespost')->where('pid', $pid)->get('cid')->all();
        foreach($postcat as $post) {
            $postarray[] = $post->cid;
        }
        $categorias = DB::table('categories')->get();
        return view('backend.posts.edit', ['post' => $data, 'categorias' => $categorias, 'postcat' => $postarray]);
    }

    public function update(Request $request) {
        $category_id = $request['category_id'];
        unset($request['category_id']);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
        }
        if(isset($request->is_recente)) {
            $isRecente = true;
        } else {
            $isRecente = false;
        }
        $request['is_recente'] = $isRecente;
        $dataUpdate = DB::table('posts')->where('pid', $request->pid)->update($request->except(['_token', 'image']));
        if($request->hasFile('image')) {
            $dataUpdate = DB::table('posts')->where('pid', $request->pid)->update(['image' => $path]);
        }
        $dadosexcluidos = DB::table('categoriespost')->where('pid', $request->pid)->whereNotIn('cid', $category_id)->delete();

        foreach($category_id as $cat) {
            $categoria = DB::table('categoriespost')->where('pid', $request->pid)->where('cid', $cat)->first();
            if(!$categoria) {
                $dataInsertCategoriesPost = DB::table('categoriespost')->insert(['cid' => $cat, 'pid' => $request->pid]);
            }
        }
        $post = DB::table('posts')->get();
        return to_route('posts.all', ['posts' => $post])->with('mensagem.sucesso', 'Post editado com sucesso'); 
    }
}
