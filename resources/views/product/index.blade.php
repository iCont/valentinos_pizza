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
        <div class="col-12 py-4 text-center"><h1>PRODUCTOS</h1></div>
        <table id="myTable" class="dataTable table-striped">
            <thead>
                <tr>
                    <th>Productos</th>
                    <th>Estado</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        {{$product->name}}
                    </td>
                    <td>
                        @if ($product->status===1)
                            Activo
                        @else
                            Desactivado
                        @endif
                    </td>
                    <td class="text-center button_wrapper">
                        <i class="bi bi-pencil-square" id="icon_square" data-bs-toggle="modal" data-bs-target="#update_modal{{$product->id}}"></i>
                        <form class="form_delete" action="{{ route('product.destroy', $product->id) }}"
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
                <h2 class="modal-title fs-5" id="register_modalLabel">Producto</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_product" action="{{route('product_register.store')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="name" class="form-label">Nombre producto:</label>
                                <input type="text" class="form-control input_style" name="name" id="name_id" placeholder="Pizza Hawaina">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="price" class="form-label">Costo:</label>
                                <input type="text" class="form-control input_style" name="price" id="price_id" placeholder="120.00">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="product_type" class="form-label">Tipo de producto:</label>
                                <select name="product_type" id="" class="form-control input_style">
                                    @foreach ($product_types as $product_type)
                                    <option value="{{$product_type->id}}" {{old('product_type')==$product_type->id ? "selected" : ""}}>{{ $product_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="product_type" class="form-label">Imágen de producto:</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @error('image')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
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
@foreach ($products as $product)
{{-- @dd($product) --}}
<div class="modal fade" id="update_modal{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="update_modalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fs-5" id="update_modalLabel">Actualizar Producto</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-12 text-center mb-3">
                <img src="{{asset($product->url)}}" alt="Foto de producto" class="img_producto  img-thumbnail">
            </div>
            <form id="form_product_update"  action="{{ route('product_edit.update', $product) }}"   method="POST">
                @method('PUT')
                @csrf
                <div class="container">
                    {{-- actulizar productos --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="name" class="form-label">Nombre producto:</label>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="text" class="form-control input_style" name="name" id="name_id" placeholder="Pizza Hawaina">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="price" class="form-label">Costo:</label>
                                <input type="text" class="form-control input_style" name="price" id="price_id" placeholder="120.00">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="product_type" class="form-label">Tipo de producto:</label>
                                <select name="product_type" id="" class="form-control input_style">
                                    @foreach ($product_types as $product_type)
                                    <option value="{{$product_type->id}}" {{old('product_type')==$product_type->id ? "selected" : ""}}>{{ $product_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="product_type" class="form-label">Imágen de producto:</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @error('image')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- actulizar productos --}}
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
