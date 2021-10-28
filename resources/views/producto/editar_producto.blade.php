@extends('layouts.app')

@section('content')
	<div  class="container">

						<div class="col-md-12" style="margin:15px; padding: 15px;">					
							@if (session('alert'))
								<div class="alert alert-success">
								    {{ session('alert') }}
								</div>
							@endif
							@if ($errors->any())
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif	
						</div>	
			<div class="col-md-12" style="margin:15px; background-color: white; border-radius: 15px; border-style: solid; border-width: thin; border-color: lightgray; padding: 15px;">
				<div class="container">
					<table class="table table-dark">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Codigo</th>
								<th>Precio</th>
								<th>Categoria</th>
								<th>Estado</th>
								<th>Creado en</th>
								<th>Actualizado en</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($productos as $producto)
								<tr>
									<td> {{ $producto->nombre }} </td>
									<td> {{ $producto->codigo }} </td>
									<td> ${{ $producto->precio }} </td>
									<td> {{$categoria_array[$producto->categoria]}} </td>
									<td> @if($producto->estado == 1 ) Activo @else Eliminado @endif </td>	
									<td> {{ $producto->created_at }}</td>
									<td> {{ $producto->updated_at }}</td>
									<td> 
										<button class="btn btn-primary" type="button" onclick="editar({{ $producto->id }})">
											 <span class="glyphicon glyphicon-trash" aria-hidden="true"> Editar </span>
										</button>
									</td>		
									<td> 
										<a class="btn btn-danger" type="button" href="/producto/eliminar_producto/{{$producto->id}}">
											 <span class="glyphicon glyphicon-trash" aria-hidden="true"> Borrar </span>
										</a>
									</td>							
						        </tr>
						    @endforeach
						</tbody>
					</table>
				    
				</div>

				{{ $productos->links() }}
			</div>
			
	</div>

<script type="text/javascript">
	function IsNumeric(e)
	{
		var specialKeys = new Array();
		specialKeys.push(8); //Backspace
        var keyCode = e.which ? e.which : e.keyCode
       	var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1 || keyCode == 45 || keyCode == 46);
        //document.getElementById("error").style.display = ret ? "none" : "inline";
        return ret;
        
	}
</script>
<script type="text/javascript">
	function editar(id)
	{
		window.location = "/producto/editar_producto/"+id;
	}
</script>
@endsection