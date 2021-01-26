<?php

namespace App\Http\Controllers\relatorio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\agendar;
use App\Area;
use PDF;
use App\Exports\StatusExport;
use Maatwebsite\Excel\Facades\Excel;

class relatorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
public function pdfF(){

    $registros_frios= agendar::select('*')  
                                ->whereRaw('data=CURDATE()') 
                                -> where('id_area','=',2)
                                ->get();

 $pdf = PDF::loadView('relatorios.agendaDiaF',compact('registros_frios'));

return $pdf->setPaper('a4')->stream('Agendamento_Frios.pdf');
}
public function pdfS(){

    $registros_secos= agendar::select('*')  
                                ->whereRaw('data=CURDATE()') 
                                -> where('id_area','=',1)
                                ->get();

 $pdf = PDF::loadView('relatorios.agendaDiaS',compact('registros_secos'));

return $pdf->setPaper('a4')->stream('Agendamento_secos.pdf');
}

public function status(request $req){
    
    $area= $req->id_area;
  

    if($area == "1"){

    $registros= agendar::select('*')  
                                ->whereRaw('data=CURDATE()') 
                                -> where('id_area','=',1)
                                ->get();
  }else{

        $registros= agendar::select('*')  
        ->whereRaw('data=CURDATE()') 
        -> where('id_area','=',2)
        ->get();

    }

 $pdf = PDF::loadView('relatorios.agendaStatus',compact('registros'));

return $pdf->setPaper('a4')->stream('Agendamento_status.pdf');


}
public function confirm( $id){

    $registros= agendar::select('*')  
     
    -> where('id','=',$id)
    ->get();

 $pdf = PDF::loadView('relatorios.confirmacaoAgenda',compact('registros'));

return $pdf->setPaper('a4')->stream('Agendamento_Confirmacao.pdf');


}
public function confirm2(request $req){

    $fornecedor=$req->fornecedor;
    
    $area= area::select('*')  
     
    -> where('id','=',$req->id_area)
    ->get();
    
    
    $data=$req->data;
    $time=$req->time;


 $pdf = PDF::loadView('relatorios.confirmacaoAgenda2',compact('fornecedor','area','data','time'));

return $pdf->setPaper('a4')->stream('Agendamento_Confirmacao.pdf');


}

public function porDia(request $req, agendar $filtro){

    //  $area = $req->id_area;
     $data_i = $req->data_i;
     $data_f= $req->data_f;
    

    // $registros= agendar::select('*')
    //                     ->where('id_area','=',$area)
    //                     ->where('data','=',$data)
    //                     ->get();

    $dados= $req->all();

  $registros= $filtro->agendados($dados);
// dd($registros);



 $pdf = PDF::loadView('relatorios.agendaPorDia',compact('registros','data_i','data_f'));

return $pdf->setPaper('a4')->stream('Agendamento_PorDia.pdf');


}



public function statusPorData(request $req, agendar $filtro){

    //  $area = $req->id_area;
    $data_i = $req->data_i;
    $data_f= $req->data_f;
   

    // $registros= agendar::select('*')
    //                     ->where('id_area','=',$area)
    //                     ->where('data','=',$data)
    //                     ->get();

    $dados= $req->all();

  $registros= $filtro->agendados($dados);
// dd($registros);






 $pdf = PDF::loadView('relatorios.agendaStatusPorData',compact('registros','data_i','data_f'));

return $pdf->setPaper('a4')->stream('Agendamento_statusPorData.pdf');


}

public function statusExport(request $req){

    // $area= $req->id_area;
       
    $data_i= $req->data_i;
    $data_f= $req->data_f;


    
    return (new StatusExport($data_i,$data_f))->download('status.xlsx');

}



}
