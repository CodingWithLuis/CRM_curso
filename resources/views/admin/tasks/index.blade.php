@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Tareas</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary mb-3">Nuevo Tarea</a>

                        <table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>
                                    <th>Tarea</th>
                                    <th>Descripcion</th>
                                    <th>Fecha Limite</th>
                                    <th>Status</th>
                                    <th>Proyecto</th>
                                    <th>Usuario</th>
                                    <th>Cliente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td>{{$task->name}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->deadline}}</td>
                                    <td>{{$task->task_status}}</td>
                                    <td>{{$task->project->name}}</td>
                                    <td>{{$task->user->name}}</td>
                                    <td>{{$task->client->contact_name}}</td>
                                    <td>
                                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-success">
                                            Editar
                                        </a>

                                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#tasks_table').DataTable();
    });
</script>
@endsection
