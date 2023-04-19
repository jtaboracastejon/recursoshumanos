<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h2 class="text-bold">{{ $componentName }} | {{$pageTitle}}</h2>
        </div>
    </div>
    <div class="row sales layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <span wire:click="$set('pageTitle', 'Lista de Porciones')">
                <button wire:click="$set('show', 'ver', 'Lista de Capacitaciones Asignadas')" class="btn btn-primary mb-2 mr-2"><i class="fas fa-eye"></i> Ver</button>
            </span>
            @if ($show=='editar')
            <span wire:click="$set('pageTitle', 'Editar Registro')">
                <button wire:click="$set('show', 'editar')" class="btn btn-warning mb-2 mr-2"><i class="fa-solid fa-file-plus"></i> Editar</button>
            </span>
            @else
            <span wire:click="$set('pageTitle', 'Crear nuevo registro')">
                <button wire:click="$set('show', 'agregar')" class="btn btn-success mb-2 mr-2"><i class="fas fa-plus-circle"></i> Agregar</button>
            </span>
            @endif
        </div>
        @if ($show == 'agregar')
            @include('livewire.asignarCapacitaciones.partials.create');
        @elseif ($show == 'ver')
            @include('livewire.asignarCapacitaciones.partials.index')
        @elseif ($show == 'editar')
            @include('livewire.asignarCapacitaciones.partials.create');
        @endif
    </div>
</div>

