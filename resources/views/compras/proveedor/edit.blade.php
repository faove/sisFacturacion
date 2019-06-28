@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Proveedor: {{ $persona->nombre}}</h3>
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
		{!!Form::model($persona,['method'=>'PATCH','action' => ['ProveedorController@update',$persona->idpersona],'files'=>'true'])!!}		
        {{Form::token()}}
	    <div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre del Proveedor...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_persona">Tipo de Persona</label>
				<input type="text" name="tipo_persona" required value="{{$persona->tipo_persona}}" class="form-control" placeholder="Proveedor o Distribuidor">
			</div>
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">

				<label for="tipo_documento">Tipo de Documento</label>
				<select name="tipo_documento" class="form-control">					

					@if ($persona->tipo_documento=='Ced')
						<option value="CED" selected>Cédula</option>	
						<option value="RIF">RIF</option>	
						<option value="PAS">Pasaporte</option>
					@elseif ($persona->tipo_documento=='rif')
						<option value="CED">Cédula</option>	
						<option value="RIF" selected>RIF</option>	
						<option value="PAS">Pasaporte</option>
					@else
						<option value="CED">Cédula</option>	
						<option value="RIF">RIF</option>	
						<option value="PAS" selected>Pasaporte</option>	
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