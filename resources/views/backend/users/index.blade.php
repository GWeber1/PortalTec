<x-backend title="Usuários">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 title">
				<h1><i class="fa fa-bars"></i>Usuários</h1>
			</div>
			
			<div class="col-sm-4 cat-form">
				@isset($mensagemSucesso)
    			<div class="alert alert-success alert-dismissable dade fin">
        			<a href="#" class="close" data-dismiss="alert">&times;</a>
        			{{$mensagemSucesso}}
    			</div>
				@endisset
				
				@isset($mensagemErro)
				<div class="alert alert-error alert-dismissable dade fin">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{$mensagemErro}}
				</div>
				@endisset

				<h3>Adicionar novo usuário</h3>
				<form method="post" action="{{route('users.add')}}">
					@csrf
					<div class="form-group">
						<label>Nome Completo</label>
						<input type="text" name="name" id="name" class="form-control">
						<p>O nome é como aparecerá no cadastro</p>
					</div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <p>O email será usado como forma de contato e divulgação</p>
                    </div>

					<div class="form-group">
                        <label for="email">Senha</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <p>A senha será usada para autenticação</p>
                    </div>

					<div class="form-group">
                        <label for="email">Confirmar senha</label>
                        <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control">
					</div>

					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status">
							<option>Ativo</option>
							<option>Inativo</option>
						</select>
                        <p>Usuários inativos não podem acessar o portal</p>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Adicionar Novo Usuário</button>
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
								<th>Email</th>
                                <th>Status</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)
								@foreach($data as $user)
								<tr>
									<td>
										<form method="post" action="{{route('users.delete', $user->id)}}">
											@csrf
											<button type="button" class="delete-button fa-solid fa-trash botao-transparente" data-toggle="modal" data-target="#confirmation-modal" data-category-id="{{ $user->id }}"></button>
                  							<div id="overlay" class="overlay"></div>
											<a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a>
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
									<td>{{$user->email}}</td>
                                    <td>{{$user->status}}</td>
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