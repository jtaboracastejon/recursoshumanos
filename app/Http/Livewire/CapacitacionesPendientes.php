<?php

namespace App\Http\Livewire;

use App\Models\asignarCapacitaciones;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

use App\Models\capacitaciones;
use App\Models\User;

class CapacitacionesPendientes extends Component
{
    use WithPagination;

    public $search,$pagination,$selectedId, $show, $pageTitle;

    public $capacitacionSelect_title, $capacitacionSelect_desc, $capacitacionSelect_video;
    public $capacitacionPendiente_id;
    public function mount()
    {
        $this->componentName = 'Asignar Capacitaciones';
        $this->pagination = 5;
        $this->show = 'ver';
        $this->pageTitle = 'Lista de Capacitaciones Asignadas';
        $this->capacitacionDesplegada_id = 0;
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
        $userId = auth()->user()->id;

        $capacitacionesPendientes = asignarCapacitaciones::join('capacitaciones', 'asignar_capacitaciones.capacitacion_id', '=', 'capacitaciones.id')
        ->join('users as userACapacitar', 'asignar_capacitaciones.userACapacitar_id', '=', 'userACapacitar.id')
        ->where('asignar_capacitaciones.userACapacitar_id', '=', $userId)
        ->where('asignar_capacitaciones.estado', '=', 'ASIGNADA')
        ->get();
        return view('livewire.capacitacionesPendientes.index', compact('capacitacionesPendientes'))
        ->extends('adminlte::page')
        ->section('content');
    }

    public function LoadModalData(capacitaciones $capacitacion){
        $this->capacitacionPendiente_id = $capacitacion->id;
        $this->capacitacionSelect_title = $capacitacion->nombreDeCapacitacion;
        $this->capacitacionSelect_desc = $capacitacion->descripcion;
        $this->capacitacionSelect_video = $capacitacion->enlaceDeYoutube;

    }

    public function Finalizado(){
    }
}
