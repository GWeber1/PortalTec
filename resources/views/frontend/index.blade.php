<x-frontend title="Página Inicial" aboutUs="{{$configuracoes->about}}" logo="{{$configuracoes->image}}" pages={{json_encode($pages)}}>
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
		<div style="margin-top: 30px !important;">
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
							@if($key > 0 and $key < 3)
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
							@if($key > 3 and $key < 6)
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
		</div>
		<div class="row">
			<div class="col-md-8">
				@foreach($categorias as $c)
					@if($c->position_id == 21)		
						<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top: 30px;">
							<div class="col-md-12">
								<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">{{strtoupper($c->title)}}</span></h3>
							</div>
							@foreach($noticiasGeral as $key=>$n)
								@if($key == $c->position_id)
									@foreach($n as $key=>$noticias)
										<div class="col-md-6">
											@if($key == 0)
												<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}"><img src="{{url('storage')}}/{{$noticias->image}}" width="100%" style="margin-bottom:15px;" />
												<h3><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h3>
												<p align="justify">{!!$noticias->lide!!}</p><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">Saiba Mais &raquo;</a>
											@endif
										</div>
										<div class="col-md-6">
											@if($key > 0 and $key < 6)
												<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
													<div class="col-md-4">
														<div class="row">
															<img src="{{url('storage')}}/{{$noticias->image}}" width="100%" />
														</div>
													</div>
													<div class="col-md-8">
														<div class="row">
															<h4><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h4>
														</div>
													</div>
												</div>
											@endif
										</div>
									@endforeach
								@endif
							@endforeach
						</div>
					@endif
					@if($c->position_id == 22)
						<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-bottom:30px; margin-top:30px;">
							<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">{{strtoupper($c->title)}}</span></h3>
							<div class="flex">
								@foreach($noticiasGeral as $key=>$n)
									@if($key == $c->position_id)
										@foreach($n->take(5) as $images)
											<div>
												<a href="{{url('article')}}/{{$images->pid}}/{{$images->slug}}"><img src="{{url('storage')}}/{{$images->image}}" title="{{$images->title_posts}}" /></a>
											</div>
										@endforeach
									@endif
								@endforeach
							</div>
						</div>
					@endif
				@endforeach
				
				<div class="row">
					@foreach($categorias as $c)
						@if($c->position_id == 23 || $c->position_id == 24)
							<div class="col-md-6">
								<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
										@if($c->position_id == 23)
											<h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">{{strtoupper($c->title)}}</span></h3>
										@endif
										
										@if($c->position_id == 24)
											<h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">{{strtoupper($c->title)}}</span></h3>
										@endif
										
										@foreach($noticiasGeral as $key=>$n)
											@if($key == $c->position_id)
												@foreach($n as $key=>$noticias)
													@if($key == 0)
														<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}"><img src="{{url('storage')}}/{{$noticias->image}}" style="width: 100%; margin-bottom:15px;" /></a>
														<h3><a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">{{$noticias->title_posts}}</a></h3>
														<p align="justify">{!!$noticias->lide!!}</p>
														<a href="{{url('article')}}/{{$noticias->pid}}/{{$noticias->slug}}">Saiba mais &raquo;</a>
													@endif
													@if($key > 0 and $key < 5)
														<div class="col-md-12">
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
				<div class="row">
					@foreach($categorias as $c)
						@if($c->position_id == 25 || $c->position_id == 26 || $c->position_id == 30)
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
						@endif
					@endforeach
				</div>
			</div>
			<div class="col-md-4">
				@foreach($categorias as $c)
					@if($c->position_id == 17 || $c->position_id == 18 || $c->position_id == 19 || $c->position_id == 20)
						<div class="col-md-12" style="border:1px solid #ccc; padding:15px; margin-top:30px;">
							<div class="col-md-12">
								<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">{{strtoupper($c->title)}}</span></h3>
								<div class="col-md-12" style="padding-bottom:10px; margin-bottom:10px;">
									@foreach($noticiasGeral as $key=>$n)
										@if($key == $c->position_id)
											@foreach($n as $key=>$noticias)
												@if($key >= 0 and $key < 7)
													<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
														<div class="col-md-4">
															<div class="row">
																<img src="{{url('storage')}}/{{$noticias->image}}" width="100%" style="margin-left:-15px;" />
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
					@endif
				@endforeach
			</div>
		</div>
	</div>
	<script>
	</script>
</x-frontend>