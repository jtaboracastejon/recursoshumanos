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
                    <a href="javascript:void(0)" class="btn bg-dark mb-3" data-toggle="modal" data-target="#theModal"><i class="fas fa-plus-circle"></i> Agregar</a>

                </div>

                @include('common.searchBox')
                <div class="widget-content">
                    {{-- Aqui va la tabla --}}
                    <div class="table-responsive mb-4 mt-4">
                        <table class="table table-hover table-striped datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Contraseña</th>
                                    <th>Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->phone}}</td>
                                        <td>{{ $user->status}}</td>
                                        <td>{{ $user->password}}</td>
                                        <td>{{ $user->rol}}</td>
                                        <td>
                                            <a href="javascript:void(0)" wire:click="Edit({{ $user->id }})"
                                                class="btn text-warning btn-dark" title="Edit">
                                                <i class="fa fa-edit fa-xl"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                            {{-- ,'{{ $product->ingredients->count() }}','{{ $product->products->count() }}' --}}
                                            onclick="ConfirmDelete('{{ $user->id }}')"
                                                class="btn text-danger btn-dark" title="Delete">
                                                <i class="fa fa-trash fa-xl"></i>
                                            </a>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Contraseña</th>
                                    <th>Rol</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $users->links() }}
                    </div>
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
