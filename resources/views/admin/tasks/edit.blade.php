@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Tarea</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.tasks.update', $task->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" class="required">Tarea</label>
                                <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre de la tarea" value="{{old('name', $task->name)}}">
                                @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description" class="required">Descripción</label>
                                <textarea name="description" class="form-control">{{old('description', $task->description)}}</textarea>
                                @if ($errors->has('description'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="deadline" class="required">Fecha Límite</label>
                                <input name="deadline" type="text" class="form-control date" value="{{old('deadline', $task->deadline)}}">
                            </div>
                            <div class="form-group">
                                <label for="user_id" class="required">Usuario</label>
                                <select class="form-control select2" name="user_id" style="width: 100%;">
                                    <option value="">Seleccione un usuario</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{(old('user_id') ? old('user_id') : $task->user->id ?? '' ) == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="client_id" class="required">Cliente</label>
                                <select class="form-control select2" name="client_id" style="width: 100%;">
                                    <option value="">Seleccione un cliente</option>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{(old('client_id') ? old('client_id') : $task->client->id ?? '' ) == $client->id ? 'selected' : ''}}>{{ $client->contact_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('client_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('client_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="project_id" class="required">Proyecto</label>
                                <select class="form-control select2" name="project_id" style="width: 100%;">
                                    <option value="">Seleccione un proyecto</option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" {{(old('project_id') ? old('project_id') : $task->project->id ?? '' ) == $project->id ? 'selected' : ''}}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('project_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('project_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="task_status">Status del proyecto</label>
                                <select class="form-control {{ $errors->has('task_status') ? 'is-invalid' : '' }}" name="task_status" id="task_status" required>
                                    <option value="">Seleccione un status</option>
                                    @foreach(App\Models\Task::STATUS as $status)
                                    <option value="{{ $status }}" {{ (old('status') ? old('status') : $task->task_status ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('status'))
                                <div class="text-danger">
                                    {{ $errors->first('status') }}
                                </div>
                                @endif
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.tasks.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Editar
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
