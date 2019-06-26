@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert.danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>
						{{$errors}}	
						</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>		

	{!!Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
	{{ Form::token() }}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_persona">Tipo de Persona</label>
				<input type="text" name="tipo_persona" required value="{{old('tipo_persona')}}" class="form-control">
			</div>
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">

				<label for="tipo_documento">Tipo de Documento</label>

				<select name="tipo_documento" class="form-control">					
						<option value="Ced">Cédula</option>	
						<option value="RIF">RIF</option>	
						<option value="Pas">Pasaporte</option>
				</select>

			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_documento">Número de Documento</label>
				<input type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="Número de Cédula o RIF...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" value="{{old('direccion')}}"  class="form-control" placeholder="Dirección...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" value="{{old('telefono')}}"  class="form-control" placeholder="Telefono...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="email">Correo electrónico</label>
				<input type="email" name="email" value="{{old('email')}}"  class="form-control" placeholder="Email...">
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