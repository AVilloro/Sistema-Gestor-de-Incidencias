@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Editar proyecto</div>

    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $project->description) }}">
            </div>
            <div class="form-group">
                <label for="start">Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', $project->start) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar proyecto</button>
                <a href="/proyectos" class="btn btn-primary">Volver atrás</a>
            </div>
        </form>

        <div class="row">
            <div class="col-md-6">
                <p>Categorías</p>
                <form action="/categorias" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                    </div>
                    <button class="btn btn-primary add">Añadir</button>
                </form>
                <table class="table table-bordered space">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" data-category="{{ $category->id }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <a href="/categoria/{{ $category->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 388.245 388.245" style="enable-background:new 0 0 388.245 388.245;" xml:space="preserve" width="12px" height="12px" class=""><g><g>
  	<path d="M107.415,388.245h173.334c21.207,0,38.342-17.159,38.342-38.342V80.928H69.097v268.975   C69.097,371.086,86.264,388.245,107.415,388.245z M253.998,129.643c0-7.178,5.796-13.03,13.006-13.03   c7.178,0,13.006,5.853,13.006,13.03v208.311c0,7.21-5.828,13.038-13.006,13.038c-7.21,0-13.006-5.828-13.006-13.038V129.643z    M181.491,129.643c0-7.178,5.804-13.03,13.006-13.03c7.178,0,13.006,5.853,13.006,13.03v208.311c0,7.21-5.828,13.038-13.006,13.038   c-7.202,0-13.006-5.828-13.006-13.038C181.491,337.954,181.491,129.643,181.491,129.643z M109.025,129.643   c0-7.178,5.796-13.03,12.973-13.03s13.038,5.853,13.038,13.03v208.311c0,7.21-5.861,13.038-13.038,13.038   c-7.178,0-12.973-5.828-12.973-13.038V129.643z" data-original="#010002" class="active-path" data-old_color="#F6F6F6" fill="#FFFCFC"></path>
  	<path d="M294.437,20.451h-52.779C240.39,8.966,230.75,0,218.955,0h-49.682   c-11.86,0-21.476,8.966-22.736,20.451H93.792c-25.865,0-46.756,20.955-46.902,46.756h294.466   C341.258,41.407,320.335,20.451,294.437,20.451z" data-original="#010002" class="active-path" data-old_color="#F6F6F6" fill="#FFFCFC"></path>
  </g></g> </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <p>Niveles</p>
                <form action="/niveles" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                    </div>
                    <button class="btn btn-primary add">Añadir</button>
                </form>
                <table class="table table-bordered space">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nivel</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $key => $level)
                        <tr>
                            <td>N{{ $key+1 }}</td>
                            <td>{{ $level->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" data-level="{{ $level->id }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <a href="/nivel/{{ $level->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 388.245 388.245" style="enable-background:new 0 0 388.245 388.245;" xml:space="preserve" width="12px" height="12px" class=""><g><g>
<path d="M107.415,388.245h173.334c21.207,0,38.342-17.159,38.342-38.342V80.928H69.097v268.975   C69.097,371.086,86.264,388.245,107.415,388.245z M253.998,129.643c0-7.178,5.796-13.03,13.006-13.03   c7.178,0,13.006,5.853,13.006,13.03v208.311c0,7.21-5.828,13.038-13.006,13.038c-7.21,0-13.006-5.828-13.006-13.038V129.643z    M181.491,129.643c0-7.178,5.804-13.03,13.006-13.03c7.178,0,13.006,5.853,13.006,13.03v208.311c0,7.21-5.828,13.038-13.006,13.038   c-7.202,0-13.006-5.828-13.006-13.038C181.491,337.954,181.491,129.643,181.491,129.643z M109.025,129.643   c0-7.178,5.796-13.03,12.973-13.03s13.038,5.853,13.038,13.03v208.311c0,7.21-5.861,13.038-13.038,13.038   c-7.178,0-12.973-5.828-12.973-13.038V129.643z" data-original="#010002" class="active-path" data-old_color="#F6F6F6" fill="#FFFCFC"></path>
<path d="M294.437,20.451h-52.779C240.39,8.966,230.75,0,218.955,0h-49.682   c-11.86,0-21.476,8.966-22.736,20.451H93.792c-25.865,0-46.756,20.955-46.902,46.756h294.466   C341.258,41.407,320.335,20.451,294.437,20.451z" data-original="#010002" class="active-path" data-old_color="#F6F6F6" fill="#FFFCFC"></path>
</g></g> </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="margin-left: -620px;">&times;</span></button>
        <h4 class="modal-title">Editar categoría</h4>
      </div>
      <form action="/categoria/editar" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="category_id" id="category_id" value="">
            <div class="form-group">
                <label for="name">Nombre de la categoría</label>
                <input type="text" class="form-control" name="name" id="category_name" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="margin-left: -700px;">&times;</span></button>
        <h4 class="modal-title">Editar nivel</h4>
      </div>
      <form action="/nivel/editar" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="level_id" id="level_id" value="">
            <div class="form-group">
                <label for="name">Nombre del nivel</label>
                <input type="text" class="form-control" name="name" id="level_name" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
    <script src="/js/admin/projects/edit.js"></script>
@endsection
