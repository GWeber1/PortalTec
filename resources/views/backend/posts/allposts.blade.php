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
                  <button type="button" class="delete-button fa-solid fa-trash botao-transparente" data-toggle="modal" data-target="#confirmation-modal" data-post-id="{{ $post->pid }}"></button>
                  <div id="overlay" class="overlay"></div>
                  <a href="{{route('posts.edit', $post->pid)}}">{{$post->title}}</a>
                  <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="confirmation-modal-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="confirmation-modal-label"><b>Confirmação de Exclusão</b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Tem certeza de que deseja excluir este item?
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="post_id" id="post_id" value="">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-success">Sim, Excluir</button>
                        </div>
                      </div>
                    </div>
                  </div>
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