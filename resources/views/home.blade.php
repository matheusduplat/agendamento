
@extends('layouts.app')


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
    <h3 class="dia">Agendados do dia {{date('d/m/y',strtotime(now()))}}</h3>    
    
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <button class="btn filtro"  data-categoria="todos">todos</button>
              <button class="btn filtro"  data-categoria="secos">seco</button>
              <button class="btn filtro"  data-categoria="frios">frios</button>
              

            </div>  
      
            
          
          <div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Fornecedor</th>								
									<th class="cell100 column2">Area</th>
                                    <th class="cell100 column4">Volume Da Carga</th>
                                    <th class="cell100 column5">Descarga</th>
                                    <th class="cell100 column5">Status</th>
                                    <th></th>
                                    
                                 
									
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
      
        <td class="cell100 column3">{{$registro_s->relArea->nome}}</td>
        <td class="cell100 column3">{{$registro_s->volume_carga}}</td>
        <td class="cell100 column3">  
        <button   class="btn btn-info descarga des_i " value="{{$registro_s->id}}" >Inicio</button>
        
        <button   class="btn btn-info descarga des_f" value="{{$registro_s->id}}">Fim</button>

      
      </td>
						<td >
        <div >

 
 <!-- <button  type="button"  data-toggle="modal" data-target="#entregue_s{{$registro_s->id}}"  class="btn btn-success -lg" data-toggle="tooltip" data-placement="top" title="Observação">
      <span class="fa fa-check" aria-hidden="true"></span></button> -->
  <!-- bottao entregue seco -->
<button  class="btn btn-success aprovado_s" value="{{$registro_s->id}}" ><span class="fa fa-check" aria-hidden="true"></span></button>
<!-- fim entregue seco -->


   

 </td>
 <td>

    <!-- <button  type="button"  data-toggle="modal" data-target="#observacao_s{{$registro_s->id}}"  class="btn btn-danger -lg" data-toggle="tooltip" data-placement="top" title="Observação">
      <span class="fa fa-times" aria-hidden="true"></span></button> -->
  
    <!-- bottao obs seco -->
  <button  class="btn btn-danger obsedit_s" value="{{$registro_s->id}}" ><span class="fa fa-times" aria-hidden="true"></span></button>
<!-- fim obs seco --> 



 
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
        
        <td class="cell100 column3">{{$registro_f->relArea->nome}}</td>
        <td class="cell100 column3">{{$registro_f->volume_carga}}</td>
        <td class="cell100 column3">  
        <button  class="btn btn-info descarga des_i " value="{{$registro_f->id}}" >Inicio</button>
        
        <button   class="btn btn-info descarga des_f" value="{{$registro_f->id}}">Fim</button>

      
      </td>
						<td  >
        <div >

      
  
 <!-- <button  type="button"  data-toggle="modal" data-target="#entregue_f{{$registro_f->id}}"  class="btn btn-success -lg" data-toggle="tooltip" data-placement="top" title="Observação">
      <span class="fa fa-check" aria-hidden="true"></span></button> -->
  
    <!-- bottao entregue frios -->
<button  class="btn btn-success aprovado_f" value="{{$registro_f->id}}" ><span class="fa fa-check" aria-hidden="true"></span></button>
<!-- fim entregue frios -->


 </td>
 <td>
<!-- 
    <button  type="button"  data-toggle="modal" data-target="#observacao_f{{$registro_f->id}}"  class="btn btn-danger -lg" data-toggle="tooltip" data-placement="top" title="Observação">
      <span class="fa fa-times" aria-hidden="true"></span></button> -->
      
      
<!-- bottao obs frios -->
  <button  class="btn btn-danger obsedit_f" value="{{$registro_f->id}}" ><span class="fa fa-times" aria-hidden="true"></span></button>
