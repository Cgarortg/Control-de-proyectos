@extends('layouts.plantilla')

@section('alert')
    <div class="alert alert-success d-none" role="alert" id='alert_usuario_creado'>
         Usuario creado correctamente
    </div>
@endsection
@section('body-class','bg-body-secondary')
@section('contenido')
    <div class="register-box my-5 mx-auto">
    
      <div class="register-logo">
        <a href="../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.register-logo -->
      <div class="card">
        <div class="card-body register-card-body">
          <p class="register-box-msg">Registrate para ser un nuevo miembro</p>
          <form action="{{route('register')}}" method="post" onsubmit="return crearUser(event);" id='form_registro'>

            <div class="input-group mb-3" >
              <input type="text" class="form-control" placeholder="Nombre" name="nombre" onfocus = "limpiar(this.name)" />
              <div class="input-group-text"><span class="bi bi-person"></span></div>
              <div class="invalid-feedback" id="nombre_form"></div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" onfocus = "limpiar(this.name)" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
              <div class="invalid-feedback" id="apellidos_form"></div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" onfocus = "limpiar(this.name)"/>
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
              <div class="invalid-feedback" id="email_form"></div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Telefono" name="telefono" onfocus = "limpiar(this.name)" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
              <div class="invalid-feedback" id="telefono_form"></div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" onfocus = "limpiar(this.name)"/>
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
              <div class="invalid-feedback" id="password_form"></div>
             
            </div>
            
            
            <!--begin::Row-->
            <div class="row mt-4 mb-3">
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
        
          <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center"> I already have a membership </a>
          </p>
        </div>
        <!-- /.register-card-body -->
      </div>
    </div>
@endsection
@section('script')
    <script>
        
        function crearUser(event){
            event.preventDefault();
            limpiarCampos();
            let form = document.getElementById('form_registro')
            let datos = {
                nombre:form.nombre.value,
                apellidos:form.apellidos.value,
                email:form.email.value,
                telefono:form.telefono.value,
                password:form.password.value,
            }
            
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(datos)
            })
            .then(response => response.json())
            .then(data => {
              console.log(data)
                if(data.length === 0 ){
                    usuarioRegistrado()
                }else{
                    checkCampos(data)
                }
            })
            .catch(error => {
                console.error('Error en la petición:', error);
            });
        }

        function limpiar(name){
            let div = document.getElementById(name+'_form');
            div.style.display = 'none'

        }
        function limpiarCampos(){
            let form = document.getElementById("form_registro");
            let inputs = form.querySelectorAll("input");
            inputs.forEach(e => limpiar(e.name))
           
        }
        function checkCampos(data) {
            for(let key in data.errors){
                    let div = document.getElementById(key+'_form');
                    div.innerHTML = data.errors[key][0]
                    div.style.display = 'block'
                }
        }

        function usuarioRegistrado(){
           
            let form = document.getElementById("form_registro");
            let inputs = form.querySelectorAll("input");
            inputs.forEach(e => e.value = '')

            let alert = document.getElementById("alert_usuario_creado");
            clases = alert.classList.value.split(' ')
            clases[2] = 'd-block';
            alert.classList.value = clases.join(' ');

            setTimeout(() => {
                clases = alert.classList.value.split(' ')
                clases[2] = 'd-none';
                alert.classList.value = clases.join(' ');
            }, 3000);

        }
    </script>
@endsection
