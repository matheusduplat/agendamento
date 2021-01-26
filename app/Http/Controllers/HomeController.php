<?php

namespace App\Http\Controllers;

use App\agendar;
use App\User;
use App\loja;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
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
        
         return view('home',compact('registros','registros_secos','registros_frios','area'));

    }

    public function atualizar(request $req, $id){

       
        $dados=agendar::find($id);        
        $dados->observacao=$req->observacao;
        $dados->status=$req->status;
        
       
        $dados->save();

        return redirect()->route('home');


    }

    public function descargar(request $req, $id){

       
        $dados=agendar::find($id);        
        $dados->descarga_i=$req->descarga_i;
        
        
       
        $dados->save();

        return redirect()->route('home');


    }
    public function descargarf(request $req, $id){

       
        $dados=agendar::find($id);        
       
        $dados->descarga_f=$req->descarga_f;
        
       
        $dados->save();

        return redirect()->route('home');


    }



    public function senha(request $req){

        
        $dados= auth()->user();
    
         $dados->password = bcrypt($req->password);
        // // $dados->status=$req->status;
       
         $dados->save();



     
       
        return redirect()->route('home');


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       

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
