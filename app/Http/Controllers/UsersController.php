<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index() {
        $data = DB::table('users')->get()->except(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at']);
        return view('backend.users.index', ['data' => $data, 'mensagemSucesso' => session('mensagem.sucesso'), 'mensagemErro' => session('mensagem.erro')]);
    }

    public function add(Request $request) {
        $mensagemErro = null;
        $data = DB::table('users')->get()->except(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at']);
        $emailExiste = DB::table('users')->where('email', $request->email)->first();
        
        if($request->password != $request->passwordConfirm) {
            $mensagemErro = 'As senhas não coincidem';
        }

        if (isset($emailExiste)) {
            $mensagemErro = 'E-mail já cadastrado';
        }

        if(!is_null($mensagemErro)) {
            return to_route('users.index', ['data' => $data])->with('mensagem.erro', $mensagemErro);
        }
        $status = $request->status;
        $insert = User::create($request->except(['_token', 'passwordConfirm']));
        $id = DB::table('users')->orderBy('id', 'desc')->first('id');
        $updateStatus = DB::table('users')->where('id', $id->id)->update(['status' => $status]);
        $data = DB::table('users')->get()->except(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at']);
        return to_route('users.index', ['data' => $data])->with('mensagem.sucesso', 'Usuário criado com sucesso');
    }

    public function delete(Request $request) {
        $delete = DB::table('users')->where('id', $request->category_id)->delete();
        $data = DB::table('users')->get()->except(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at']);
        return to_route('users.index', ['data' => $data])->with('mensagem.sucesso', 'Usuário excluído com sucesso');
    }

    public function edit(int $id) {
        $singledata = DB::table('users')->get()->where('id', $id)->first();
        $data = DB::table('users')->orderBy('id', 'asc')->get();
        return view('backend.users.edituser', ['data' => $data, 'singledata' => $singledata, 'id' => $id]);
    }

    public function update(Request $request) {
        if(!$request->password) {
            $password = DB::table('users')->where('id', $request->id)->first('password');
            $request['password'] = $password->password;
        }
        $request['updated_at'] = date('Y-m-d h:i:s');
        $dataUpdate = DB::table('users')->where('id', $request->id)->update($request->except(['_token', 'id', 'passwordConfirm']));
        $data = DB::table('users')->orderBy('id', 'asc')->get();
        return to_route('users.index', ['data' => $data])->with('mensagem.sucesso', "Usuário '$request->name' atualizado com sucesso");
    }
}
