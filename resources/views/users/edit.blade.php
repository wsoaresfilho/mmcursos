{{ config('app.name', 'Laravel') }} @extends('layouts.app')
@section('content') {{ Session::get('message') }}

<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Editar Usuário</h3>
			<Br>
			<form action="/users/edits/{{$detailpage->id}}" method="POST"
				class="form-horizontal">
				<div class="form-group">
					<label class="col-md-12">Nome</label>
					<div class="col-md-12">
						<input type="text" name="name" class="form-control"
							value="{{ $detailpage->name }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12">Email</label>
					<div class="col-md-12">
						<input type="text" name="email" class="form-control"
							value="{{ $detailpage->email }}">
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-12">Tipo</label>
					<div class="col-md-12">
						<input type="text" name="type" class="form-control"
							value="{{ $detailpage->type }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12">Senha</label>
					<div class="col-md-12">
						<input type="password" name="password" class="form-control"
							value="{{ $detailpage->password }}">
					</div>
				</div>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn waves-effect waves-light btn-info">Salvar</button>
			</form>
		</div>
	</div>
</div>
@endsection
