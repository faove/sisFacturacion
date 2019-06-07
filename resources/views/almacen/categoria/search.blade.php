{!!Form::open(array('url'=>'almacen/categoria','method'=>'GET','autocomplete'=>'off','roles'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-group" name="searchText" placeholder="Buscar..." value="{{$searchText}}"></input>
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>
{{Form::close()}}