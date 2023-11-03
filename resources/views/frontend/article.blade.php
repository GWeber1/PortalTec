<x-frontend title="Artigo" aboutUs="{{$configuracoes->about}}" logo="{{$configuracoes->image}}">
	<div class="col-md-12 main-menu">
		<div class="col-md-10 menu">
			<nav class="navbar">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="mynavbar">
					<ul class="nav nav-justified">
						<li><a href="{{url('/')}}" class="active"><span class="glyphicon glyphicon-home"></span></a></li>
						@foreach($categorias as $categoria) 
						<li><a href="#">{{$categoria->title}}</a></li>
						@endforeach
					</ul> 
				</div>
			</nav>
		</div>
		<div class="col-md-2">
			<div class="search">
				<input type="search" class="form-control" /><span class="glyphicon glyphicon-search search-btn"></span>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">				
					<div class="col-md-12">
						<img src="{{url('storage')}}/{{$article->image}}" width="100%" style="margin-bottom:15px;" />
						<h3 class="also-like">{{$article->title}}</h3>
						<h4><b>{!!$article->lide!!}</b></h4>
						<p align="justify">{!!$article->description!!}</p>
					</div>
					@if(!is_null($vejamais))
						<div class="col-md-12">
							<h3 class="also-like">Veja também</h3>
						</div>
					@endif
					@foreach($vejamais->take(3) as $key=>$v)
						@if($v->pid != $article->pid)		
							<div class="col-md-4">
								<a href="{{url('article')}}/{{$v->pid}}/{{$v->slug}}">
									<img src="{{url('storage')}}/{{$v->image}}" width="100%" style="margin-bottom: 15px;"/>
								</a><h3><a href="{{url('article')}}/{{$v->pid}}/{{$v->slug}}">{{$v->title}}</a></h3>
							</div>
						@endif
					@endforeach
				</div>     
			</div>
			<div class="col-md-4">
				<div class="col-md-12" style="padding:15px;">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MAIS</span></h3>
					@foreach($vejamais->take(10) as $key=>$v)
						<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
							<div class="col-md-4">
								<div class="row">
									<img src="{{url('storage')}}/{{$v->image}}" width="100%" style="margin-left:-15px;" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="row" style="padding-left:10px;">
									<h4><a href="{{url('article')}}/{{$v->pid}}/{{$v->slug}}">{{$v->title}}</a></h4>
								</div>
							</div>
						</div>
					@endforeach
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
									<h4><a href="{{url('article')}}/{{$r->pid}}/{{$r->slug}}">{{$r->title}}</a></h4>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div> 
	</div>
</x-frontend>