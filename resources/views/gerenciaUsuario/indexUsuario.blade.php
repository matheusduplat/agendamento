
@extends('layouts.app')


@section('content')


<div class="content-wrapper">

    <div class="row justify-content-center">
    <div class="col-lg-10">   
     
    <a class="btn btn-primary" href="{{route('cadastra.usuario')}}">Novo Usuario</a>
    
      
            
          
          <div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column3">Nome</th>
									<th class="cell100 column3">Email</th>
									<th class="cell100 column3">Area</th>   
                                    <th class="cell100 column3">Loja</th>
                                    <th></th>
									<th></th>
									                        
                                   
                                    
                                    
                                 
									
								</tr>
							</thead>
						</table>
					</div>
     <div class="table100-body js-pscroll">        
  <table>
   
				<tbody class="items">
        @foreach($registros as $registro) 
				<tr class="row100 body" >

        <td class="cell100 column1">{{mb_strtoupper($registro->name)}}</td>
        <td class="cell100 column2">{{$registro->email}}</td>
        <td class="cell100 column3">{{$registro->relArea->nome}}</td>
        <td class="cell100 column3" >{{$registro->relLoja->nome}}</td>
        <td>
        <div >
        <form action="{{route('gerenciamento.editar',$registro->id)}}">
<button type="submit"  class="btn btn-success -lg" data-toggle="tooltip" data-placement="top" title="Editar">
</form>
<span class="far fa-edit " aria-hidden="true"></span></button>
</td>
 <!-- <td>
 <form id="msgDelet" action="{{route('gerenciamento.deletar',$registro->id)}}">

   

    <button  type="submit" class="btn btn-danger -lg msgDelet" data-toggle="tooltip" data-placement="top" title="Deletar">
    </form>
      <span class="fa fa-times" aria-hidden="true"></span></button>
   </div>
</td> -->

						
        
</div>
        </tr>              
  @endforeach

  </tbody>




            </table>
                  
                </div>
</div>



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
    
        <form id="msgSenha" method="post "action="{{route('novasenha.atualizar')}}">
        @csrf
          <div class="form-group">
            <label for="password" class="col-form-label">Alterar Senha</label>
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


@endsection

