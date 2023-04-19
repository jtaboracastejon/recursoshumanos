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
                    {{-- Aqui va la tabla --}}
                </div>
            </div>
        </div>
        @include('livewire.users.form')
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
