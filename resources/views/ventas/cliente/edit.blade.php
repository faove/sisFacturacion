@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $persona->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

		{{-- {!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!} --}}
		{!!Form::model($persona,['method'=>'PATCH','action' => ['ClienteController@update',$persona->idpersona],'files'=>'true'])!!}		
        {{Form::token()}}
	    <div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre del Cliente...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_persona">Tipo de Persona</label>
				<input type="text" name="tipo_persona" required value="{{$persona->tipo_persona}}" class="form-control" placeholder="Cliente o Distribuidor">
			</div>
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">

				<label for="tipo_documento">Tipo de Documento</label>
				<select name="tipo_documento" class="form-control">					

					@if ($persona->tipo_documento=='Ced')
						<option value="Ced" selected>Cédula</option>	
						<option value="rif">RIF</option>	
						<option value="Pas">Pasaporte</option>
					@elseif ($persona->tipo_documento=='rif')
						<option value="Ced">Cédula</option>	
						<option value="rif" selected>RIF</option>	
						<option value="Pas">Pasaporte</option>
					@else
						<option value="Ced">Cédula</option>	
						<option value="rif">RIF</option>	
						<option value="Pas" selected>Pasaporte</option>	
					@endif	
				</select>

			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_documento">Número de Documento</label>
				<input type="text" name="num_documento" value="{{$persona->num_documento}}" class="form-control" placeholder="Número de Cédula o RIF...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" value="{{$persona->direccion}}"  class="form-control" placeholder="Dirección...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" value="{{$persona->telefono}}"  class="form-control" placeholder="Telefono...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="email">Correo electrónico</label>
				<input type="email" name="email" value="{{$persona->email}}"  class="form-control" placeholder="Email...">
			</div>
		</div>
		<div class="col-lg-6 ol-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

		</div>

		{!!Form::close()!!}		
            
@endsection