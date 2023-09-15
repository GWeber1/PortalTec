<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $data = DB::table('categories')->get();
        return view('backend.categories.index', ['data' => $data, 'mensagemSucesso' => session('mensagem.sucesso'), 'mensagemAlerta' => session('mensagem.alerta')]);
    }

    public function add(Request $request) {
        $dataInsert = Category::create($request->except(['_token']));
        $data = DB::table('categories')->get();
        return to_route('category.index', ['data' => $data])->with('mensagem.sucesso', "Categoria '$dataInsert->title' inserida com sucesso");
    }

    public function edit(int $cid) {
        $singledata = DB::table('categories')->get()->where('cid', $cid)->first();
        $data = DB::table('categories')->get();
        return view('backend.categories.editcategory', ['data' => $data, 'singledata' => $singledata, 'cid' => $cid]);
    }

    public function update(Request $request) {
        $request['updated_at'] = date('Y-m-d h:i:s');
        $dataUpdate = DB::table('categories')->where('cid', $request->id)->update($request->except(['_token', 'id']));
        $data = DB::table('categories')->get();
        return to_route('category.index', ['data' => $data])->with('mensagem.sucesso', "Categoria '$request->title' atualizada com sucesso");
    }

    public function delete(int $cid) {
        $nome = DB::table('categories')->where('cid', $cid)->get(['title'])->first();
        $dataDelete = DB::table('categories')->where('cid', $cid)->delete();
        $data = DB::table('categories')->get();
        return to_route('category.index', ['data' => $data])->with('mensagem.sucesso', "Categoria '$nome->title' excluída com sucesso");
    }
}