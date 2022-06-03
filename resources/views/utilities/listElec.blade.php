@extends('utilities.str_list')
@section('list')
<div class="mt-4">
    <!-- <div class="card-header"> -->
        <h5 class="card-title font-weight-bold">{{ $title }}</h5>
        <h6 class="font-weight-normal">{{ $day }}</h6>
    <!-- </div> -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Periodo</td>
                    <td>Fecha</td>
                    <td>Fecha Apertura</td>
                    <td>Hora Apertura</td>
                    <td>Fecha Cierre</td>
                    <td>Hora Cierre</td>
                    <td>Observaciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($elecciones as $elec)
                <tr>
                    <td>{{$elec->id}}</td>
                    <td>{{$elec->periodo}}</td>
                    <td>{{$elec->fecha-> format("d-m-Y")}}</td>
                    <td>{{$elec->fechaapertura->format('m/d/Y')}} </td>
                    <td>{{$elec->horaapertura -> format('H:i')}}</td>
                    <td>{{$elec->fechacierre ->format('m/d/Y')}}</td>
                    <td>{{$elec->horacierre -> format('H:i')}}</td>
                    <td>{{$elec->observaciones}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection