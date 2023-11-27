<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        return view('backend.pages.index', ['mensagemSucesso' => session('mensagem.sucesso')]);
    }

    public function all() {
        $pages = DB::table('pages')->orderBy('pageid', 'desc')->paginate(20);
        $totalPublicado = DB::table('pages')->where('status', 'publicado')->count();
        return view('backend.pages.allpages', ['pages' => $pages, 'totalPublicado' => $totalPublicado, 'mensagemSucesso' => session('mensagem.sucesso')]);
    }

    public function add(Request $request) {
        $dataInsert = Page::create($request->except(['_token']));
        return to_route('pages.index')->with('mensagem.sucesso', "Página cadastrada com sucesso");
    }

    public function edit(int $pageid) {
        $data = DB::table('pages')->where('pageid', $pageid)->first();
        return view('backend.pages.edit', ['page' => $data]);
    }

    public function update(Request $request) {
        $dataUpdate = DB::table('pages')->where('pageid', $request->pageid)->update($request->except(['_token']));
        $pages = DB::table('pages')->get();
        return to_route('pages.all', ['pages' => $pages])->with('mensagem.sucesso', 'Página editada com sucesso'); 
    }

    public function delete(Request $request) {
        $title = DB::table('pages')->where('pageid', $request->post_id)->first('title');
        $pages = DB::table('pages')->where('pageid', $request->post_id)->delete();
        $pages = DB::table('pages')->orderBy('pageid', 'desc')->paginate(20);
        return to_route('pages.all', ['pages' => $pages])->with('mensagem.sucesso', "Página '$title->title' excluída com sucesso");
    }
}
