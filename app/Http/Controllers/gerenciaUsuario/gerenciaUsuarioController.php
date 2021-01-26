<?php

namespace App\Http\Controllers\gerenciaUsuario;

use App\Http\Controllers\Controller;
use App\User;
use App\Area;
use App\loja;
use App\agendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class gerenciaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $area =area::all();
        
        $registros= User::select('*')               
               ->orderBy('name')               
               ->get();        
       
   
       
        return view('gerenciaUsuario.indexUsuario',compact('registros','area'));






    }


    public function atualizar(request $req, $id){

        // $dados= $req->all();   


        // agendar::find($id)->update($dados);

       $dados=User::find($id);
        $dados->name=$req->name;
        $dados->email=$req->email;
        $dados->id_loja=$req->id_loja;
        $dados->id_area=$req->id_area;
        $dados->tipo=$req->tipo;
        $dados->password = bcrypt($req->password);
        $dados->save();

        return redirect()->route('gerenciamento');


    }



    public function cadastrar()
    {
        $loja =loja::all();
        $area =area::all();
        

        return view('gerenciaUsuario.cadastrar',compact('loja','area'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
           
        $params = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_area'=> $data['id_area'],
            'id_loja'=> $data['id_loja'],
            'tipo'=> $data['tipo'],
        ];
        
        $user = User::create($params);

            return redirect()->route('gerenciamento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $loja =loja::all();
        $area =area::all();
        $registro = User::find($id);
            
        return view('gerenciaUsuario.editarUsuario',compact('registro','loja','area'));


    }


    public function deletar( $id){
        
    
        User::find($id)->Delete();

            return redirect()->route('gerenciamento');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
