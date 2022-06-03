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
					<td>ID</td>
					<td>NOMBRE COMPLETO</td>
					<td>SEXO</td>
					<!-- <td>FOTO</td> -->
					<td>PERFIL</td>
				</tr>
			</thead>
			<tbody>
				@foreach($candidatos as $candidato)
				<tr>
					<td>{{$candidato->id}}</td>
					<td>{{$candidato->nombrecompleto}}</td>
					<td>{{$candidato->sexo}}</td>
					<!-- <td><img src="image/{{$candidato->foto}}" width="128px" height="128px"></td> -->
					<td>
						<a href="pdf/{{$candidato->perfil}}">{{$candidato-> perfil}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>