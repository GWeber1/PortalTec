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
				<h3>Adicionar novo usuário</h3>
				<form method="post" action="#">
					@csrf
					<div class="form-group">
						<label>Nome Completo</label>
						<input type="text" name="title" id="title" class="form-control">
						<p>O nome é como aparecerá no cadastro</p>
					</div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <p>O email será usado como forma de contato e divulgação</p>
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
										<form method="post" action="">
											@csrf
											<button type="submit" class="btn-delete fa-solid fa-trash"></button>
											<a href="#">{{$user->name}}</a>
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