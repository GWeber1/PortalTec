<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function all() {
        $data = DB::table('messages')->orderBy('mid', 'DESC')->paginate(20);
        return view('backend.messages.index', ['messages' => $data, 'mensagemSucesso' => session('mensagem.sucesso')]);
    }

    public function delete(Request $request) {
        $dataDeleted = DB::table('messages')->where('mid', $request->post_id)->delete();
        $data = DB::table('messages')->orderBy('mid', 'DESC')->paginate(20);
        return view('backend.messages.index', ['messages' => $data, 'mensagemSucesso' => 'Mensagem excluída com sucesso']);
    }
}
