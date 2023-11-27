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
		@if(count($noticiasrecentes) > 0)
			<div class="row">
				@foreach($noticiasrecentes as $key=>$f)
					@if($key == 0)
					<div class="col-md-6">
						<div class="relative">
							<a href="{{url('article')}}/{{$f->pid}}/{{$f->slug}}"><img src="{{url('storage')}}/{{$f->image}}" class="imagem-frontal" />
								<span class="caption">{{$f->title_posts}}</span>
							</a>
						</div>
					</div>
					@endif
				@endforeach
				<div class="col-md-6">
					<div class="row">
						@foreach($noticiasrecentes as $key=>$f)
							@if($key > 0 && $key < 3)
							<div class="col-md-6">
								<div class="relative">
									<a href="{{url('article')}}/{{$f->pid}}/{{$f->slug}}"><img src="{{url('storage')}}/{{$f->image}}" class="imagem-recente" />
										<span class="caption">{{$f->title_posts}}</span>
									</a>
								</div>
							</div>
							@endif
						@endforeach
					</div>
					<div class="row" style="margin-top:10px;">
						@foreach($noticiasrecentes as $key=>$f)
							@if($key > 3 && $key < 6)
							<div class="col-md-6">
								<div class="relative">
									<a href="{{url('article')}}/{{$f->pid}}/{{$f->slug}}"><img src="{{url('storage')}}/{{$f->image}}" class="imagem-recente" />
										<span class="caption">{{$f->title_posts}}</span>
									</a>
								</div>
							</div>
							@endif
						@endforeach
					</div>        
				</div>
			</div>
		@endif
		@foreach($categorias as $c)
			@if($c->position_id == 29)			
				<div class="row" style="margin-top:30px;">
					<div class="col-md-8">
						<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
							<div class="col-md-12">
								<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">{{strtoupper($c->title)}}</span></h3>
							</div>
							@foreach($noticiasGeral as $key=>$n)
								@if($key == $c->position_id)
									@foreach($n as $key=>$noticias)
										<div class="col-md-6">
											@if($key == 0)
												<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}"><img src="{{url('storage')}}/{{$noticias->image}}" width="100%" style="margin-bottom:15px;" />
												<h3><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title}}</a></h3>
												<p align="justify">{!!$noticias->lide!!}</p><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">Saiba Mais &raquo;</a>
											@endif
										</div>
										<div class="col-md-6">
											@if($key > 0 && $key < 6)
												<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
													<div class="col-md-4">
														<div class="row">
															<img src="{{url('storage')}}/{{$noticias->image}}" width="100%" />
														</div>
													</div>
													<div class="col-md-8">
														<div class="row">
															<h4><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title}}</a></h4>
														</div>
													</div>
												</div>
											@endif
										</div>
									@endforeach
								@endif
							@endforeach
						</div>
					</div>
				</div>
			@endif
		@endforeach
		@foreach($categorias as $c)
			@if($c->position_id == 21)
				<div class="row" style="margin-top:30px;">
					<div class="col-md-8">
						<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-bottom:30px;">
							<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">{{strtoupper($c->title)}}</span></h3>
							<div class="flex">
								@foreach($noticiasGeral as $key=>$n)
									@if($key == $c->position_id)
										@foreach($n->take(5) as $images)
											<div>
												<a href="{{url('article')}}/{{$images->pid}}/{{$images->slug}}"><img src="{{url('storage')}}/{{$images->image}}" /></a>
											</div>
										@endforeach
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			@endif
		@endforeach
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					@foreach($categorias as $c)
						@if($c->position_id == 22)
							<div class="col-md-6">
								<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
									<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
										<h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">{{strtoupper($c->title)}}</span></h3>
											@foreach($noticiasGeral as $key=>$n)
												@if($key == $c->position_id)
													@foreach($n as $key=>$noticias)
														@if($key == 0)
															<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}"><img src="{{url('storage')}}/{{$noticias->image}}" style="width: 100%; margin-bottom:15px;" /></a>
															<h3><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h3>
															<p align="justify">{!!$noticias->lide!!}</p>
															<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">Saiba mais &raquo;</a>
														@endif
													@endforeach
												@endif
											@endforeach
									</div>
									@foreach($noticiasGeral as $key=>$n)
										@if($key == $c->position_id)
											@foreach($n as $key=>$noticias)
												@if($key > 0 && $key < 5)
													<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
														<div class="col-md-4">
															<div class="row fashion">
																<img src="{{url('storage')}}/{{$noticias->image}}" width="100%" />
															</div>
														</div>
														<div class="col-md-8">
															<div class="row">
																<h4><a href="{{url('artcle')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h4>
															</div>
														</div>
													</div>
												@endif
											@endforeach
										@endif
									@endforeach
								</div>
							</div>
						@endif

						@if($c->position_id == 23)
							<div class="col-md-6">
								<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
									<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
										<h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">{{strtoupper($c->title)}}</span></h3>
										@foreach($noticiasGeral as $key=>$n)
											@if($key == $c->position_id)
												@foreach($n as $key=>$noticias)
													@if($key == 0)
														<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}"><img src="{{url('storage')}}/{{$noticias->image}}" style="width: 100%; margin-bottom:15px;" /></a>
														<h3><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h3>
														<p align="justify">{!!$noticias->lide!!}</p>
														<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">Saiba mais &raquo;</a>
													@endif
												@endforeach
											@endif
										@endforeach		
									</div>
									@foreach($noticiasGeral as $key=>$n)
										@if($key == $c->position_id)
											@foreach($n as $key=>$noticias)
												@if($key > 0 && $key < 5)
													<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
														<div class="col-md-4">
															<div class="row fashion">
																<img src="{{url('storage')}}/{{$noticias->image}}" width="100%" />
															</div>
														</div>
														<div class="col-md-8">
															<div class="row">
																<h4><a href="{{url('artcle')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h4>
															</div>
														</div>
													</div>
												@endif
											@endforeach
										@endif
									@endforeach
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>

		<div class="row">
			@foreach($categorias as $c)
				@if($c->position_id == 24 || $c->position_id == 25 || $c->position_id == 30)
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
									<div class="col-md-12">
										<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">{{strtoupper($c->title)}}</span></h3>
									</div>
									<div class="col-md-6">
										@foreach($noticiasGeral as $key=>$n)
											@if($key == $c->position_id)
												@foreach($n as $key=>$noticias)
													@if($key == 0)
														<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}"><img src="{{url('storage')}}/{{$noticias->image}}" style="width: 100%; margin-bottom:15px;" /></a>
														<h3><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h3>
														<p align="justify">{!!$noticias->lide!!}</p>
														<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">Saiba mais &raquo;</a>
													@endif
												@endforeach
											@endif
										@endforeach
									</div>
									<div class="col-md-6">
										@foreach($noticiasGeral as $key=>$n)
											@if($key == $c->position_id)
												@foreach($n as $key=>$noticias)
													@if($key > 0 && $key < 5)
														<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
															<div class="col-md-4">
																<div class="row">
																	<img src="{{url('storage')}}/{{$noticias->image}}" width="100%" />
																</div>
															</div>
															<div class="col-md-8">
																<div class="row" style="padding-left:10px;">
																	<h4><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h4>
																</div>
															</div>
														</div>
													@endif
												@endforeach
											@endif
										@endforeach 
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</x-frontend>