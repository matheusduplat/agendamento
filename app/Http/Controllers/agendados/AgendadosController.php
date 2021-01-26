<?php

namespace App\Http\Controllers\agendados;

use App\Http\Controllers\Controller;
use App\agendar;
use App\Area;
use Illuminate\Http\Request;

class AgendadosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $totalPage =30000;
    public function index()
    {

        $area =area::all();
        $registros= agendar::select('*')                            
                            ->orderBy('data','DESC')
                            ->paginate($this->totalPage);
        
                
        return view('agendados.agendados',compact('registros','area'));
    }

    public function atualizar(request $req, $id){

        // $dados= $req->all();   


        // agendar::find($id)->update($dados);

       $dados=agendar::find($id);
        $dados->fornecedor=$req->fornecedor;
        $dados->data=$req->data;
        $dados->volume_carga=$req->volume_carga;
        $dados->id_area=$req->id_area;
        $dados->valor_nota=$req->valor_nota;
        $dados->observacao=$req->observacao;
        $dados->status=$req->status;
        $dados->id_loja=$req->id_loja;
        $dados->id_users=$req->id_users;
        $dados->time=$req->time;
        $dados->descarga_i=$req->descarga_i;
        $dados->descarga_f=$req->descarga_f;
        $dados->save();

        return redirect()->route('agendados');


    }


    public function filtro(request $req, agendar $filtro){


       $dados= $req->except('_token');

       

       $registros= $filtro->buscar($dados, $this->totalPage);     
    //    dd($registros);
       $area =area::all();      
       
       return view('agendados.agendados',compact('registros','area','dados'));
    }

    



    public function deletar($id){


            agendar::find($id)->delete();

            return redirect()->route('agendados');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\agendar  $agendar
     * @return \Illuminate\Http\Response
     */
    public function show(agendar $agendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agendar  $agendar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = agendar::find($id);
            
        return view('agendados.edit',compact('registro'));


    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agendar  $agendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agendar $agendar)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agendar  $agendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(agendar $agendar)
    {
        //
    }
}
