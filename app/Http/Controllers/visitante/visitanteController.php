<?php

namespace App\Http\Controllers\visitante;

use App\Http\Controllers\Controller;
use App\agendar;
use App\User;
use App\loja;
use App\Area;
use Illuminate\Http\Request;

class visitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area =area::all();
        
         $registros= agendar::select('*')
                
                ->whereRaw('data=CURDATE()')               
                ->get();        
        
    
        $registros_secos= agendar::select('*')       
                                   
                                    ->whereRaw('data=CURDATE()') 
                                    -> where('id_area','=',1)
                                    ->get();
        $registros_frios= agendar::select('*')    
                                    
                                    ->whereRaw('data=CURDATE()') 
                                    -> where('id_area','=',2)
                                    ->get();
        
         return view('visitante.visitante',compact('registros','registros_secos','registros_frios','area'));
    }

    private $totalPage =30000;
    public function agendados()
    {

        $area =area::all();
        $registros= agendar::select('*')                            
                            ->orderBy('data','DESC')
                            ->paginate($this->totalPage);
        
                
        return view('visitante.visitanteAgendados',compact('registros','area'));
    }

    public function filtro(request $req, agendar $filtro){


        $dados= $req->except('_token');
 
        
 
        $registros= $filtro->buscar($dados, $this->totalPage);     
     //    dd($registros);
        $area =area::all();      
        
        return view('visitante.visitanteAgendados',compact('registros','area','dados'));
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
    public function edit(agendar $agendar)
    {
        //
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
        //
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
