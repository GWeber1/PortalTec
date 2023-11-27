<x-backend title="Listar Páginas">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 title">
          <h1><i class="fa fa-bars"></i>Lista de mensagens</h1>
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
            Todas({{count($messages)}})
          </div>
          <div class="col-sm-3">
            <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar">
          </div>
        </div>  
        <div class="clearfix"></div>
        
        <div class="col-sm-3">
          {{$messages->links()}}
        </div>
        
        <div class="col-sm-12">
          <div class="content">
            <table class="table table-striped" id="myTable">
              <thead>
                <tr>
                    <th></th>
                    <th>Remetente</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Mensagem</th>
                    <th>Data de Envio</th>
                </tr>
              </thead>
              <tbody>
                @if(count($messages) > 0)
                @foreach($messages as $message)
                <tr>
                    <td>
                        <form method="post" action="{{route('messages.delete', $message->mid)}}">
                            @csrf
                            <button type="button" class="delete-button fa-solid fa-trash botao-transparente" data-toggle="modal" data-target="#confirmation-modal" data-post-id="{{ $message->mid }}"></button>
                            <div id="overlay" class="overlay"></div>
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
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->phone}}</td>
                    <td>{{substr($message->message, 0, 100)}} <a href="#expand{{$message->mid}}" data-toggle="modal">Expandir</a></td>
                    <td>{{$message->created_at}}</td>
                    <div class="modal" id="expand{{$message->mid}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="#" class="close" data-dismiss="modal">&times;</a>
                                    <h4 class="modal-title">Enviado por: {{$message->name}} em {{$message->created_at}}</h4>
                                </div>
                                <div class="modal-body">
                                    {{$message->message}}
                                </div>
                                <div class="modal-footer">
                                    <p>Enviado em: {{$message->created_at}}</p>
                                    <p>Telefone: {{$message->phone}}</p>
                                    <p>E-mail: {{$message->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>              
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4">Não há páginas encontradas.</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
    
        <div class="clearfix"></div>
    
        <div class="filter-div">   
          
          <div class="col-sm-3 col-sm-offset-6">
            {{$messages->links()}}
          </div>
        </div>
      </div>
    </div>
    </x-backend>