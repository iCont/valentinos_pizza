@extends('layouts.templateInt')
@section('content')
<section id="first_section" class="">
    <div class="container text-end">
        <button class="btn_normal mt-3" data-bs-toggle="modal" data-bs-target="#register_modal">Agregar</button>
    </div>
    <div class="alert-success">
        <div class="alert alert_warning alert-warning text-center" id="alert_success_wrappers" role="alert">
            Operación realizada con éxito!!!
          </div>
    </div>
</section>
<section>
    <div class="container contenedor mt-5">
        <div class="col-12 py-4 text-center"><h1>TIPO DE PRODUCTOS</h1></div>
        <table id="myTable" class="dataTable table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Estado</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_types as $product_type)
                <tr>
                    <td>
                        {{$product_type->name}}
                    </td>
                    <td>
                        @if ($product_type->status===1)
                            Activo
                        @else
                            Desactivado
                        @endif
                    </td>
                    <td class="text-center button_wrapper">
                        <i class="bi bi-pencil-square" id="icon_square" data-bs-toggle="modal" data-bs-target="#update_modal{{$product_type->id}}"></i>
                        <form class="form_delete" action="{{ route('product_type.destroy', $product_type->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="button_delete" type="submit">
                                <i class="bi bi-trash3" id="icon_trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="register_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="register_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="register_modalLabel">Tipo de productos</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_product_type" action="{{route('product_type_register.store')}}"  method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control input_style" name="tipo_producto" id="tipo_producto_id" placeholder="Snacks">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_normal_secondary_small" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn_small">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal --}}
<!-- Modal -->
@foreach ($product_types as $product_type)
<div class="modal fade" id="update_modal{{$product_type->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="update_modalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fs-5" id="update_modalLabel">Actualizar tipo de productos</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="form_product_type_update"  action="{{ route('product_type_edit.update', $product_type) }}"   method="POST">
                @method('PUT')
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="product_type_id" value="{{$product_type->id}}">
                            <input type="text" class="form-control input_style" name="tipo_producto" id="tipo_producto_id" placeholder="Snacks" value="{{old('tipo_producto',$product_type->name)}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_normal_secondary_small" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn_small">Actualizar</button>
            </div>
        </form>
    </div>
</div>
</div>

@endforeach
{{-- modal --}}
{{-- alerts visualizacion --}}
@if (Session::has('success'))
<script>
     alert_success_wrappers.style.visibility = "visible";
    setTimeout(function() {
         alert_success_wrappers.style.visibility = "hidden";
    }, 5000);
</script>
@else
 @endif
{{-- alerts visualizacion --}}
@endsection
