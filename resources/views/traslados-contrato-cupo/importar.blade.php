@extends('layouts.app')

@section('template_title')
    Importar Traslados
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Importar Traslados desde Excel</span>
                    </div>
                    <div class="card-body">
                        <!-- Botón para descargar plantilla -->
                        <div class="mb-4">
                            <a href="{{ route('traslados.download-template') }}" class="btn btn-success">
                                <i class="fas fa-file-excel"></i> Descargar Plantilla Excel
                            </a>
                            <small class="text-muted ml-2">Descarga el formato requerido para importación</small>
                        </div>
                        <form id="import-form" action="{{ route('traslados.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="archivo">Archivo Excel (.xlsx, .xls)</label>
                                <input type="file" class="form-control-file" name="archivo" id="archivo" accept=".xlsx,.xls" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span id="submit-text">Importar</span>
                                <div id="loading-spinner" class="spinner-border spinner-border-sm d-none" role="status">
                                    <span class="sr-only">Cargando...</span>
                                </div>
                            </button>
                        </form>

                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Tabla de Tipos de Movilidad -->
                        <div class="mt-4">
                            <h5>Tipos de Vehículos Disponibles</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Empresa_traslado_tipo_movilidades_id</th>
                                        <th>Empresa</th>
                                        <th>Tipo de Vehiculo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empresaTiposMovilidad as $tipo)
                                    <tr>
                                        
                                        <td>{{ $tipo->id }}</td>
                                        <td>{{ $tipo->empresaTraslado->Nombre_empresa_traslado }}</td>
                                        <td>{{ $tipo->tipoMovilidade->Nombre_tipo_movilidad }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Tabla de Servicios de Traslado -->
                        <div class="mt-4">
                            <h5>Servicios de Traslado Disponibles</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Servicio_traslado_Id</th>
                                        <th>Nombre del Servicio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($servicioTraslado as $servicio)
                                    <tr>
                                        <td>{{ $servicio->id }}</td>
                                        <td>{{ $servicio->Nombre_Servicio }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#import-form').submit(function() {
        // Mostrar spinner y cambiar texto del botón
        $('#loading-spinner').removeClass('d-none');
        $('#submit-text').text('Importando...');
        $(this).find('button[type="submit"]').prop('disabled', true);
    });
});
</script>
@endsection