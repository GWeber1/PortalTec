<x-backend title="Adicionar Página">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-10 title">
        <h1><i class="fa fa-bars"></i> Adicionar Nova Página</h1>
      </div>

      <div class="col-sm-12">
        @isset($mensagemSucesso)
    			<div class="alert alert-success alert-dismissable dade fin">
        			<a href="#" class="close" data-dismiss="alert">&times;</a>
        			{{$mensagemSucesso}}
    			</div>
				@endisset
        <div class="row">
          <form method="post" action="{{route('pages.add')}}">
            @csrf
            <div class="col-sm-9">
             <div class="form-group">	
                <input type="text" id="post_title" name="title" class="form-control" placeholder="Insira o titulo aqui">				
              </div>
              <div class="form-group">	
                <input type="text" id="slug" name="slug" class="form-control" readonly placeholder="Insira as palavras chave aqui">				
              </div>
              <div style="background-color: white;">
                <input name="description" type="hidden">
                <div class="form-group" id="editor" name="textDescription">
                </div>
              </div>						
              <div class="form-group" id="editor">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="content publish-box">
                <h4>Publicar  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
                <div class="form-group">
                  <button class="btn btn-default" name="status" id="status" value="rascunho">Salvar como rascunho</button>
                </div>
                <p>Status: Rascunho <a href="#">Editar</a></p>
                <p>Visibilidade: Público <a href="#">Editar</a></p>
                <p>Publicar: Imediatamente <a href="#">Editar</a></p>
                <div class="row">
                  <div class="col-sm-12 main-button">
                    <button class="btn btn-primary pull-right" id="status" name="status" value="publicado ">Publicar</button>
                  </div>
                </div>	
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="{{url('/js/quill.js')}}"></script>
</x-backend>