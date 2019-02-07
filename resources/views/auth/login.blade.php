<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colegio Hispanoamericano Salcajá">
  <meta name="author" content="Glib Software">
  <meta name="keyword" content="Sistema Colegio Hispanoamericano Salcajá">

  <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

  <title>CHS - LOGIN</title>

  <!-- Icons -->
  <link href="{{asset('vendors/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/css/simple-line-icons.min.css')}}" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group">
          <div class=" card p-4">
            <div class="card-body">
              <form  action="/login" method="post">

                {!! csrf_field() !!}
              <h1>Iniciar sesión</h1>
              <p class="text-muted">Iniciar sesión en su cuenta</p>
              <div class="input-group mb-3">
                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input name="email" type="email" class="form-control" placeholder="Correo electrónico">

              </div>
              <div class="input-group mb-4">
                <span class="input-group-addon"><i class="icon-lock"></i></span>
                <input name="password" type="password" class="form-control" placeholder="Contraseña">


              </div>
              <div class="row">
                <div class="input-group mb-3">
                  {!!$errors->first('email','<span class=text-danger>:message</span>')!!}
                </div>

              </div>
              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn btn-primary px-4">Entrar</button>
                </div>

              </div>
                </form>
            </div>
          </div>
          <div class="card p-4" style="width:44%">
            <div class="card-body text-center">
              <div>

                <img src="{{asset('vendors/img/logo.JPG')}}" alt=""  class="img-fluid">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="{{asset('vendors/js/jquery.min.js')}}"></script>
  <script src="{{asset('vendors/js/popper.min.js')}}"></script>
  <script src="{{asset('vendors/js/bootstrap.min.js')}}"></script>

</body>
</html>
