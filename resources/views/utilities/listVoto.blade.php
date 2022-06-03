@extends('utilities.str_list')
@section('list')
<div class="card mt-4">
	<div class="card-header">
		<h5 class="card-title font-weight-bold">{{ $title }}</h5>
		<h6 class="font-weight-normal">{{ $day }}</h6>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Voto</td>
					<td>Casilla</td>
					<td>Candidatos - votos</td>
				</tr>
			</thead>
			<tbody>
				@foreach($votos as $voto)
				<tr>
					<td>{{$voto->id}}</td>
					<td>{{$voto->casilla->ubicacion}}</td>
					<td>
						<table>
							@foreach($voto->candidatos as $candidato)
							<tr>
								<td>{{$candidato->nombrecompleto}} </td>
								<td><input type="text" readonly value="{{$candidato->pivot->votos}}" name="candidato_{{$candidato->id}}"> </td>
							</tr>
							@endforeach
						</table>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection