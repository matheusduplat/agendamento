
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">          

  <div class="card-body">
  <h2 style="text-align:center">Editar Agendamento</h2><br>
<form  id="formobs" method="POST" action="{{route('agendados.atualizar',$registro->id)}}">
    @csrf
    <!-- @method('put') -->
<input type="hidden" name="_method" value="put">
    <div class="form-group row">
        <label for="fornecedor" class="col-md-4 col-form-label text-md-right">{{ __('Fornecedor') }}</label>

        <div class="col-md-6">
            <input value="{{$registro->fornecedor}}" id="fornecedor" type="text" class="form-control" name="fornecedor" required autocomplete="fornecedor" autofocus>

        </div>
    </div>
    <div class="form-row lado">
    
    <div class="form-group col-md-4 data">

        <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>
       
            <input value="{{$registro->data}}" id="data" type="date" class="form-control " name="data"  required autocomplete="data">
                   
    </div>
    <div class="form-group col-md-4 time">
                    <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Hora') }}</label>

        
            <input value="{{$registro->time}}" id="time" type="time" class="form-control " name="time"  required autocomplete="time">
            
        
    </div>
</div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="volume_carga">Volume Carga</label>                           
      <div class="col-md-6">
      <input value="{{$registro->volume_carga}}" id="volume_carga" type="text" class="form-control " name="volume_carga"  required autocomplete="volume_carga">
            
        </div>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="id_area">Area</label>                           
      <div class="col-md-6">
        <select value="{{$registro->relArea->id}}" class="custom-select" id="id_area" name="id_area">
            
              <option value="{{$registro->relArea->id}}">{{$registro->relArea->nome}}</option>
              <option value="2" >Frios/Congelados</option>
              <option value="1">Seca/Embalagem</option>
                                            
                </select>
            </div>
    </div>

    



    <div class="form-group row">
        <label for="valor_nota" class="col-md-4 col-form-label text-md-right">{{ __('Valor da Nota') }}</label>

        <div class="col-md-6">
            <input value="{{$registro->valor_nota}}" id="valor_nota" type="text" class="form-control r" name="valor_nota"  autocomplete="valor_nota">

          </div>
    </div>
    
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="observacao">Observação</label>                           
      <div class="col-md-6">
      <input value="{{$registro->observacao}}" id="observacao" type="text" class="form-control r" name="observacao" autocomplete="observacao">
        </div> 
        </div>
            
<div class="form-group row">
    <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>                        
      <div class="col-md-6">
        <select value="{{$registro->status}}" class="custom-select" id="status" name="status">
            
            <option value="{{$registro->status}}" >{{$registro->relStatus->nomeStatus}}</option>
            <option value="1" >Entregue</option>
            <option value="3">Aguardando</option>
            <option value="2">Não entregue</option>
                                            
                </select>
            </div>
</div>
<div class="form-group row">
        <label for="descarga_i" class="col-md-4 col-form-label text-md-right">{{ __('Inicio da Descarga') }}</label>

        <div class="col-md-6">
            <input value="{{$registro->descarga_i}}" id="descarga_i" type="time" class="form-control r" name="descarga_i"  autocomplete="valor_nota">

          </div>
    </div>
    <div class="form-group row">
        <label for="descarga_f" class="col-md-4 col-form-label text-md-right">{{ __('Final da Descarga') }}</label>

        <div class="col-md-6">
            <input value="{{$registro->descarga_f}}" id="descarga_f" type="time" class="form-control r" name="descarga_f"  autocomplete="valor_nota">

          </div>
    </div>
            
          <div class="col-md-6">  
     <input id="id_loja" type="hidden" value="{{ Auth::user()->id_loja }}" class="form-control r" name="id_loja" required autocomplete="id_loja">
          </div>
<div class="col-md-6">

<input id="id_users" type="hidden" value="{{Auth::user()->id }}" class="form-control r" name="id_users" required autocomplete="id_users">
   </div>
   
   
      <br>
    <div class="form-group row atualizar">
        <div class="col-md-6 offset-md-10">
            <button onClick="modal()"  type="submit" class="btn btn-primary">
                Atualizar
            </button>
        </div>

    </div>
  </form>
</div>
</div>
</div>
 </div>
</div>


<!-- modal de sucesso -->



<!-- <div id="msgCadSucessoedit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success text-center">
						<h5 class="modal-title" id="visulUsuarioModalLabel">Alteração</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Alterado  com sucesso!
					</div>
				</div>
			</div>
		</div> -->

<!-- end modal sucesso -->
<script>
$(document).ready(function(){
$('#formobs').on('submit', function(event){


  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Alterado com Sucesso',
  showConfirmButton: false,
  timer: 1500
})


});
});







</script>

@endsection