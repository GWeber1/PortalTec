<x-frontend title="Artigo" aboutUs="{{$configuracoes->about}}" logo="{{$configuracoes->image}}" pages={{json_encode($pages)}}>
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
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v18.0" nonce="xLIzGbld"></script>
	<div class="wrapper">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">				
					<div class="col-md-12">
						<div class="text-right view-count">
							<h3>
								<i class="fa fa-eye"></i>
								{{$article->views + 1}}
								@if($article->views > 1)
								Views
								@else
								View
								@endif
							</h3>
						</div>
						<h1>{{$article->title_posts}}</h1>
						<img src="{{url('storage')}}/{{$article->image}}" width="100%" style="margin-bottom:15px;" />
						<h4><b>{!!$article->lide!!}</b></h4>
						<p align="justify">{!!$article->description!!}</p>
					</div>
					<div class="col-sm-12 share-this">
						<h3>Compartilhar</h3>
						<span class="tweet-btn">
							<div class="fb-share-button" data-href="{{url('article')}}/{{$article->pid}}/{{$article->slug}}" data-layout="button" data-size="small">
							</div>
							<a class="twitter-share-button" href="https://twitter.com/intent/tweet" data-size="small">Tweet</a>
						</span>
						<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
						<script type="IN/Share" data-url="{{url('article')}}/{{$article->pid}}/{{$article->slug}}" data-size="small"></script>
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
								</a><h3><a href="{{url('article')}}/{{$v->pid}}/{{$v->slug}}">{{$v->title_posts}}</a></h3>
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
									<h4><a href="{{url('article')}}/{{$v->pid}}/{{$v->slug}}">{{$v->title_posts}}</a></h4>
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