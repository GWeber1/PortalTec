<x-frontend title="Página Inicial" aboutUs="{{$configuracoes->about}}" logo="{{$configuracoes->image}}">

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
					<span class="navbar-brand"><font color="#555555">COLOR</font><font color="#2ca0c9">MAG</font></span>
				</div>
				<div class="collapse navbar-collapse" id="mynavbar">
					<ul class="nav nav-justified">
						<li><a href="#" class="active"><span class="glyphicon glyphicon-home"></span></a></li>
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
		@if(count($featured) > 0)
			<div class="row">
				@foreach($featured as $key=>$f)
					@if($key == 0)
					<div class="col-md-6">
						<div class="relative">
							<a href="{{url('article')}}/{{$f->slug}}"><img src="{{url('storage')}}/{{$f->image}}" class="imagem-frontal" />
								<span class="caption">{{$f->title}}</span>
							</a>
						</div>
					</div>
					@endif
				@endforeach
				<div class="col-md-6">
					<div class="row">
						@foreach($featured as $key=>$f)
							@if($key > 0 && $key < 3)
							<div class="col-md-6">
								<div class="relative">
									<a href="{{url('article')}}/{{$f->slug}}"><img src="{{url('storage')}}/{{$f->image}}" class="imagem-recente" />
										<span class="caption">{{$f->title}}</span>
									</a>
								</div>
							</div>
							@endif
						@endforeach
					</div>
					<div class="row" style="margin-top:10px;">
						@foreach($featured as $key=>$f)
							@if($key > 3 && $key < 6)
							<div class="col-md-6">
								<div class="relative">
									<a href="{{url('article')}}/{{$f->slug}}"><img src="{{url('storage')}}/{{$f->image}}" class="imagem-recente" />
										<span class="caption">{{$f->title}}</span>
									</a>
								</div>
							</div>
							@endif
						@endforeach
					</div>        
				</div>
			</div>
		@endif
		
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
				<div class="col-md-12">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">NOTÍCIAS</span></h3>
				</div>
				<div class="col-md-6">
					@foreach($general as $key=>$g)
						@if($key == 0)
							<a href="{{url('article')}}/{{$g->slug}}"><img src="{{url('storage')}}/{{$g->image}}" width="100%" style="margin-bottom:15px;" />
							<h3><a href="{{url('article')}}/{{$g->slug}}">{{$g->title}}</a></h3>
							<p align="justify">{!!$g->lide!!}</p><a href="{{url('article')}}/{{$g->slug}}">Saiba Mais &raquo;</a>
						@endif
					@endforeach
				</div>
				<div class="col-md-6">
					@foreach($general as $key=>$g)
						@if($key > 0 && $key < 6)
							<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
								<div class="col-md-4">
									<div class="row">
										<img src="{{url('storage')}}/{{$g->image}}" width="100%" />
									</div>
								</div>
								<div class="col-md-8">
									<div class="row">
										<h4><a href="{{url('article')}}/{{$g->slug}}">{{$g->title}}</a></h4>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
			
				<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">SOFTWARE</span></h3>
					<div class="flex">
						@foreach($software->take(5) as $s)
							<div>
								<a href="{{url('article')}}/{{$s->slug}}"><img src="{{url('storage')}}/{{$s->image}}" /></a>
							</div>
						@endforeach
					</div>
				</div>
			
			<div class="row">
				<div class="col-md-6">
				<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
						<h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">CELULARES</span></h3>
							@foreach($celulares as $key=>$c)
								@if($key == 0)
									<a href="{{url('article')}}/{{$c->slug}}"><img src="{{url('storage')}}/{{$c->image}}" style="width: 100%; margin-bottom:15px;" /></a>
									<h3><a href="{{url('article')}}/{{$c->slug}}">{{$c->title}}</a></h3>
									<p align="justify">{!!$c->lide!!}</p>
									<a href="{{url('article')}}/{{$c->slug}}">Saiba mais &raquo;</a>
								@endif
							@endforeach
					</div>
					@foreach($celulares as $key=>$c)
						@if($key > 0 && $key < 5)
							<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
								<div class="col-md-4">
									<div class="row fashion">
										<img src="{{url('storage')}}/{{$c->image}}" width="100%" />
									</div>
								</div>
								<div class="col-md-8">
									<div class="row">
										<h4><a href="{{url('artcle')}}/{{$c->slug}}">{{$c->title}}</a></h4>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				</div></div>
				<div class="col-md-6">
				<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
						<h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">HARDWARE</span></h3>
							@foreach($hardware as $key=>$h)
								@if($key == 0)
									<a href="{{url('article')}}/{{$h->slug}}"><img src="{{url('storage')}}/{{$h->image}}" style="width: 100%; margin-bottom:15px;" /></a>
									<h3><a href="{{url('article')}}/{{$h->slug}}">{{$h->title}}</a></h3>
									<p align="justify">{!!$h->lide!!}</p>
									<a href="{{url('article')}}/{{$h->slug}}">Saiba mais &raquo;</a>
								@endif
							@endforeach					
					</div>
					@foreach($hardware as $key=>$h)
						@if($key > 0 && $key < 5)
							<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
								<div class="col-md-4">
									<div class="row fashion">
										<img src="{{url('storage')}}/{{$h->image}}" width="100%" />
									</div>
								</div>
								<div class="col-md-8">
									<div class="row">
										<h4><a href="{{url('artcle')}}/{{$h->slug}}">{{$h->title}}</a></h4>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				</div></div>
			
			<div class="col-md-12">
				<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
					<div class="col-md-12">
						<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">INTERNET DAS COISAS</span></h3>
					</div>
				<div class="col-md-6">
					@foreach($internet as $key=>$i)
						@if($key == 0)
							<a href="{{url('article')}}/{{$i->slug}}"><img src="{{url('storage')}}/{{$i->image}}" style="width: 100%; margin-bottom:15px;" /></a>
							<h3><a href="{{url('article')}}/{{$i->slug}}">{{$i->title}}</a></h3>
							<p align="justify">{!!$c->lide!!}</p>
							<a href="{{url('article')}}/{{$i->slug}}">Saiba mais &raquo;</a>
						@endif
					@endforeach
				</div>
				<div class="col-md-6">
					@foreach($internet as $key=>$i)
						@if($key > 0 && $key < 5)
							<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
								<div class="col-md-4">
									<div class="row">
										<img src="{{url('storage')}}/{{$i->image}}" width="100%" />
									</div>
								</div>
								<div class="col-md-8">
									<div class="row" style="padding-left:10px;">
										<h4><a href="{{url('article')}}/{{$i->slug}}">{{$i->title}}</a></h4>
									</div>
								</div>
							</div>
						@endif
					@endforeach 
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
				<div class="col-md-12">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">ELETRÔNICOS</span></h3>	
				</div>
				<div class="col-md-6">
					@foreach($eletronicos as $key=>$e)
						@if($key == 0)
							<a href="{{url('article')}}/{{$e->slug}}"><img src="{{url('storage')}}/{{$e->image}}" style="width: 100%; margin-bottom:15px;" /></a>
							<h3><a href="{{url('article')}}/{{$e->slug}}">{{$e->title}}</a></h3>
							<p align="justify">{!!$c->lide!!}</p>
							<a href="{{url('article')}}/{{$e->slug}}">Saiba mais &raquo;</a>
						@endif
					@endforeach
				</div>
				<div class="col-md-6">
					@foreach($eletronicos as $key=>$e)
						@if($key > 0 && $key < 5)
							<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
								<div class="col-md-4">
									<div class="row">
										<img src="{{url('storage')}}/{{$e->image}}" width="100%" />
									</div>
								</div>
								<div class="col-md-8">
									<div class="row" style="padding-left:10px;">
										<h4><a href="{{url('article')}}/{{$e->slug}}">{{$e->title}}</a></h4>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
				<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">TÓPICO</span></h3>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-4">
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px;">
			<div class="col-md-12">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">CRIPTOMOEDAS</span></h3>
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					@foreach($criptomoedas as $key=>$m)
						@if($key >= 0 and $key < 7)
							<div class="col-md-4">
								<div class="row">
									<img src="{{url('storage')}}/{{$m->image}}" width="100%" style="margin-left:-15px;" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="row" style="padding-left:10px;">
									<h4><a href="{{url('article')}}/{{$m->slug}}">{{$m->title}}</a></h4>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
			<div class="col-md-12">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">CIBERSEGURANÇA</span></h3>
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					@foreach($ciberseguranca as $key=>$m)
						@if($key >= 0 and $key < 7)
							<div class="col-md-4">
								<div class="row">
									<img src="{{url('storage')}}/{{$m->image}}" width="100%" style="margin-left:-15px;" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="row" style="padding-left:10px;">
									<h4><a href="{{url('article')}}/{{$m->slug}}">{{$m->title}}</a></h4>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
			<div class="col-md-12">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">SUSTENTABILIDADE TEC</span></h3>
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					@foreach($sustentabilidade as $key=>$m)
						@if($key >= 0 and $key < 7)
							<div class="col-md-4">
								<div class="row">
									<img src="{{url('storage')}}/{{$m->image}}" width="100%" style="margin-left:-15px;" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="row" style="padding-left:10px;">
									<h4><a href="{{url('article')}}/{{$m->slug}}">{{$m->title}}</a></h4>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>          	
		</div>
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
			<div class="col-md-12">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">METAVERSO</span></h3>
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					@foreach($metaverso as $key=>$m)
						@if($key >= 0 and $key < 7)
							<div class="col-md-4">
								<div class="row">
									<img src="{{url('storage')}}/{{$m->image}}" width="100%" style="margin-left:-15px;" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="row" style="padding-left:10px;">
									<h4><a href="{{url('article')}}/{{$m->slug}}">{{$m->title}}</a></h4>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>          	
		</div> 
	</div>
		<div class="col-md-8">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
				<h3 style="border-bottom:3px solid #1f9df1; padding-bottom:5px;"><span style="padding:6px 12px; background:#1f9df1;">NOS SIGA EM:</span></h3>
				@foreach($configuracoes->social as $key=>$social)
					<a href="{{$social}}" class="fa fa-{{$icons[$key]}} social-icon"></a>
				@endforeach
			</div>
		</div>
	</div>
</div>
</div>
</x-frontend>