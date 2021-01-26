
@extends('layouts.appvisi')


@section('content')
<style>
.filtro{

background-color:  #800c0c;
color: #ffff; 

}
</style>

<div class="content-wrapper">

    <div class="row justify-content-center">
    <div class="col-lg-10">   
     
    
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <button class="btn  filtro"  data-categoria="todos">todos</button>
              <button class="btn  filtro"  data-categoria="secos">seco</button>
              <button class="btn  filtro"  data-categoria="frios">frios</button>
              
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
  <table>
    <!-- tabela secos -->
				<tbody class="items">
        @foreach($registros_secos as $registro_s) 
				<tr class="row100 body secos" >

        <td class="cell100 column1">{{mb_strtoupper($registro_s->fornecedor)}}</td>
        <td class="cell100 column2">{{date('d/m/y',strtotime($registro_s->data))}}</td>
        <td class="cell100 column3">{{$registro_s->relArea->nome}}</td>
        
        <td class="cell100 column3">{{$registro_s->relStatus->nomeStatus}}</td>
				<td class="cell100 column3"><button  type="button"  data-toggle="modal" data-target="#obs_s{{$registro_s->id}}"  class="btn btn-success -lg" data-toggle="tooltip" data-placement="top" title="Observação">
      <span class="fa fa-check" aria-hidden="true"></span></button></td>		
        <div >  

<!-- Modal obs-->
<div class="modal fade" id="obs_s{{$registro_s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
        {{$registro_s->relStatus->nomeStatus ?? ''}}
      </div>
      <div class="modal-body">
      <label for="observacao" class="col-form-label">Observação:</label>
           {{$registro_s->observacao ?? ''}}
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
<!-- end secos -->
<!-- tabela frios -->
<tbody class="items">
        @foreach($registros_frios as $registro_f) 
				<tr class="row100 body frios" >

        <td class="cell100 column1">{{mb_strtoupper($registro_f->fornecedor)}}</td>
        <td class="cell100 column2">{{date('d/m/y',strtotime($registro_f->data))}}</td>
        <td class="cell100 column3">{{$registro_f->relArea->nome}}</td>        
        <td class="cell100 column3">{{$registro_f->relStatus->nomeStatus}}</td>
        <td class="cell100 column3"><button  type="button"  data-toggle="modal" data-target="#obs_f{{$registro_f->id}}"  class="btn btn-success -lg" data-toggle="tooltip" data-placement="top" title="Observação">
      <span class="fa fa-check" aria-hidden="true"></span></button></td>		
        <div >  

<!-- Modal obs-->
<div class="modal fade" id="obs_f{{$registro_f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
        {{$registro_f->relStatus->nomeStatus ?? ''}}
      </div>
      <div class="modal-body">
      <label for="observacao" class="col-form-label">Observação:</label>
           {{$registro_f->observacao ?? ''}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- end modal obs -->
						
        <div >

      
  
 
</td>
</div>
				</tr>
                 
                @endforeach

                
                
            </tbody>



<!-- end frios -->


            </table>
                  
                </div>
</div>
<!-- end todos -->


        </div>
    </div>
</div>







<script>
    $('.filtro').on('click', function(){
  var categoria = $(this).attr('data-categoria')
  if(categoria == 'todos'){
        $('.items tr').show()
  }else{
  $('.items tr').each(function(){
    if(!$(this).hasClass(categoria)){
      $(this).hide()
    }else{
      $(this).show()
    }
    })
  }
})

  </script>






@endsection