<!-- fim obs frios --> 
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
 <!-- modal entregue seco -->
 <div class="modal fade entregue_s"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entregue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <!-- <form id="msgAprovado" method="post" action="{{route('home.atualizar',$registro_s->id ?? '')}}" > -->
       <form action="" id="msgAprovado_s" method="post">
       
        @csrf
          <!-- {{method_field('put')}} -->

          <div class="form-group">           
          <input type="hidden" value="1" class="form-control" name="status" id="status"  autocomplete="status">

          </div>
          <div class="form-group">
            <label for="observacao" class="col-form-label">Observação:</label>
            <input  type="text"  class="form-control" name="observacao" id="observacao"  autocomplete="observacao">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary msgAprovado_s">Salvar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!-- end modal Entregue -->


<!-- modal entregue frios -->
<div class="modal fade entregue_f"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entregue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <!-- <form id="msgAprovado" method="post" action="{{route('home.atualizar',$registro_s->id ?? '')}}" > -->
       <form action="" id="msgAprovado_f" method="post">
       
        @csrf
          <!-- {{method_field('put')}} -->

          <div class="form-group">           
          <input type="hidden" value="1" class="form-control" name="status" id="status"  autocomplete="status">

          </div>
          <div class="form-group">
            <label for="observacao" class="col-form-label">Observação:</label>
            <input  type="text"  class="form-control" name="observacao" id="observacao"  autocomplete="observacao">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary msgAprovado_f">Salvar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!-- end modal Entregue -->
<!-- modal observacao frios -->

<div class="modal fade observacao_f"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Não Entregue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <!-- <form id="msgAprovado" method="post" action="{{route('home.atualizar',$registro_s->id ?? '')}}" > -->
       <form action="" id="obs_f" method="post">
       
        @csrf
          <!-- {{method_field('put')}} -->

          <div class="form-group">           
          <input type="hidden" value="2" class="form-control" name="status" id="status"  autocomplete="status">

          </div>
          <div class="form-group">
            <label for="observacao" class="col-form-label">Observação:</label>
            <input  type="text"  class="form-control" name="observacao" id="observacao"  autocomplete="observacao">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary obs_f">Salvar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<!-- end modal observacao -->

<!-- modal observacao secos -->

<div class="modal fade observacao_s"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Não Entregue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <!-- <form id="msgAprovado" method="post" action="{{route('home.atualizar',$registro_s->id ?? '')}}" > -->
       <form action="" id="obs_s" method="post">
       
        @csrf
          <!-- {{method_field('put')}} -->

          <div class="form-group">           
          <input type="hidden" value="2" class="form-control" name="status" id="status"  autocomplete="status">

          </div>
          <div class="form-group">
            <label for="observacao" class="col-form-label">Observação:</label>
            <input  type="text"  class="form-control" name="observacao" id="observacao"  autocomplete="observacao">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary obs_s">Salvar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<!-- end modal observacao -->
<!-- modal descarga inicio-->
<div class="modal fade descarga_i"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio da Descarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <!-- <form id="msgAprovado" method="post" action="{{route('home.atualizar',$registro_s->id ?? '')}}" > -->
       <form action="" id="descargaInicio" method="post">
       
        @csrf
          <!-- {{method_field('put')}} -->

          <div class="form-group">           
          <input type="time"  class="form-control" name="descarga_i" id="descarga_i"  autocomplete="descarga_i">

          </div>          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Confirma</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!-- end modal descarga inicio -->
<!-- modal descarga final-->
<div class="modal fade descarga_f"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fim da Descarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <!-- <form id="msgAprovado" method="post" action="{{route('home.atualizar',$registro_s->id ?? '')}}" > -->
       <form action="" id="descargaFinal" method="post">
       
        @csrf
          <!-- {{method_field('put')}} -->

          <div class="form-group">           
          <input type="time"  class="form-control" name="descarga_f" id="descarga_f"  autocomplete="descarga_f">

          </div>          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Confirma</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!-- end modal descarga final -->




