@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Candidato
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('candidato.update', $candidato->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" id="nombrecompleto" value="{{$candidato->nombrecompleto}}" class="form-control" name="nombrecompleto" />
            </div>
            <div style="margin: 10px;"></div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>

                <select name="sexo" value="{{$candidato->sexo}}">
                    @php
                    $selectedSexoH = $candidato->sexo =="H"?" selected ": "";
                    $selectedSexoM = $candidato->sexo =="M"?" selected ": "";
                    @endphp
                    <option {{$selectedSexoH}} value="H">Hombre</option>
                    <option {{$selectedSexoM}} value="M">Mujer</option>
                </select>
            </div>
            <div style="margin: 10px;"></div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <img src="/image/{{$candidato->foto}}" id="out" style="width: 25vw; min-width: 140px;">
                <div style="margin: 10px;"></div>
                <!-- <img src="/image/{{$candidato->foto}}" height="100px"  width="100px" > -->
                <input type="file" id="foto" accept="image/png, image/jpeg" class="form-control" name="foto" onchange="loadImg()" />
            </div>
            <div style="margin: 10px;"></div>
            <div class="form-group">
                <label for="perfil">Perfil:</label>
                <input type="file" id="perfil" accept="application/pdf" class="form-control" name="perfil" />
            </div>
            <div style="margin: 10px;"></div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<script>
    var MAX_SIZE = 2048;
    let loadImg = () => {
        let a = document.getElementById("foto").files[0].size;
        a = (a / 1024);
        if (a > MAX_SIZE) {
            alert("Imagen muy grande, tamaño actual " + a);
            //setear a null la eleccion
            document.getElementById('foto').value = null;
            // setear la imagen, en caso de que se haya elegido una anterior
            // document.getElementById("out").style.display = 'none';
        } else {
            alert("Imagen aceptable " + "Tamanio >> " + a);
            // obtiene el id de la imagen
            let img = document.getElementById("out");
            // crea la preview de la imagen
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    }
    let loadFile = () => {
        //Obtener el file
        let a = document.getElementById("perfil").files[0].size;
        //Dividir para tener una relacion con el tamaño de php.ini -> 2M
        a = (a / 1024);
        if (a > MAX_SIZE) {
            alert("Imagen muy grande, tamaño actual " + a + "MB");
            //setear a null la eleccion
            document.getElementById('perfil').value = null;
        } else {
            alert("Archivo aceptable " + "Tamanio >> " + a);
        }
    }
</script>
@endsection