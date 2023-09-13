<x-backend title="Listar Posts">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> Adicionar Novos Posts <a href="{{route('posts.index')}}" class="btn btn-sm btn-default">Novo</a></h1>
    </div>
    <div class="col-sm-12">
      @isset($mensagemSucesso)
    			<div class="alert alert-success alert-dismissable dade fin">
        			<a href="#" class="close" data-dismiss="alert">&times;</a>
        			{{$mensagemSucesso}}
    			</div>
				@endisset
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        Todos({{count($posts)}}) | <a href="#">Publicados ({{$totalPublicado}})</a>
      </div>
      <div class="col-sm-3">
        <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar">
      </div>
    </div>  
    <div class="clearfix"></div>
    
    <div class="col-sm-3">
      {{$posts->links()}}
    </div>
    
    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th width="50%"><input type="checkbox" id="select-all">Título</th>
              <th width="15%">Categoria</th>
              <th width="15%">Status</th>
              <th width="10%">Data</th>
            </tr>
          </thead>
          <tbody>
            @if(count($posts) > 0)
            @foreach($posts as $post)
            <tr>
              <td>
                <form method="post" action="{{route('posts.delete', $post->pid)}}">
                  @csrf
                  <button type="submit" class="btn-delete fa-solid fa-trash"></button>
                  <a href="{{route('posts.edit', $post->pid)}}">{{$post->title}}</a>
                </form>
              </td>
              <td>{{$post->category_id}}</td>
              <td>{{$post->status}}</td>
              <td>{{$post->created_at}}</td>              
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="4">Não há posts encontrados.</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="filter-div">   
      
      <div class="col-sm-3 col-sm-offset-6">
        {{$posts->links()}}
      </div>
    </div>
  </div>
</div>
</x-backend>