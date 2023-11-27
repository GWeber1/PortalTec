<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $data = DB::table('categories')->orderBy('cid', 'asc')->get();
        $position = DB::table('positions')->get();
        return view('backend.categories.index', ['data' => $data, 'position' => $position, 'mensagemSucesso' => session('mensagem.sucesso'), 'mensagemErro' => session('mensagem.erro'), 'mensagemAlerta' => session('mensagem.alerta')]);
    }

    public function add(Request $request) {
        $dataInsert = Category::create($request->except(['_token']));
        $position = DB::table('positions')->where('status', 'Ativo')->get();
        $data = DB::table('categories')->orderBy('cid', 'asc')->get();
        return to_route('category.index', ['data' => $data, 'position' => $position])->with('mensagem.sucesso', "Categoria '$dataInsert->title' inserida com sucesso");
    }

    public function edit(int $cid) {
        $singledata = DB::table('categories')->get()->where('cid', $cid)->first();
        $position = DB::table('positions')->where('status', 'Ativo')->get();
        $data = DB::table('categories')->orderBy('cid', 'asc')->get();
        return view('backend.categories.editcategory', ['data' => $data, 'position' => $position, 'singledata' => $singledata, 'cid' => $cid]);
    }

    public function update(Request $request) {
        $request['updated_at'] = date('Y-m-d h:i:s');
        $dataUpdate = DB::table('categories')->where('cid', $request->id)->update($request->except(['_token', 'id']));
        $position = DB::table('positions')->where('status', 'Ativo')->get();
        $data = DB::table('categories')->orderBy('cid', 'asc')->get();
        return to_route('category.index', ['data' => $data, 'position' => $position])->with('mensagem.sucesso', "Categoria '$request->title' atualizada com sucesso");
    }

    public function delete(Request $request) {
        $cid = $request->category_id;
        $nome = DB::table('categories')->where('cid', $cid)->get(['title'])->first();
        $noticias = DB::table('posts')->where('category_id', 'LIKE', $cid . ',%')->orWhere('category_id', 'LIKE', $cid)->first();
        $data = DB::table('categories')->orderBy('cid', 'asc')->get();
        if(!is_null($noticias)) {
            return to_route('category.index', ['data' => $data])->with('mensagem.erro', "Categoria possui notícias vinculadas e não pode ser excluída");
        }
        $dataDelete = DB::table('categories')->where('cid', $cid)->delete();
        return to_route('category.index', ['data' => $data])->with('mensagem.sucesso', "Categoria '$nome->title' excluída com sucesso");
    }
}
