<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h2 class="text-bold">{{ $componentName }}</h2>
        </div>
    </div>
    <div class="row sales layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-content row col-12 justify-content-around">
                    @foreach ($capacitacionesPendientes as $capacitacion)
                    <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{$capacitacion->nombreDeCapacitacion}}</h5>
                                <p class="card-text">{{$capacitacion->descripcion}}</p>
                                <a wire:click.prevent="LoadModalData({{$capacitacion->capacitacion_id}})" href="javascript:void(0)" class="btn bg-success mb-3" data-toggle="modal"
                                data-target="#theModal"><i class="fas fa-eye"></i> Ver capacitación</a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('livewire.capacitacionesPendientes.modal')
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    window.livewire.on('show-modal', msg => {
        $('#theModal').modal('show')
    });
});
</script>
