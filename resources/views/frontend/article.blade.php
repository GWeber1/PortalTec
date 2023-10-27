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
								</a>
								<b>{{$v->title}}</b>
							</div>
						@endif
					@endforeach
				</div>     
			</div>

<!-- right section -->
			<div class="col-md-4">
				<div class="col-md-12" style="padding:15px;">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="padding-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12" style=" padding:15px 15px 60px 15px; margin-top:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
						<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
						<img src="{{url('images/coffee-563797_1280-390x205.jpg')}}" width="100%" style="margin-bottom:15px;" />
						<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>Read more <a href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:0px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:0px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12" style=" padding:15px 15px 30px 15px; margin-top:30px;">
					<div class="col-md-12">
						<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
					</div>          	
					<div class="col-md-6">
						<img src="{{url('images/add1.jpg')}}" width="100%" />
					</div>
					<div class="col-md-6">
						<img src="{{url('images/add1.jpg')}}" width="100%" />
					</div>
				</div>

				<div class="col-md-12" style=" padding:15px 15px 7px 15px; margin-top:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
						<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
						<img src="{{url('images/bride-301814_1280-392x272.jpg')}}" width="100%" style="margin-bottom:15px;" />
						<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>Read more <a href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:0px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:0px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:0px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:0px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="padding-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<img src="{{url('images/relaxed-498245_1280-392x272.jpg')}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:0px;">
								<h4>Lorem ipsum dolor sit amet</h4>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</x-frontend>