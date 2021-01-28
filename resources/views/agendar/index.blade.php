@extends('layouts.app')

@section('content')


<div class="content-wrapper">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">          

  <div class="card-body">
<form id="cadastro" method="POST" action="{{route('agendar.salvar')}}">
<!-- <form action="" id="cadastro" method=""> -->
    @csrf

    <div class="form-group row">
        <label for="fornecedor" class="col-md-4 col-form-label text-md-right">{{ __('Fornecedor') }}</label>

        <div class="col-md-6">
            <input id="fornecedor" type="text" class="form-control" name="fornecedor" required autocomplete="fornecedor" autofocus>

        </div>
    </div>
    <div class="form-group row">
        <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

        <div class="col-md-6">
            <input id="data" type="date" class="form-control " name="data"  required autocomplete="data">
            
        </div>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="volume_carga">Volume Carga</label>                           
      <div class="col-md-6">
      <input id="volume_carga" type="text" class="form-control " name="volume_carga"  required autocomplete="volume_carga">
            
        </div>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="id_area">Area</label>                           
      <div class="col-md-6">
        <select class="custom-select" id="id_area" name="id_area">
        <option  ></option>      
        <option value="2" >Frios/Congelados</option>
              <option value="1">Seca/Embalagem</option>
                                            
                </select>
            </div>
    </div>
    <div class="form-group row">
        <label for="valor_nota" class="col-md-4 col-form-label text-md-right">{{ __('Valor da Nota') }}</label>

        <div class="col-md-6">
            <input id="valor_nota" type="text" class="form-control r" name="valor_nota"  >

          </div>
    </div>
    <div class="form-group row">
        <label for="id_loja" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

        <div class="col-md-6">
            <input id="id_loja" type="hidden" value="{{ Auth::user()->id_loja }}" class="form-control r" name="id_loja" required autocomplete="id_loja">

          </div>
          <div class="col-md-6">
            <input id="id_users" type="hidden" value="{{Auth::user()->id }}" class="form-control r" name="id_users" required autocomplete="id_users">
              
          </div>
    </div>
    
    <div class="form-group row">
        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

        <div class="col-md-6">
            <input id="status" type="hidden" value="3" class="form-control r" name="status" required autocomplete="status">

          </div>
    </div>               
    
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" formtarget="_blank"class="btn btn-primary">
                Agendar
            </button>
        </div>

        
    </div>
  </form>
</div>
</div>
</div>
  </div>
</div>


<script>

$(function(){
  $("#valor_nota").mask("###.###.###.##0,00", {reverse: true});
});

</script>




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
            <label for="password" class="col-form-label">Nova Senha</label>
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

<!-- modal confima agendamento -->
<div class="modal" id="modalconfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <a type="button" id="confirm" target="_blank" class="btn btn-primary">Save changes</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- end modal confirma -->
<!-- <script>
$(document).ready(function(){
  $('#cadastro').on('submit', function(event){
        var dados = $( this ).serialize();        
        $.ajax({
            type: "POST",
            url: "{{route('agendar.salvar')}}",
            data: dados,
            success: function( data )
            {              
               $('form').trigger("reset");
               
              
            }
              });
              
              return redirect()->route('confirm2',compact('fornecedor','area','data'));
        
    });
});




</script> -->
<script>
$(document).ready(function(){

$('#cadastro').on('submit', function(event){
  Swal.fire({
  title: 'Agendado Com Sucesso',
  
  icon: 'success',  
  confirmButtonColor: '#3085d6',  
  confirmButtonText: 'OK'
}).then((result) => {
  if (result.value) {
    
    $('form').trigger("reset");

  }
})
  

  });
  });



</script>
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

<!-- end script -->


@endsection