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
						<label>Mural</label>
						<select class="form-control" name="position_id">
							@foreach($position as $key=>$p)
								<option value="{{$p->pid}}" @if($singledata->position_id == $p->pid) selected @endif>{{$p->nome}}</option>
							@endforeach
						</select>
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
										<form action="{{route('category.delete')}}" method="post" id="delete-form-{{$category->cid}}">
											@csrf
											<button type="button" class="delete-button fa-solid fa-trash botao-transparente" data-toggle="modal" data-target="#confirmation-modal" data-category-id="{{ $category->cid }}"></button>
                  							<div id="overlay" class="overlay"></div>
											<a href="{{route('category.edit', $category->cid)}}">{{$category->title}}</a>
											<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="confirmation-modal-label" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="confirmation-modal-label"><b>Confirmação de Exclusão</b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															Tem certeza de que deseja excluir este item?
														</div>
														<div class="modal-footer">
															<input type="hidden" name="category_id" id="category_id" value="">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
															<button type="submit" class="btn btn-success">Sim, Excluir</button>
														</div>
													</div>
												</div>
											</div>
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