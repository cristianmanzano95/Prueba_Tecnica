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
			<form method="POST" action="{{ route('editar_producto_backend') }}" style="margin: 0px;" class="form-horizontal">
		 		@csrf		 		
		 		<div class="col-md-12" style="margin:15px; background-color: white; border-radius: 15px; border-style: solid; border-width: thin; border-color: lightgray; padding: 15px;">
				  	<div class="col-md-12" >
				    	<h3 style="text-align: center;"> Editar Producto </h3>
				    	<br>
				    	<div class="row">
				      		<input type="text" name="id" id="id" value="{{$producto->id}}" class="form-control" hidden="true" style="display: none;">
							<div class="form-group col-md-4">
								
								<label for="nombre">Nombre</label>
																	
								<div class="col-md-12">	
									<input type="text" name="nombre" id="nombre" placeholder="Nombre del Equipo" required="true" class="form-control" value="{{$producto->nombre}}">
				 				</div>		
			 				</div>

			 				<div class="form-group col-md-4">
								
								<label for="codigo">Código</label>
																	
								<div class="col-md-12">	
									<input type="text" name="codigo" id="codigo" placeholder="Número serial dispositivo" required="true" class="form-control" value="{{$producto->codigo}}" readonly="true">
				 				</div>		
			 				</div>

			 				<div class="form-group col-md-4">
								
								<label for="precio">Precio</label>
																	
								<div class="col-md-12">	
									<input type="text" name="precio" id="precio" placeholder="Precio" required="true" class="form-control" value="{{$producto->precio}}">
				 				</div>		
			 				</div>

			 				<div class="form-group col-md-4">
								
								<label for="categoria">Categoria</label>
																	
								<div class="col-md-12">	
									<select class="form-control" name="categoria" id="categoria" required="true">
									@foreach($categorias as $categoria)
										<option value="{{$categoria->id}}" @if($categoria->id == $producto->categoria) selected="true" @endif> {{$categoria->nombre}} </option>	
									@endforeach
									</select>
				 				</div>		
			 				</div>

						</div>
			 		</div>
			 		<div class="col-md-12" >
		 				<center>
			 				<button type="submit" class="btn btn-primary" style="width: 75%;" id="submit_button"> Editar </button>
			 			</center>        		
				  	</div>
				</div> 	
		 	</form>
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

@endsection