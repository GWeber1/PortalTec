<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionsController extends Controller
{
    public function index() {
        $data = DB::table('positions')->orderBy('pid', 'asc')->get();
        return view('backend.positions.index', ['data' => $data, 'mensagemSucesso' => session('mensagem.sucesso'), 'mensagemErro' => session('mensagem.erro'), 'mensagemAlerta' => session('mensagem.alerta')]);
    }

    public function edit(int $pid) {
        $singledata = DB::table('positions')->get()->where('pid', $pid)->first();
        $data = DB::table('positions')->orderBy('pid', 'asc')->get();
        return view('backend.positions.editposition', ['data' => $data, 'singledata' => $singledata, 'pid' => $pid]);
    }

    public function update(Request $request) {
        $request['updated_at'] = date('Y-m-d h:i:s');
        $dataUpdate = DB::table('positions')->where('pid', $request->id)->update($request->except(['_token', 'id']));
        $data = DB::table('positions')->orderBy('pid', 'asc')->get();
        return to_route('positions.index', ['data' => $data])->with('mensagem.sucesso', "Mural '$request->nome' atualizado com sucesso");
    }

    public function add(Request $request) {
        $dataInsert = Position::create($request->except(['_token']));
        $data = DB::table('positions')->orderBy('pid', 'asc')->get();
        return to_route('positions.index', ['data' => $data])->with('mensagem.sucesso', "Mural '$dataInsert->nome' inserido com sucesso");
    }

    public function delete(Request $request) {
        $pid = $request->position_id;
        $nome = DB::table('positions')->where('pid', $pid)->get(['nome'])->first();
        $categorias = DB::table('categories')->where('position_id', $pid)->first();
        $data = DB::table('positions')->orderBy('pid', 'asc')->get();
        if(!is_null($categorias)) {
            return to_route('positions.index', ['data' => $data])->with('mensagem.erro', "Mural possui categorias vinculadas e não pode ser excluído");
        }
        $dataDelete = DB::table('positions')->where('pid', $pid)->delete();
        return to_route('positions.index', ['data' => $data])->with('mensagem.sucesso', "Mural '$nome->nome' excluído com sucesso");
    }
}
