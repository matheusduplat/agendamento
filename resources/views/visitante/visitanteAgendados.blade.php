
@extends('layouts.appvisi')


@section('content') 


<div class="content-wrapper">
<div class="row justify-content-center">
    <div class="col-lg-10">   
              
 <div >
 <form action="{{ route('visitante.filtro')}}" method="post" class="form form-inline">
 @csrf
  <!-- <input type="hidden" name="_method" value="get"> -->
         <div class="col-auto">
            <input type="text" name="fornecedor" class="form-control r" placeholder="FORNECEDOR"> 
         </div>
         <div class="col-auto">                  
            <input type="date" name="data_i" class="form-control">  
           A   
            <input type="date" name="data_f" class="form-control">          
         </div>            
        <div class="col-auto">
       
        <select class="custom-select" id="area" name="area" >
            <option value="" >Area</option>
            @foreach($area as $areas)
              <option value="{{$areas->id}}">{{$areas->nome}}</option>
                @endforeach               
                                            
                </select>
        </div>


          <div class="col-auto my-1" >
              <button type="submit" class="btn btn-primary">Filtrar</button>
          </div>
   </form>
 </div>

        <div class="table100 ver3 m-b-110">
        
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
                                <th class="cell100 column1">Fornecedor</th>
									<th class="cell100 column2">Date</th>
									<th class="cell100 column3">Area</th>
                                    
                                    <th class="cell100 column3">Status</th>
                                    <th class="cell100 column4">Observação</th>
                                    
									
								</tr>
							</thead>
						</table>
					</div>
     <div class="table100-body js-pscroll">
        @foreach($registros as $registro) 
        	<table>
				<tbody>
				<tr class="row100 body" >

        <td class="cell100 column1">{{mb_strtoupper($registro->fornecedor)}}</td>
        <td class="cell100 column2">{{date('d/m/y',strtotime($registro->data))}}</td>
        <td class="cell100 column3">{{$registro->relArea->nome}}</td>
        
        <td class="cell100 column3">{{$registro->relStatus->nomeStatus}}</td>
				<td class="cell100 column3"><button  type="button"  data-toggle="modal" data-target="#obs{{$registro->id}}"  class="btn btn-success -lg" data-toggle="tooltip" data-placement="top" title="Observação">
      <span class="fa fa-check" aria-hidden="true"></span></button></td>		
        <div >  

<!-- Modal obs-->
<div class="modal fade" id="obs{{$registro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Observação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for="status" class="col-form-label">Status:</label>
        {{$registro->status ?? ''}}
      </div>
      <div class="modal-body">
      <label for="observacao" class="col-form-label">Observação:</label>
           {{$registro->observacao ?? ''}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- end modal obs -->
 
</td>
</div>
        </tr>              
                 
                @endforeach
            </tbody>

            </table>
              
                </div>
                
                </div>
                @if(isset($dados))
                {{$registros->appends($dados)->links() }}
                
                @else
                {{ $registros->links()}}

                @endif

          
        </div>
        
    </div>
    
</div>







@endsection

