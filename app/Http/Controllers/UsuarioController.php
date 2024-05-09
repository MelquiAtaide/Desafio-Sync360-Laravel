<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImgRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class UsuarioController extends Controller
{
    public function perfil(){
        $usuario = Usuario::findOrFail(1);

        return view('perfil', ['usuario' => $usuario]);
    }
    public function editarUsuario(UsuarioRequest $request, $id){
        try {
            $usuario = Usuario::findOrFail($id);
            Endereco::findOrFail($usuario->endereco_id)->update([
                'rua' => $request->rua,
                'bairro' => $request->bairro,
                'estado' => $request->estado,
                'cidade' => $request->cidade,
            ]);
            $usuario->nome = $request->nome;
            $usuario->data_nascimento = $request->data_nascimento;
            $usuario->biografia = $request->biografia;
            $usuario->save();
            return redirect()->back()->with('sucesso', 'Editado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('erro', 'Erro ao tentar editar!');
        }
    }
    public function editarImagemUsuario(UploadImgRequest $request, $id){
        $usuario = Usuario::findOrFail($id);
        if ($request->hasFile('img_perfil') && $request->file('img_perfil')->isValid()) {
            $requestImg = $request->img_perfil;
            $extension = $requestImg->extension();
            $imgNome = md5($requestImg->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImg->move(public_path('img/perfil'), $imgNome);
            $usuario->img_perfil = $imgNome;
        }
        $usuario->save();
        return redirect()->back()->with('sucesso', 'Editado com sucesso!');
    }
}