<!--  descarga final -->
<script>
  $(document).ready(function(){
    $('.des_f').on('click', function(event){
       id = $(this).val();      
    $('.descarga_f').modal('show');   
$('#descargaFinal').on('submit', function(event){
  var dados = $( this ).serialize();  
  
  $.ajax({
            type: "post",
            url: "/home/descargarf/"+id,            
            data: dados,            
            success: function( data )
            {              
              $('.descarga_f').modal('hide');
  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  // title: 'Sucesso',
  showConfirmButton: false,
  timer: 1000
})    
$('form').trigger("reset");
     
            }
              });                
              return false;
              delete window.id;
});
});
});
</script>
<!-- fim -->

<!--  descarga inicio -->
<script>
  $(document).ready(function(){
    $('.des_i').on('click', function(event){
       id = $(this).val();      
    $('.descarga_i').modal('show');   
$('#descargaInicio').on('submit', function(event){
  var dados = $( this ).serialize();  
     
  $.ajax({
            type: "post",
            url: "/home/descargar/"+id,            
            data: dados,            
            success: function( data )
            {              
              $('.descarga_i').modal('hide');
  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  // title: 'Sucesso',
  showConfirmButton: false,
  timer: 1000
})    
$('form').trigger("reset");
     
            }
              });                
              return false;
              delete window.id;
});
});
});
</script>
<!-- fim -->





<!-- script filtro -->
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
<!-- fim filtro -->
 <!-- entregue seco  -->

<script>
  $(document).ready(function(){
    $('.aprovado_s').on('click', function(event){
       id = $(this).val();      
    $('.entregue_s').modal('show');   
$('#msgAprovado_s').on('submit', function(event){
  var dados = $( this ).serialize();     
  $.ajax({
            type: "post",
            url: "/home/atualizar/"+id,            
            data: dados,            
            success: function( data )
            {              
              $('.entregue_s').modal('hide');
  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Entregue',
  showConfirmButton: false,
  timer: 1000
})    
$('form').trigger("reset");
     
            }
              });                
              return false;
              delete window.id;
});
});
});
</script>

<!-- fim aprovado seco  -->
<!-- entregue frios  -->
<script>
  $(document).ready(function(){
    $('.aprovado_f').on('click', function(event){
      id = $(this).val();
    $('.entregue_f').modal('show');
$('#msgAprovado_f').on('submit', function(event){
  var dados = $( this ).serialize();    
  $.ajax({
            type: "get",
            url: "/home/atualizar/"+id,
            data: dados,
            success: function( data )
            {              
              $('.entregue_f').modal('hide');
  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Entregue',
  showConfirmButton: false,
  timer: 1300
})             
$('form').trigger("reset"); 
            }
              });  
              return false;
              delete window.id;
});
});
});
</script>
<!-- fim aprovado frios -->
<!-- obs frios  -->
<script>
  $(document).ready(function(){
    $('.obsedit_f').on('click', function(event){
       id = $(this).val();
    $('.observacao_f').modal('show');
$('#obs_f').on('submit', function(event){
  var dados = $( this ).serialize();    
  $.ajax({
            type: "POST",
            url: "/home/atualizar/"+id,
            data: dados,
            success: function( data )
            {              
              $('.observacao_f').modal('hide');
  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Não Entregue,Observação incluida',
  showConfirmButton: false,
  timer: 1300
})       
$('form').trigger("reset");       
            }
              });  
    return false;
    delete window.id;
});
});
});
</script>
<!-- fim obs frios -->

<!-- obs secos  -->
<script>
  $(document).ready(function(){
    $('.obsedit_s').on('click', function(event){
       id = $(this).val();
    $('.observacao_s').modal('show');
$('#obs_s').on('submit', function(event){
  var dados = $( this ).serialize();    
  $.ajax({
            type: "POST",
            url: "/home/atualizar/"+id,
            data: dados,
            success: function( data )
            {              
              $('.observacao_s').modal('hide');
  Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Não Entregue,Observação incluida',
  showConfirmButton: false,
  timer: 1300
})    
$('form').trigger("reset");          
            }
              });  
    return false;
    delete window.id;
});
});
});
</script>
<!-- fim obs secos -->
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

