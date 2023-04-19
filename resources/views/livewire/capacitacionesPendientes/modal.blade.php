<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="theModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <b>{{ $componentName }}</b> | {{ $selectedId > 0 ? 'Editar' : 'Crear' }}
                </h5>
                <h6 class="text-center text-warning" wire:loading>
                    Por favor espere un momento...
                </h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre de la capacitación</label>
                            <input type="text" wire:model.lazy="capacitacionSelect_title" class="form-control"
                                placeholder="ej: Campaña de formación financiera" readonly>
                        </div>
                        {{-- Descripcion y enlace a youtube --}}
                        <div class="form-group">
                            <label>Descripción de la capacitación</label>
                            <input type="text" wire:model.lazy="capacitacionSelect_desc" class="form-control"
                                placeholder="ej: Campaña de formación financiera" readonly>
                        </div>

                        <div class="col-12">
                            <strong>Video de capacitación</strong>
                            <br>
                            <iframe width="560" height="315" src="{{ $capacitacionSelect_video }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark close-btn text-info" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="Finalizado()" class="btn btn-dark close-modal">Finalizado</button>
            </div>
        </div>
    </div>
</div>
