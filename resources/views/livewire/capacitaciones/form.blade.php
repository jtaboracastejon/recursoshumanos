@include('common.modalHead')
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Nombre de la capacitación</label>
            <input type="text" wire:model.lazy="nombreDeCapacitacion" class="form-control" placeholder="ej: Campaña de formación financiera">
        </div>
        {{-- Descripcion y enlace a youtube --}}
        <div class="form-group">
            <label>Descripción de la capacitación</label>
            <input type="text" wire:model.lazy="descripcion" class="form-control" placeholder="ej: Campaña de formación financiera">
        </div>

        <div class="form-group">
        <label>Enlace a YouTube</label>
            <input type="text" wire:model.lazy="enlaceDeYoutube" class="form-control" placeholder="ej: Campaña de formación financiera">
        </div>
        @error('name') <span class="text-danger er">{{$message}}</span>@enderror
    </div>

</div>
@include('common.modalFooter')
