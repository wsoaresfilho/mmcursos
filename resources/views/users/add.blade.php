{{ config('app.name', 'Laravel') }} @extends('layouts.app')
@section('content') {{ Session::get('message') }}

<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Adicionar Usuário</h3>
			<br>
			@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

			<form action="/users/store" method="POST" class="form-horizontal">
				<div class="form-group">
					<label class="col-md-12">Nome</label>
					<div class="col-md-12">
						<input type="text" name="name" class="form-control" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12">Email</label>
					<div class="col-md-12">
						<input type="text" name="email" class="form-control" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12">Senha</label>
					<div class="col-md-12">
						<input type="text" name="password" class="form-control" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12">Tipo</label>
					<div class="col-md-12">
						<select name="type" class="form-control select2" data-style="form-control">
							<option value="admin">Administrador</option>
							<option value="prof">Professor</option>
							<option value="user">Aluno</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<h3 class="box-title m-b-0">Matricular nos Cursos</h3>

					@foreach($cursos as $curso)
					<div class="checkbox checkbox-success checkbox-circle">
						<input type="checkbox" name="curso_{{$curso->curso_id}}"
							id="{{$curso->curso_id}}"> <label
							for="curso_{{$curso->curso_id}}"> {{$curso->nome}} </label>
					</div>
					@endforeach

				</div>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn waves-effect waves-light btn-info">Salvar</button>
			</form>
		</div>

	</div>

</div>

@endsection





