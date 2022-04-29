@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Candidato
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
        <form method="post" action="{{ route('candidato.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" id="nombrecompleto" class="form-control" name="nombrecompleto" />
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" accept="image/png, image/jpeg" class="form-control" name="foto" onchange="loadImg()" />
                <div style="margin: 10px;"></div>
                <!-- Proporcion de un 25% en base a su altura -->
                <img id="out-img" style="width: 25vw; min-width: 140px;" />
            </div>
            <div class="form-group">
                <label for="perfil">Perfil:</label>
                <input type="file" id="perfil" accept="application/pdf" class="form-control" name="perfil" onchange="loadFile()" />
                <div style="margin: 10px;"></div>
                <embed src="src" id="src" style="width: 55vw; min-width: 140px;">
            </div>

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
            document.getElementById("out-img").style.display = 'none';
        } else {
            alert("Imagen aceptable " + "Tamanio >> " + a);
            // obtiene el id de la imagen
            let img = document.getElementById("out-img");
            // crea la preview de la imagen
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    }


    let loadFile = () => {
        //Obtener el file
        alert("LOOOOOL");
        let a = document.getElementById("perfil").files[0].size;
        //Dividir para tener una relacion con el tamaño de php.ini -> 2M
        a = (a / 1024);
        if (a > MAX_SIZE) {
            alert("Imagen muy grande, tamaño actual " + a + "MB");
            //setear a null la eleccion
            document.getElementById('perfil').value = null;
        } else {
            alert("Archivo aceptable " + "Tamanio >> " + a);
            let src = document.getElementById("src");
            console.log("Existe el -> "+ src)
            src.src= URL.createObjectURL(event.target.files[0])
        }
    }
</script>
@endsection