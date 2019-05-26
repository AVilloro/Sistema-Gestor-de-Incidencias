@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Proyectos</div>

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
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="start">Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', date('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar proyecto</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de inicio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start ?: 'No se ha indicado' }}</td>
                    <td>
                        @if ($project->trashed())
                        <a href="/proyecto/{{ $project->id }}/restaurar" class="btn btn-sm btn-success" title="Restaurar">
                            <span class="glyphicon glyphicon-repeat"></span>
                        </a>
                        @else
                        <a href="/proyecto/{{ $project->id }}" class="btn btn-sm btn-primary" title="Editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="/proyecto/{{ $project->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 388.245 388.245" style="enable-background:new 0 0 388.245 388.245;" xml:space="preserve" width="12px" height="12px" class=""><g><g>
<path d="M107.415,388.245h173.334c21.207,0,38.342-17.159,38.342-38.342V80.928H69.097v268.975   C69.097,371.086,86.264,388.245,107.415,388.245z M253.998,129.643c0-7.178,5.796-13.03,13.006-13.03   c7.178,0,13.006,5.853,13.006,13.03v208.311c0,7.21-5.828,13.038-13.006,13.038c-7.21,0-13.006-5.828-13.006-13.038V129.643z    M181.491,129.643c0-7.178,5.804-13.03,13.006-13.03c7.178,0,13.006,5.853,13.006,13.03v208.311c0,7.21-5.828,13.038-13.006,13.038   c-7.202,0-13.006-5.828-13.006-13.038C181.491,337.954,181.491,129.643,181.491,129.643z M109.025,129.643   c0-7.178,5.796-13.03,12.973-13.03s13.038,5.853,13.038,13.03v208.311c0,7.21-5.861,13.038-13.038,13.038   c-7.178,0-12.973-5.828-12.973-13.038V129.643z" data-original="#010002" class="active-path" data-old_color="#F6F6F6" fill="#FFFCFC"></path>
<path d="M294.437,20.451h-52.779C240.39,8.966,230.75,0,218.955,0h-49.682   c-11.86,0-21.476,8.966-22.736,20.451H93.792c-25.865,0-46.756,20.955-46.902,46.756h294.466   C341.258,41.407,320.335,20.451,294.437,20.451z" data-original="#010002" class="active-path" data-old_color="#F6F6F6" fill="#FFFCFC"></path>
</g></g> </svg>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
