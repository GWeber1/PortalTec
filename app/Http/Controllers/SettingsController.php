<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index() {
        $data = DB::table('settings')->first();
        if($data){
            $data->social = str_replace(['[', ']', '"'], '', $data->social);
            $data->social = str_replace('\/', '/', $data->social);
            $data->social = explode(',', $data->social);
        }
        return view('backend.settings.index', ['data' => $data, 'mensagemSucesso' => session('mensagem.sucesso')]);
    }

    public function add(Request $request) {
        if($request->has('social')) {
            $request['social'] = implode(',', $request['social']);
        }

        $requestPath = $request->hasFile('image') ? $request->file('image')->store('settings', 'public') : null;
        $dataInsert = Setting::create($request->except(['_token', 'image']));
        $dataInsert = DB::table('settings')->where('sid', $dataInsert['sid'])->update(['image' => $requestPath]);
        $data = DB::table('settings')->first();
        return to_route('settings.index', ['data' => $data])->with('mensagem.sucesso', 'Configurações atualizadas com sucesso');
    }

    public function update(Request $request) {
        $data = DB::table('settings')->first();

        if($request->has('social')) {
            $request['social'] = implode(',', $request['social']);
        }

        $dataUpdate = DB::table('settings')->where('sid', $data->sid)->update($request->except(['_token', 'image']));

        if ($request->hasFile('image')) {
            Storage::deleteDirectory('public/settings');
            $requestPath = $request->file('image')->store('settings', 'public');
            $dataUpdate = DB::table('settings')->where('sid', $data->sid)->update(['image' => $requestPath]);
        }
        
        return to_route('settings.index', ['data' => $data])->with('mensagem.sucesso', 'Configurações atualizadas com sucesso');
    }
}
