<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$title}}</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/menu.css')}}">
	<link rel="stylesheet" href="{{asset('css/adminstyle.css')}}">
  <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.0-web/css/all.min.css')}}">
  <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/app.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/scripts.js')}}"></script>
</head>
<body>

<div class="sidebar">
	<ul class="sidebar-menu">
		<li><a href="{{route('admin.index')}}" class="dashboard"><i class="fa fa-tachometer"></i> <span>Menu</span></a></li>
		<li class="treeview">
            <a href="#">
              <i class="fa fa-bookmark-o"></i> <span>Cadastros</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-bookmark"></i> <span>Post</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('posts.all')}}"><i class="fa fa-eye"></i>Ver Posts</a></li>
                  <li><a href="{{route('posts.index')}}"><i class="fa fa-plus-circle"></i>Adicionar Posts</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-file"></i> <span>Página</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('pages.all')}}"><i class="fa fa-eye"></i>Ver Páginas</a></li>
                  <li><a href="{{route('pages.index')}}"><i class="fa fa-plus-circle"></i>Adicionar Páginas</a></li>
                </ul>
              </li>
              <li><a href="{{route('category.index')}}"><i class="fa fa-plus-circle"></i>Categorias</a></li>
              <li><a href="{{route('positions.index')}}"><i class="fa fa-plus-circle"></i>Murais</a></li>
              <li><a href="{{route('users.index')}}"><i class="fa fa-plus-circle"></i>Usuários</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="{{route('messages.all')}}">
            <i class="fa fa-envelope"></i><span>Mensagens</span>
          </a>
        </li>
        <li class="treeview">
            <a href="{{route('settings.index')}}">
              <i class="fa fa-gear"></i> <span>Configurações</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-book"></i> <span>Usuário Ativo</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-edit"></i>Editar Perfil</a></li>
            </ul>
            <form action="{{route('admin.logout')}}" method="POST" class="treeview-menu">
              @csrf
              <li><button class="logout-btn" type="submit"><i class="fa fa-power-off"></i>Sair</li></button>
            </form>
        </li>		
	</ul>
</div>

{{$slot}}
</body>
</html>