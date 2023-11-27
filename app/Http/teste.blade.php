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
			<div class="row">

				<div class="col-md-6">
					<div class="row">
						
					</div>
					<div class="row" style="margin-top:10px;">
						
					</div>        
				</div>
			</div>
		
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
				<div class="col-md-12">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">NOTÍCIAS</span></h3>
				</div>
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
			
				<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">SOFTWARE</span></h3>
					<div class="flex">

					</div>
				</div>
			
			<div class="row">
				<div class="col-md-6">
				<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
						<h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">CELULARES</span></h3>
							
					</div>
					
				</div></div>
				<div class="col-md-6">
				<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
						<h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">HARDWARE</span></h3>
										
					</div>
					
				</div></div>
			
			<div class="col-md-12">
				<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
					<div class="col-md-12">
						<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">INTERNET DAS COISAS</span></h3>
					</div>
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
				<div class="col-md-12">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">ELETRÔNICOS</span></h3>	
				</div>
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6">
					
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
					
				</div>
			</div>
		</div>
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
			<div class="col-md-12">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">CIBERSEGURANÇA</span></h3>
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					
				</div>
			</div>
		</div>
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
			<div class="col-md-12">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">SUSTENTABILIDADE TEC</span></h3>
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					
				</div>
			</div>          	
		</div>
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
			<div class="col-md-12">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">METAVERSO</span></h3>
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					
				</div>
			</div>          	
		</div> 
	</div>
		<div class="col-md-8">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
				<h3 style="border-bottom:3px solid #1f9df1; padding-bottom:5px;"><span style="padding:6px 12px; background:#1f9df1;">NOS SIGA EM:</span></h3>
				
			</div>
		</div>
	</div>
</div>
</div>
</x-frontend>