<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h2 class="text-bold">{{ $componentName }}</h2>
        </div>
    </div>
    <div class="row sales layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <a href="javascript:void(0)" class="btn bg-dark mb-3" data-toggle="modal" data-target="#theModal">Agregar</a>

                </div>

                @include('common.searchBox')
                <div class="widget-content">
                    <div class="table-responsive mb-4 mt-4">
                        <table class="table table-hover table-striped datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre de la capacitación</th>
                                    <th>Descripción</th>
                                    <th>Enlace de youtube</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($capacitaciones as $capacitacion)
                                    <tr>
                                        <td>{{ $capacitacion->nombreDeCapacitacion }}</td>
                                        <td>{{ $capacitacion->descripcion }}</td>
                                        <td><a href="{{ $capacitacion->enlaceDeYoutube }}" target="_blank">Ver video</a></td>
                                        <td>
                                            <a href="javascript:void(0)" wire:click="Edit({{ $capacitacion->id }})"
                                                class="btn text-warning btn-dark" title="Edit">
                                                <i class="fa fa-edit fa-xl"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                            {{-- ,'{{ $product->ingredients->count() }}','{{ $product->products->count() }}' --}}
                                            onclick="ConfirmDelete('{{ $capacitacion->id }}')"
                                                class="btn text-danger btn-dark" title="Delete">
                                                <i class="fa fa-trash fa-xl"></i>
                                            </a>


                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre de la capacitación</th>
                                    <th>Descripción</th>
                                    <th>Enlace de youtube</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $capacitaciones->links() }}
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.capacitaciones.form')
    </div>
</div>
@include('common.scripts')
<script>
    function ConfirmDelete(id) {
        return new swal({
            title: "Confirmar eliminación",
            text: "Estas seguro de eliminar el registro esta accion no puede deshacerse",
            type: "warning",

            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#d33',

            showConfirmButton: true,
            confirmButtonText: 'Eliminar',
            confirmButtonColor: '#3b3f5c',
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('brandDestroy', id);
                swal.close();
            }
        })
    }
</script>
