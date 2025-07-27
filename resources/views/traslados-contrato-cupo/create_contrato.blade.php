@extends('layouts.app')

@section('template_title')
    Create Traslados Contrato Cupo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Traslados Contrato Cupo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="form" action="{{ route('traslados-contrato-cupos.store_contrato') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('traslados-contrato-cupo.form_contrato')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

$('#form').submit(function(){
   let imagen= document.getElementById("imagen-carga");
    imagen.style.display="block";
    $('#imagen-carga').show();
});
</script>
@endsection

