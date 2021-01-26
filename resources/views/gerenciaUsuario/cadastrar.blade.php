@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="formuser" method="POST" action="{{ route('cadastrar.salvar') }}">
                        @csrf
                        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="id_loja">Loja</label>                           
                         <div class="col-md-6">
                         <select class="custom-select" id="id_loja" name="id_loja">
                                <option ></option>
                                 @foreach($loja as $lojas)
                                 <option value="{{$lojas->id}}">{{$lojas->nome}}</option>
                                   @endforeach                             
                                    </select>

                         
                                @error('loja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="id_area">Area</label>                           
                         <div class="col-md-6">
                            <select class="custom-select" id="id_area" name="id_area">
                                <option ></option>
                                @foreach($area as $areas)
                                 <option value="{{$areas->id}}">{{$areas->nome}}</option>
                                   @endforeach               
                                                                
                                    </select>
                                @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        <div class="form-group row">
                <label for="tipo" class="col-md-4 col-form-label text-md-right">tipo</label>                        
                    <div class="col-md-6">
                    <select  class="custom-select" id="tipo" name="tipo">                   
                    <option ></option>
                    <option value="adm">Administrador</option>
                    <option value="user">Usuario</option>
                                    
                    </select>
                    @error('tipo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- modal de cadastrauser -->



<!-- <div id="msgCadSucessoUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- end modal cadastrauser -->
<script>
$('#formuser').on('submit', function(event){


    Swal.fire({
  // position: 'top-end',
  icon: 'success',
  title: 'Cadastrado com Sucesso',
  showConfirmButton: false,
  timer: 1500
})



});







</script>
@endsection
