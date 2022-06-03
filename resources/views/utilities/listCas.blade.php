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
                    <td>UBICACION</td>
                </tr>
            </thead>
            <tbody>
                @foreach($casillas as $casilla)
                <tr>
                    <td>{{$casilla->id}}</td>
                    <td>{{$casilla->ubicacion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>