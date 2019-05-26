@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Editar usuario</div>

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
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" readonly value="{{ old('email', $user->email) }}">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña <em>Ingresar solo si se desea modificar</em></label>
                <input type="text" name="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar usuario</button>
                <a href="/usuarios" class="btn btn-primary">Volver atrás</a>

            </div>
        </form>

        <form action="/proyecto-usuario" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="project_id" class="form-control" id="select-project">
                        <option value="">Seleccione proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="level_id" class="form-control" id="select-level">
                        <option value="">Seleccione nivel</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block align">Asignar proyecto</button>
                </div>
            </div>
        </form>

        <p>Proyectos asignados</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects_user as $project_user)
                <tr>
                    <td>{{ $project_user->project->name }}</td>
                    <td>{{ $project_user->level->name }}</td>
                    <td>
                        <a href="/proyecto-usuario/{{ $project_user->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
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
@endsection

@section('scripts')
    <script src="/js/admin/users/edit.js"></script>
@endsection