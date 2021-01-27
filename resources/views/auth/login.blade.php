@extends('layouts.applogin')

@section('content')
<div class="imgback">
<div class="login">
    <div class="card card-login">
        <div>
        @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Email ou senha Invalida
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                    </div>
             @enderror
                                
         @error('password')
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Senha Invalida
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
         @enderror
         </div>
        <div class="card-body login-body"> 
           

<form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
         <label class="label">Email</label>
         <br>
         <input id="email" value="adm@adm.com.br" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          
    </div>
    <div class="form-group">
        <label class="label">Senha</label>
        <br>
        <input id="password" value="adm123456" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    </div>
        <div class="form-group" >
            <div class="footer-card">
                <button type="submit" class="btn btn-login">Login</button>
            <p class="separador">ou</p>
                <a href="{{route('visitante')}}" class="btn btn-visitante">Visitante</a>
            </div>
            <!-- @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="btn btn-link esqueceu">Esqueceu a senha</a>
        @endif -->
    </div>
</form>
        </div>
    </div>
  </div>
</div>
@endsection
