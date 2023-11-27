<x-backend title="Painel do Administrador">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-10 title">
        <h1><i class="fa fa-bars"></i> DASHBOARD</h1>
      </div>

      <div class="col-sm-12">
        <div class="content">
          <h2>Bem vindo ao Dashboard</h2>
          <p class="welcome-text">Aqui temos alguns links para você começar.</p>
          <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4 quick-links">
              <h4>Ver dados</h4>
              <p><a href="{{route('posts.all')}}"><i class="fa fa-bookmark-o"></i> Ver todos os posts</a></p>
              <p><a href="{{route('pages.all')}}"><i class="fa fa-file"></i> Ver todas as páginas</a></p>
              <p><a href="#"><i class="fa fa-users"></i> Ver todos os usuários</a></p>
            </div>
            <div class="col-sm-4 quick-links">
              <h4>Gravar Dados</h4>
              <p><a href="{{route('posts.index')}}"><i class="fa fa-bookmark-o"></i> Adicionar posts</a></p>
              <p><a href="{{route('pages.index')}}"><i class="fa fa-file"></i> Adicionar páginas</a></p>
              <p><a href="#"><i class="fa fa-users"></i> Adicionar usuários</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-backend>