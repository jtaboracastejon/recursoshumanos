<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="theModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <b>{{$componentName}}</b> | {{$selectedId>0?'Editar':'Crear'}}
                </h5>
                <h6 class="text-center text-warning" wire:loading>
                    Por favor espere un momento...
                </h6>
            </div>
            <div class="modal-body">
