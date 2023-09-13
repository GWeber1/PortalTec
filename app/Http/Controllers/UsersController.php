<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index() {
        $data = DB::table('users')->get()->except(['password', 'remember_token']);
        return to_route('users.index', ['data' => $data, 'mensagemSucesso' => session('mensagem.sucesso'), 'mensagemAlerta' => session('mensagem.alerta')]);
    }
}
