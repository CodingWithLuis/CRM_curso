@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Cliente</h1>
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

                        <form method="POST" action="{{route('admin.clients.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="contact_name" class="required">Nombre del cliente </label>
                                <input type="text" name="contact_name" id="contact_name" class="form-control {{$errors->has('contact_name') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del cliente" value="{{old('contact_name', '')}}">
                                @if ($errors->has('contact_name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contact_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="contact_email" class="required">Email del cliente </label>
                                <input type="email" name="contact_email" id="contact_email" class="form-control {{$errors->has('contact_email') ? 'is-invalid' : ''}}" placeholder="Ingrese el email del cliente" value="{{old('contact_email', '')}}">
                                @if ($errors->has('contact_email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contact_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="contact_phone_number" class="required">Teléfono del cliente</label>
                                <input type="text" name="contact_phone_number" id="contact_phone_number" class="form-control {{$errors->has('contact_phone_number') ? 'is-invalid' : ''}}" placeholder="Ingrese el teléfono del cliente" value="{{old('contact_phone_number', '')}}">
                                @if ($errors->has('contact_phone_number'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contact_phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="company_name" class="required">Nombre de la empresa</label>
                                <input type="text" name="company_name" id="company_name" class="form-control {{$errors->has('company_name') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre de la empresa" value="{{old('company_name', '')}}">
                                @if ($errors->has('company_name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="company_address" class="required">Dirección de la empresa</label>
                                <input type="text" name="company_address" id="company_address" class="form-control {{$errors->has('company_address') ? 'is-invalid' : ''}}" placeholder="Ingrese la dirección de la empresa" value="{{old('company_address', '')}}">
                                @if ($errors->has('company_address'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('company_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="company_phone_number" class="required">Teléfono de la empresa</label>
                                <input type="text" name="company_phone_number" id="company_phone_number" class="form-control {{$errors->has('company_phone_number') ? 'is-invalid' : ''}}" placeholder="Ingrese el teléfono de la empresa" value="{{old('company_phone_number', '')}}">
                                @if ($errors->has('company_phone_number'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('company_phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.clients.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
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
