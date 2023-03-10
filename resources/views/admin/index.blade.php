@extends('layouts.templateInt')
@section('content')
<section id="first_section" class="">
    <div class="container text-end">
        <h1>Ventana de administración</h1>
    </div>
</section>
<section>
    <div class="container mt-5">
        <div class="card-top-container">
            <div class="card-top">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Ventas</h5>
                    <hr class="hr_style">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <span class="numbers">7</span>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-top">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">En proceso</h5>
                    <hr class="hr_style">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <span class="numbers">7</span>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-top">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">En entrega</h5>
                    <hr class="hr_style">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <span class="numbers">7</span>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
