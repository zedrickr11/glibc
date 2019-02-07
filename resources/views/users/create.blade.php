@extends ('layouts.admin')
@section ('contenido')

<section class="content-header">
      <h1>
        Seguridad
        <small>Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tv"></i> Seguridad</a></li>
        <li class="active">Usuarios</li>
      </ol>
</section>
	<section class="content">
<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Nuevo Usuario</h3>
			</div>

			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="POST" action="{{route('usuarios.store')}}" >
					{!! csrf_field() !!}

				<div class="box-body col-md-4">

            <div class="form-group">
              <label for="name">Usuario</label>
              <input  type="text" class="form-control" name="name" value="{{old('user')}}">
              {!!$errors->first('name','<span class-error>:message</span>')!!}
            </div>

				</div>
        <div class="box-body col-md-4">

            <div class="form-group">
              <label for="email">Email</label>
              <input  type="email" class="form-control" name="email" value="{{old('user')}}">
              {!!$errors->first('email','<span class-error>:message</span>')!!}
            </div>

				</div>
        <div class="box-body col-md-4">
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" name="password" value="{{old('password')}}">
          {!!$errors->first('password','<span class-error>:message</span>')!!}

        </div>
      </div>
				<!-- /.box-body -->

				<div class="box-footer">
          <div class="col-md-12">
            <a href="{{route('usuarios.index')}}">
              <button type="button" name="atras" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left"></span> </button>
            </a>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> </button>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> </button>

          </div>
          </div>
			</form>
		</div>
		<!-- /.box -->


	</div>

</div>
</section>
@push ('scripts')
  <script>
  $('#liSeguridad').addClass("treeview active");
  $('#liUsers').addClass("active");
  </script>

@endpush
@endsection
