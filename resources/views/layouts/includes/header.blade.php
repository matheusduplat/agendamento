

<header>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
<ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown ">
             
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}<span class="caret"></span>
              </a>
             
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              @if( Auth::user()->tipo == 'adm')
                  <a  class="dropdown-item" href="{{ route('gerenciamento') }}">
                      {{ __('Gerenciamento de Usuario') }}
                  </a>
                  @endif
                  <a  data-toggle="modal" data-target="#modalsenha"  class="dropdown-item" href=""

                  >
                      {{ __('Alterar Senha') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('sair') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            
              
             

          </li>
                        
					</ul>
 
        
   
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="nametitulo">
    <!-- <img class="brand-image img-circle elevation-3"src="{{ asset('assets/img/logo/logorpereira.png')}}" > -->
         <span class="brand-text font-weight-light">Agendamento</span>         
         <span class="brand-text font-weight-light">3MDEVELOPERS</span>

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/img/perfil.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a  class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item ">
              <a href="{{ route('home') }}" class=" nav-link {{ Request::is('home') ? 'active' : null}}">
                <i class="fa fa-home nav-icon"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('agendar') }}" class=" nav-link {{ Request::is('Agendar') ? 'active' : null}}">
                <i class="fa fa-address-book nav-icon"></i>
                <p>Agendar</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{ route('agendados') }}" class=" nav-link {{ Request::is('Agendados' , 'filtro') ? 'active' : null}}">
                <i class="fa fa-calendar nav-icon"></i>
                <p>Agendados</p>
              </a>
            </li>
        
             <li class="nav-item has-treeview ">
            <a href="" class="nav-link ">
              <i class="far fa-clipboard nav-icon"></i>
              <p>
                Relatorios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>            
            <!-- dia relatorio -->
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="" class="nav-link  ">
                  <i class="nav-icon"></i>
                  <p>Agendamento do dia
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>              
                <ul class="nav nav-treeview">
                <li class="nav-item has-treeview">
                <a href="{{ route('pdfF') }}" target="_blank" class="nav-link "> 
                <p>Frios/Congelados</p>
            </a>
            </ul>
    
            <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
            <a href="{{ route('pdfS') }}" target="_blank" class="nav-link "> 
                <p>Secos</p>
            </a>
             </ul>
             </li>
             </li>
  <!-- end dia -->
  <li class="nav-item">
              <a href="" data-toggle="modal" data-target="#modalDia"  class="nav-link">
                <i class="nav-icon"></i>
                 <p>Agendamento por data </p>
              </a>
            </li>
              <li class="nav-item">
                <a href="" data-toggle="modal" data-target="#modalStatus"  class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Status do dia </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" data-toggle="modal" data-target="#modalStatusDia"  class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Status Por Data </p>
                </a>
              </li>
              @if( Auth::user()->tipo == 'adm')
              <li class="nav-item">
                <a href="" data-toggle="modal" data-target="#modalStatusDiaexcel"  class="nav-link">
                  <i class="nav-icon"></i>
                  <p>Status Por Data (excel) </p>
                </a>
              </li>
              @endif
             



              </ul>
            
            
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>



<!-- Control Sidebar -->

<!-- Modal status -->
<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status do Dia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form  method="post "action="{{route('status')}}">
        @csrf
          <div class="form-group">
          <select class="custom-select" id="id_area" name="id_area">
        <option  >Escolha a Area</option>      
        <option value="2" >Frios/Congelados</option>
          <option value="1">Seca/Embalagem</option>
                                          
                </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit"  formtarget="_blank" class="btn btn-primary">Consultar</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- end status -->

<!-- Modal  agendados por dia -->
<div class="modal fade" id="modalDia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agendados Por Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form  method="post "action="{{route('porDia')}}">
        @csrf

        <div class="form-group">
          
          <input id="fornecedor" type="text" class="form-control " name="fornecedor" placeholder="FORNECEDOR"  autocomplete="fornecedor">
              

           </div>

          <div class="form-group">
          <select class="custom-select" id="id_area" name="id_area">
        <option value="" >Escolha a Area</option>      
        <option value="2" >Frios/Congelados</option>
          <option value="1">Seca/Embalagem</option>
                                          
                </select>
          </div>
          <div class="form-group">
          <label for="data_i">Data inicio:</label>
          <input id="data_i" type="date" class="form-control " name="data_i"   autocomplete="data_i">
          
          <label for="data_f">Data Final:</label>
              
         <input id="data_f" type="date" class="form-control " name="data_f"   autocomplete="data_f">
          
          
          </div>
          
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit"  formtarget="_blank" class="btn btn-primary">Consultar</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- end por dia-->
  <!-- Modal status por data -->
<div class="modal fade" id="modalStatusDia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status Por Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form  method="post "action="{{route('statusPorData')}}">
        @csrf

        <div class="form-group">
          
          <input id="fornecedor" type="text" class="form-control " name="fornecedor" placeholder="FORNECEDOR"  autocomplete="fornecedor">
                      
           </div>
          <div class="form-group">
          <select class="custom-select" id="id_area" name="id_area">
        <option value="" >Escolha a Area</option>      
        <option value="2" >Frios/Congelados</option>
          <option value="1">Seca/Embalagem</option>
                                          
                </select>
          </div>
          <div class="form-group">
          
          <label for="data_i">Data inicio:</label>
          <input id="data_i" type="date" class="form-control " name="data_i"   autocomplete="data_i">
          
          <label for="data_f">Data Final:</label>
              
         <input id="data_f" type="date" class="form-control " name="data_f"   autocomplete="data_f">
          
          
          </div>
          
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit"  formtarget="_blank" class="btn btn-primary">Consultar</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- end por data-->

  <!-- Modal status por data (excel)-->
<div class="modal fade" id="modalStatusDiaexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status Por Data (excel)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form  method="post "action="{{route('statusExcel')}}">
        @csrf
          <!-- <div class="form-group">
          <select class="custom-select" id="id_area" name="id_area">
        <option  >Escolha a Area</option>      
        <option value="2" >Frios/Congelados</option>
          <option value="1">Seca/Embalagem</option>
                                          
                </select>
          </div> -->
          <div class="form-group">
          
          <label for="data_i">Data inicio:</label>
          <input id="data_i" type="date" class="form-control " name="data_i"   autocomplete="data_i">
          
          <label for="data_f">Data Final:</label>
              
         <input id="data_f" type="date" class="form-control " name="data_f"   autocomplete="data_f">
          
          
          </div>
          
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit"   class="btn btn-primary">Consultar</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- end por data-->

	</header>
