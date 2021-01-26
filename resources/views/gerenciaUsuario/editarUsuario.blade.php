@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="formobs" method="POST" action="{{ route('gerenciamento.atualizar',$registro->id) }}">
                        @csrf
                        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$registro->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" value="{{$registro->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
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
                         <select class="custom-select" value="{{$registro->relLoja->id}}" id="id_loja" name="id_loja">
                                <option value="{{$registro->relLoja->id}}" >{{$registro->relLoja->nome}}</option>
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
                            <select class="custom-select" value="{{$registro->relArea->id}}" id="id_area" name="id_area">
                                <option value="{{$registro->relArea->id}}" >{{$registro->relArea->nome}}</option>
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
                    <select  value="{{$registro->tipo}}" class="custom-select" id="tipo" name="tipo">                   
                    <option value="{{$registro->tipo}}" >{{$registro->tipo}}</option>
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
                                    {{ __('Atualizar') }}
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
