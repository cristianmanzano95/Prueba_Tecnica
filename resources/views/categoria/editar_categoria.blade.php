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
								<th>Estado</th>
								<th>Creado en</th>
								<th>Actualizado en</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categorias as $categoria)
								<tr>
									<td> {{ $categoria->nombre }} </td>
									<td> @if($categoria->estado == 1 ) Activo @else Eliminado @endif </td>	
									<td> {{ $categoria->created_at }}</td>
									<td> {{ $categoria->updated_at }}</td>
									<td> 
										<button class="btn btn-primary" type="button" onclick="editar({{ $categoria->id }})">
											 <span class="glyphicon glyphicon-trash" aria-hidden="true"> Editar </span>
										</button>
									</td>	
									<td> 
										<a class="btn btn-danger" type="button" href="/categoria/eliminar_categoria/{{$categoria->id}}">
											 <span class="glyphicon glyphicon-trash" aria-hidden="true"> Borrar </span>
										</a>
									</td>								
						        </tr>
						    @endforeach
						</tbody>
					</table>
				    
				</div>

				{{ $categorias->links() }}
			</div>
			
	</div>

<script type="text/javascript">
	$(document).ready(function(e){
		set_max_checkbox($('#sensores').val());
		/*$('#check_temp').click(function(){
			console.log('flag2');
	    	$(this).trigger('nonclickable');
		});*/
	});
	var max = 0;
	function set_max_checkbox(value)
	{
		max = parseInt(value,10);
		console.log(max);
		/*$('#check_temp').prop("checked", false);
		$('#check_caudal').prop("checked", false);
		$('#check_vibracion').prop("checked", false);
		$('#check_presion').prop("checked", false);
		set_pres('check_temp');
		set_vibr('check_caudal');
		set_caudal('check_vibracion');
		set_temp('check_presion');*/
		if(max <= 0 || value == null)
		{
			/*$('#check_temp').bind('nonclickable',function() {
		    	console.log('flag');
		    	return false;
			});*/
			$('#submit_button').attr('disabled','true');			
		}else
		{
			$('#submit_button').removeAttr('disabled');
		}
	}
	function set_max(id)
	{
		if($('#'+id).is(":checked"))
		{
			max = max + 1;
		}else
		{
			max = max - 1;
		}
		$('#sensores').val(max);
		set_max_checkbox(max);
		console.log(max);
	}
	function set_pres(name)
	{
		if( $('#'+name).is(":checked"))
		{
			$('#pres_sup').removeAttr('hidden');
			$('#pres_inf').removeAttr('hidden');
		}else
		{
			$('#pres_sup').attr('hidden','true');
			$('#pres_inf').attr('hidden','true');
			$('#presion_superior').val('');
			$('#presion_inferior').val('');
		}
		return true;
	}
	function set_vibr(name)
	{
		if( $('#'+name).is(":checked"))
		{
			$('#vibr_sup').removeAttr('hidden');
			$('#vibr_inf').removeAttr('hidden');
		}else
		{
			$('#vibr_sup').attr('hidden','true');
			$('#vibr_inf').attr('hidden','true');
			$('#vibracion_superior').val('');
			$('#vibracion_inferior').val('');
		}
		return true;
	}
	function set_caudal(name)
	{
		if( $('#'+name).is(":checked"))
		{
			$('#caudal_sup').removeAttr('hidden');
			$('#caudal_inf').removeAttr('hidden');
		}else
		{
			$('#caudal_sup').attr('hidden','true');
			$('#caudal_inf').attr('hidden','true');
			$('#caudal_superior').val('');
			$('#caudal_inferior').val('');
		}
		return true;
	}
	function set_temp(name)
	{
		if( $('#'+name).is(":checked"))
		{
			$('#temp_sup').removeAttr('hidden');
			$('#temp_inf').removeAttr('hidden');
		}else
		{
			$('#temp_sup').attr('hidden','true');
			$('#temp_inf').attr('hidden','true');
			$('#temperatura_superior').val('');
			$('#temperatura_inferior').val('');
		}
		return true;
	}
	function compare_temp()
	{
		var inferior = $('#temperatura_inferior').val();
		var superior = $('#temperatura_superior').val();
		if( parseFloat(inferior) <= parseFloat(superior) )
		{
			return true;
		}else
		{
			$('#temperatura_superior').val('');
			return false;
		}
	}
	function compare_presion()
	{
		var inferior = $('#presion_inferior').val();
		var superior = $('#presion_superior').val();
		if( parseFloat(inferior) <= parseFloat(superior) )
		{
			return true;
		}else
		{
			$('#presion_superior').val('');
			return false;
		}
	}
	function compare_vibr()
	{
		var inferior = $('#vibracion_inferior').val();
		var superior = $('#vibracion_superior').val();
		if( parseFloat(inferior) <= parseFloat(superior) )
		{
			return true;
		}else
		{
			$('#vibracion_superior').val('');
			return false;
		}
	}
	function compare_caudal()
	{
		var inferior = $('#caudal_inferior').val();
		var superior = $('#caudal_superior').val();
		if( parseFloat(inferior) <= parseFloat(superior) )
		{
			return true;
		}else
		{
			$('#caudal_superior').val('');
			return false;
		}
	}
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
		window.location = "/categoria/editar_categoria/"+id;
	}
</script>
@endsection