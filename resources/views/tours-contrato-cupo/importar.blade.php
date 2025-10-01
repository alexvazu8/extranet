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
                        <span class="card-title">Importar Contratos de Tours desde Excel</span>
                    </div>
                    <div class="card-body">
                        <!-- Botón para descargar plantilla -->
                        <div class="mb-4">
                            <a href="{{ route('tours.download-template') }}" class="btn btn-success">
                                <i class="fas fa-file-excel"></i> Descargar Plantilla Excel
                            </a>
                            <small class="text-muted ml-2">Descarga el formato requerido para importación</small>
                        </div>
                        <form id="import-form" action="{{ route('tours.import') }}" method="POST" enctype="multipart/form-data">
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
                        <!-- Tabla de Tours -->
                        <div class="mt-4">
                            <h5>Tours Disponibles</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre Tour</th>
                                        <th>Tour_id</th>
                                        <th>Ciudad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tours as $tour)
                                    <tr>
                                        
                                        <td>{{ $tour->Nombre_tour }}</td>
                                        <td>{{ $tour->id }}</td>
                                        <td>{{ $tour->ciudade->Nombre_Ciudad }}</td>
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