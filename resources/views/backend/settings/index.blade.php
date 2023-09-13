<x-backend title="Configurações">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 title">
				<h1><i class="fa fa-bars"></i>Configurações</h1>
			</div>
			<div class="col-sm-4 cat-form">
				@isset($mensagemSucesso)
    			<div class="alert alert-success alert-dismissable dade fin">
        			<a href="#" class="close" data-dismiss="alert">&times;</a>
        			{{$mensagemSucesso}}
    			</div>
				@endisset
				<h3>Adicionar nova configuração</h3>
				@if(empty($data))
				<form method="post" action="{{route('settings.add')}}" enctype="multipart/form-data">
				@else
				<form method="post" action="{{route('settings.update')}}" enctype="multipart/form-data">
				@endif
					@csrf
					<div class="form-group">
						<label>Logo</label>
						<p><img id="output" width="200" src="{{url('storage')}}/{{$data->image}}" /></p>
						<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
						<p><label for="file" class="btn btn-warning" style="cursor: pointer;">Substituir Imagem</label></p>
						<p>A logo é o que irá aparecer como a imagem do portal</p>
						<script>
							function loadFile(event) {
								var image = document.getElementById('output');
								image.src = URL.createObjectURL(event.target.files[0]);
							};
						</script>
					</div>
					<div class="form-group">
						<label>Sobre Nós</label>
						<textarea name="about" class="form-control" rows="10">{{$data->about}}</textarea>
					</div>
					<div id="socialFieldGroup">
						<div class="form-group">
							<label>Social</label>
							@foreach($data->social as $social)
								<div class="form-group">
									<input type="url" name="social[]" class="form-control socialCount" value="{{$social}}">
								</div>
							@endforeach
							<p class="text-muted">e.g. https://www.facebook.com/paginaexemplo</p>
						</div>
					</div>
					<div class="text-right form-group">
						<a class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></a>
					</div>
					<div class="form-group">
						<div class="alert alert-danger alert-dismissable noshow" id="socialAlert">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Atenção!</strong> Limite de links alcançado (max. 5)
						</div>
					</div>
					<div class="form-group">
						@if(!$data)
							<button class="btn btn-primary">Adicionar Nova Configuração</button>
						@else
							<button class="btn btn-primary">Atualizar Configurações</button>
						@endif
					</div>
				</form>
			</div>
		</div>
	</div>
</x-backend>