
@extends('layouts.app')


@section('content') 


<div class="content-wrapper">
<div class="row justify-content-center">
    <div class="col-lg-11">   
               
 <div >
 <!-- FILTRO -->
 <form action="{{ route('filtro')}}" method="post" class="form form-inline">
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
<!-- FIM FILTRO -->
        <div class="table100 ver3 m-b-110">
        
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Fornecedor</th>
									<th class="cell100 column2">Date</th>
									<th class="cell100 column2">Area</th>
									<th class="cell100 column3">Volume Da Carga</th>
									<th></th>
									<th></th>
									<th></th>
									
								</tr>
							</thead>
						</table>
					</div>
     <div class="table100-body js-pscroll">
        @foreach($registros as $registro) 
        	<table >
				<tbody>
				<tr class="row100 body" id="atualizar">

 <td class="cell100 column1"  ><a type="button" data-toggle="modal" data-target="#viewmodal{{$registro->id}}" > {{mb_strtoupper($registro->fornecedor)}}</a>
                       
                       
<!-- Modal obs-->
<div class="modal fade" id="viewmodal{{$registro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
        {{$registro->relStatus->nomeStatus ?? ''}}
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
                        <td class="cell100 column2" >{{date('d/m/y',strtotime($registro->data))}}</td>
                        <td class="cell100 column3">{{$registro->relArea->nome}}</td>
						            <td class="cell100 column3">{{$registro->volume_carga}}</td>
					<!-- botao editar -->
          	<td  >
        <div >
        <form action="{{route('agendados.editar',$registro->id)}}">
<button type="submit"  class="btn btn-success -lg" data-toggle="tooltip" data-placement="top" title="Editar">
</form>
<span class="far fa-edit " aria-hidden="true"></span></button>
</td>
<!-- fim editar -->
<!-- botao deletar -->
<td>
     <button  class="btn btn-danger msgDelet "  value="{{$registro->id}}" ><span class="fa fa-times" aria-hidden="true"></span></button>
    
</td>
<!-- fim botao deletar -->
<!-- botao relatorio confirm -->
  <td>
      <form action="{{route('confirm',$registro->id)}}">
    <button type="submit" formtarget="_blank" class="btn btn-danger -lg" data-toggle="tooltip" data-placement="top" title="Relatorio">
      <span class="far fa-clipboard" aria-hidden="true"></span>
      </form>
      </button>
    </div>
  </td>
<!-- fim relatorio confirm -->
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

            <!-- <div>
  <nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <li class="page-item">
      
    </li>
    @foreach (range('1' , '12') as $value)
    <li class="page-item"><a class="page-link" href="">{{$value}}</a></li>
       @endforeach  
    </li>
  </ul>
</nav>
<br>
</div>            -->
        </div>
        
    </div>
    
</div>
<!-- modal senha -->
<div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Digite a Nova Senha:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form  method="post "action="{{route('novasenha.atualizar')}}">
        @csrf
          <div class="form-group">
            <label for="password" class="col-form-label">Observação</label>
      <input  id="password" type="password" class="form-control r" name="password" required autocomplete="password">
            
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
       
      </div>
    </div>
  </div>
</div>
<!-- end modal senha-->

<script>
$(document).ready(function(){
$('#msgSenha').on('submit', function(event){

  $('#modalsenha').modal('hide')
  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Senha Alterada com Sucesso',
  showConfirmButton: false,
  timer: 1300
})

});
});

</script>
<script>

$(document).ready(function(){
    $('.msgDelet').on('click',function(event){
        
        var id = $(this).val();
        
        Swal.fire({
            title: 'Deseja deletar o agendamento?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deletar'
        }).then((result) => {
            if (result.value) {             
              $.ajax({
            // type: "POST",
            url: "/Agendados/deletar/"+ id,
            // data: id,
            success: function( data )
            {              
               
              location.reload();


              Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Deletado com Sucesso',
  showConfirmButton: false,
  timer: 1300
})
              
            }
              });

            
            }
        });
    });
    });
</script>


@endsection

