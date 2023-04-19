<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

use App\Models\capacitaciones;
class CapacitacionesController extends Component
{
    use WithPagination;

    public $search,$pagination,$selectedId;
    public $nombreDeCapacitacion,$descripcion,$enlaceDeYoutube;
    public function mount()
    {
        $this->componentName = 'Capacitaciones';
        $this->pagination = 5;
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
        if(strlen($this->search)>0){
            $capacitaciones = capacitaciones::where('nombreDeCapacitacion', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        }else
        {
            $capacitaciones = capacitaciones::orderBy('nombreDeCapacitacion','desc')->paginate($this->pagination);
        }
        return view('livewire.capacitaciones.index', compact('capacitaciones'))
        ->extends('adminlte::page')
        ->section('content');
    }

    public function resetUI(){
        $this->nombreDeCapacitacion = '';
        $this->descripcion = '';
        $this->enlaceDeYoutube = '';
    }

    public function validateForm(){
        $rules=[
            'nombreDeCapacitacion'=>'required|min:3|max:100',
            'descripcion'=>'required|min:3|max:100',
            'enlaceDeYoutube'=>'required|min:3|max:100',
        ];
        $messages=[
            'nombreDeCapacitacion.required'=>'El nombre de la capacitación es requerido',
            'nombreDeCapacitacion.min'=>'El nombre de la capacitación debe tener al menos 3 caracteres',
            'nombreDeCapacitacion.max'=>'El nombre de la capacitación debe tener como maximo 100 caracteres',
            'descripcion.required'=>'La descripción es requerida',
            'descripcion.min'=>'La descripcion debe tener al menos 3 caracteres',
            'descripcion.max'=>'La descripcion debe tener como máximo 100 caracteres',
            'enlaceDeYoutube.required'=>'El enlace de youtube es requerido',
            'enlaceDeYoutube.min'=>'El enlace de youtube debe tener al menos 3 caracteres',
            'enlaceDeYoutube.max'=>'El enlace de youtube debe tener como máximo 100 caracteres',
        ];

        $this->validate($rules,$messages);
    }

    public function Store(){
        $this->validateForm();
        capacitaciones::create([
            'nombreDeCapacitacion'=>$this->nombreDeCapacitacion,
            'descripcion'=>$this->descripcion,
            'enlaceDeYoutube'=>$this->enlaceDeYoutube,
        ]);
        $this->resetUI();
        $this->emit('item-added', 'Se ha agregado una nueva capacitación');
    }

    public function Edit(capacitaciones $capacitacion){
        $this->nombreDeCapacitacion = $capacitacion->nombreDeCapacitacion;
        $this->descripcion = $capacitacion->descripcion;
        $this->enlaceDeYoutube = $capacitacion->enlaceDeYoutube;
        $this->selectedId = $capacitacion->id;

        $this->emit('show-modal', 'showing modal');
    }

    public function Update(){
        $this->validateForm();
        $brand = capacitaciones::find($this->selectedId);
        $brand->Update([
            'nombreDeCapacitacion'=>$this->nombreDeCapacitacion,
            'descripcion'=>$this->descripcion,
            'enlaceDeYoutube'=>$this->enlaceDeYoutube,
        ]);
        $this->resetUI();
        $this->emit('item-updated', 'Se ha actualizado la capacitacion');
    }

    protected $listeners = [
        'brandDestroy' => 'Destroy',
        'resetUI' => 'resetUI',
    ];

    public function Destroy(capacitaciones $capacitacion){
        $capacitacion->delete();
        $this->resetUI();
        $this->emit('item-deleted', 'Se ha eliminado la capacitacion');
    }
}
