<x-frontend title="Fale conosco" aboutUs="{{$configuracoes->about}}" logo="{{$configuracoes->image}}" pages={{json_encode($pages)}}>
	<div class="col-md-12 main-menu">
		<div class="col-md-10 menu">
			<nav class="">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="navbar-brand"></span>
				</div>
				<div class="collapse navbar-collapse" id="mynavbar">
					<ul class="nav nav-justified">
						<li>
							<div class="col-md-12 search-bar">
								<a href="{{url('/')}}" class="active"><span class="glyphicon glyphicon-home"></span></a>
								<input type="search" class="search-input" id="search_content" data-search-route="{{route('frontend.search')}}" placeholder="Pesquisar...">
								<span class="glyphicon glyphicon-search search-btn-frontend"></span>
								<div id="search-output"></div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="wrapper">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">				
					<div class="col-md-12">
                       <h1>Fale Conosco</h1>
					</div>
                    @isset($mensagemSucesso)
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissable dade fin">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                {{$mensagemSucesso}}
                            </div>
                        </div>
                    @endisset
                    <div class="col-sm-6">
                        <form method="post" action="{{route('frontend.sendmessage')}}">
                            @csrf
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mensagem</label>
                                <textarea name="message" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
				</div>     
			</div>
            <div class="col-md-4">
				<div class="col-md-12" style="padding:15px;">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">RECENTES</span></h3>
					@foreach($recentes->take(10) as $key=>$r)
						<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
							<div class="col-md-4">
								<div class="row">
									<img src="{{url('storage')}}/{{$r->image}}" width="100%" style="margin-left:-15px;" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="row" style="padding-left:10px;">
									<h4><a href="{{url('article')}}/{{$r->pid}}/{{$r->slug}}">{{$r->title_posts}}</a></h4>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div> 
	</div>
</x-frontend>