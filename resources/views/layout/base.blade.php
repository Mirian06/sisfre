<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titulo') </title>
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.modif.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <noscript>
      <div class="container"> 
          <div class="alert alert-danger btn-lg col-md-8 col-md-offset-2 text-center">
            <span class="glyphicon glyphicon-remove-sign"></span>  O Javascript está desabilitado, o sistema não irá funcionar corretamente. Habilite-o!! 
          </div>
      </div>
   </noscript>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
   
    @yield('scripts')

</head>

<body>
<div class="container">
    @if (Route::has('login'))

	      <nav class="navbar navbar-default">
	        <div class="container-fluid">
	          <div class="navbar-header row col-md-3">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>

                @if(Auth::check())
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('/img/sisfre.png')}}" class="img-responsive-mod" width="70%" height="70%"></a>
                @else
                    <a class="navbar-brand" href="{{route('login')}}"><img src="{{asset('/img/sisfre.png')}}" class="img-responsive-mod" width="70%" height="70%"></a>
                @endif

	          </div>
    	          <div id="navbar" class="navbar-collapse collapse ">
                    
                    @if(Auth::check())
    	            <ul class="nav navbar-nav">
    	              @if( Auth::user()->acesso == 4)      	              
                          <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" style="color: #2e6da4"> Cadastrar <span class="caret"></span></a>
        	                <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('curso.create')}}" style="color: #2e6da4"> Curso </a></li>
        	                  <li><a href="{{route('disciplina.create')}}" style="color: #2e6da4"> Disciplina </a></li>
                            <li><a href="{{route('feriado.create')}}" style="color: #2e6da4"> Feriado </a></li>
                            <li><a href="{{route('sabado.create')}}" style="color: #2e6da4"> Sábado Letivo </a></li>
        	                  <li><a href="{{route('semestre.create')}}" style="color: #2e6da4"> Semestre </a></li>
                            <li><a href="{{route('usuario.create')}}" style="color: #2e6da4"> Usuário </a></li>
        	                </ul>
        	              </li>

                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" style="color: #2e6da4"> Controle <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('curso.show')}}" style="color: #2e6da4"> Curso </a></li>
                              <li><a href="{{route('disciplina.show')}}" style="color: #2e6da4"> Disciplina </a></li>
                              <li><a href="{{route('feriado.show')}}" style="color: #2e6da4"> Feriado </a></li>
                              <li><a href="{{route('sabado.show')}}" style="color: #2e6da4"> Sábado Letivo </a></li>
                              <li><a href="{{route('semestre.show')}}" style="color: #2e6da4"> Semestre </a></li>
                              <li><a href="{{route('usuario.show')}}" style="color: #2e6da4"> Usuário </a></li>
                            </ul>
                          </li>
                      @endif

                      @if(Auth::user()->acesso == 1)
                          
                          <li class="dropdown">
                              <a href="{{route('falta.create')}}" style="color: #2e6da4"> Cadastrar Falta </a></li>
                          </li>

                          <li class="dropdown">
                              <a href="{{route('falta.show.funcionario')}}" style="color: #2e6da4"> Controle de Faltas </a></li>
                          </li>

                          <li class="dropdown">
                              <a href="{{route('relatorio.index.funcionario')}}" style="color: #2e6da4"> Relatórios </a></li>
                          </li>
                      @endif

                      @if( Auth::user()->acesso == 3)
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" style="color: #2e6da4"> Coordenador <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('anteposicao.show.coordenador')}}" style="color: #2e6da4"> Anteposições do Curso</a></li>
                              <li><a href="{{route('falta.show.coordenador')}}" style="color: #2e6da4"> Faltas do Curso </a></li>
                              <li><a href="{{route('grafico.index')}}" style="color: #2e6da4"> Gráficos </a></li>
                              <li><a href="{{route('relatorio.index')}}"> Relatórios </a></li>
                              <li><a href="{{route('reposicao.show.coordenador')}}" style="color: #2e6da4"> Reposições do Curso </a></li>
                              <li><a href="{{route('turma.show')}}" style="color: #2e6da4"> Turmas do Curso </a></li>
                            </ul>
                          </li>

                      @endif

                      @if( Auth::user()->acesso == 3 or Auth::user()->acesso == 2)
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" style="color: #2e6da4"> Professor <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('horario.professor')}}" style="color: #2e6da4"> Meu Horário  </a></li>
                              <li><a href="{{route('falta.show.professor')}}" style="color: #2e6da4"> Minhas Faltas </a></li>
                              <li><a href="{{route('reposicao.show.professor')}}" style="color: #2e6da4"> Minhas Reposições </a></li>
                              <li><a href="{{route('anteposicao.show.professor')}}" style="color: #2e6da4"> Minhas Anteposições </a></li>
                            </ul>
                          </li>
                      @endif
    	            </ul>
                @endif

                @if(Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('usuario.edit', Auth::user()->id) }}" style="color: #2e6da4"><span class="glyphicon glyphicon-user" style="color: #2e6da4"></span> {{Auth::user()->username}} </a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: #2e6da4">
                                <span class="glyphicon glyphicon-log-in"></span> Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Logar </a></li>
                    </ul>
                @endif
	          </div><!--/.nav-collapse -->
	        </div><!--/.container-fluid -->
	      </nav>
    @endif

    <div class="row">
        @yield('conteudo')
    </div>

    <footer class="welld navbar navbar-default footer container-fluid" style="color:#000;">
            <div class="text-center"> &reg; copyright Sloth Software 2016-{{date('Y')}}. </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</div>
</body>
</html>