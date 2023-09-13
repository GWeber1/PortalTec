<x-backend title="Categorias">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 title">
				<h1><i class="fa fa-bars"></i>Editar Categorias</h1>
			</div>
			<div class="col-sm-4 cat-form">
				@isset($mensagemSucesso)
    			<div class="alert alert-success alert-dismissable dade fin">
        			<a href="#" class="close" data-dismiss="alert">&times;</a>
        			{{$mensagemSucesso}}
    			</div>
				@endisset
				<h3>Editar categoria</h3>
				<form method="post" action="{{route('category.update')}}">
					@csrf
					<div hidden class="form-group">
						<label>Id</label>
						<input type="text" name="id", id="id", class="form-control", value="{{$cid}}", readonly="">
					</div>
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="title" id="title" class="form-control", value="{{$singledata->title}}">
						<p>O nome é como irá aparecer no portal</p>
					</div>

					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status">
							<option>{{$singledata->status}}</option>
							@if($singledata->status == 'Inativo')
							<option>Ativo</option>
							@else
							<option>Inativo</option>
							@endif
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Editar Categoria</button>
					</div>
				</form>	


			</div>

			<div class="col-sm-8 cat-view">
				<div class="row">
					@csrf
					<div class="col-sm-4">
						<input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar">
					</div>	
				</div>
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
										<form action="{{route('category.delete', $category->cid)}}" method="post">
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