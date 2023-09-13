<x-backend title="Categorias">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 title">
				<h1><i class="fa fa-bars"></i>Categorias</h1>
			</div>
			
			<div class="col-sm-4 cat-form">
				@isset($mensagemSucesso)
    			<div class="alert alert-success alert-dismissable dade fin">
        			<a href="#" class="close" data-dismiss="alert">&times;</a>
        			{{$mensagemSucesso}}
    			</div>
				@endisset
				<h3>Adicionar nova categoria</h3>
				<form method="post" action="{{route('category.add')}}">
					@csrf
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="title" id="title" class="form-control">
						<p>O nome é como irá aparecer no portal</p>
					</div>

					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status">
							<option>Ativo</option>
							<option>Inativo</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Adicionar Nova Categoria</button>
					</div>
				</form>	


			</div>

			<div class="col-sm-8 cat-view">
				@isset($mensagemAlerta)
    			<div class="alert alert-warning alert-dismissable dade fin">
        			<a href="#" class="close" data-dismiss="alert">&times;</a>
        			{{$mensagemAlerta}}
    			</div>
				@endisset
				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)
								@foreach($data as $category)
								<tr>
									<td>
										<form method="post" action="{{route('category.delete', $category->cid)}}">
											@csrf
											<button type="submit" class="btn-delete fa-solid fa-trash"></button>
											<a href="{{route('category.edit', $category->cid)}}">{{$category->title}}</a>
										</form>
									</td>
									<td>{{$category->status}}</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="3">Não há dados encontrados</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>					
			</div>
		</div>
	</div>
</x-backend>