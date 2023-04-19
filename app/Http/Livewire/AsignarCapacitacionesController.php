<?php

namespace App\Http\Livewire;

use App\Models\asignarCapacitaciones;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

use App\Models\capacitaciones;
use App\Models\User;

class asignarCapacitacionesController extends Component
{
    use WithPagination;

    public $search,$pagination,$selectedId, $show, $pageTitle;

    public $searchCapacitacion, $dataCapacitacion, $showTableCapacitacion;
    public $nombreDeCapacitacion,$descripcion,$enlaceDeYoutube, $capacitacion_id;

    public $searchUsuario, $dataUsuarios, $showTableUsuarios;
    public $nombreDeUsuario,$email, $usuario_id, $estado, $rol, $statusCapacitacion;
    public function mount()
    {
        $this->componentName = 'Asignar Capacitaciones';
        $this->pagination = 5;
        $this->show = 'ver';
        $this->pageTitle = 'Lista de Capacitaciones Asignadas';
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {

        $capacitacionesAsignadas = asignarCapacitaciones::orderBy('capacitacion_id','desc')->paginate($this->pagination);

        return view('livewire.asignarCapacitaciones.barrel', compact('capacitacionesAsignadas'))
        ->extends('adminlte::page')
        ->section('content');
    }

    public function searchCapacitacion(){
        $this->showTableCapacitacion = true;
        $this->dataCapacitacion = capacitaciones::where('nombreDeCapacitacion', 'like', '%'.$this->searchCapacitacion.'%')->take(3)->get();
    }

    public function selectedCapacitacion($id){
        $this->showTableCapacitacion = false;
        $capacitacion = capacitaciones::find($id);
        $this->nombreDeCapacitacion = $capacitacion->nombreDeCapacitacion;
        $this->descripcion = $capacitacion->descripcion;
        $this->enlaceDeYoutube = $capacitacion->enlaceDeYoutube;
        $this->capacitacion_id = $capacitacion->id;
    }

    public function searchUsuario(){
        $this->showTableUsuarios = true;
        $this->dataUsuarios = User::where('name', 'like', '%'.$this->searchUsuario.'%')->take(3)->get();
    }

    public function selectedUsuario($id){
        $this->showTableUsuarios = false;
        $usuario = User::find($id);
        $this->nombreDeUsuario = $usuario->name;
        $this->email = $usuario->email;
        $this->estado = $usuario->status;
        $this->rol = $usuario->rol;
        $this->usuario_id = $usuario->id;
    }

    public function resetUI(){
        $this->nombreDeCapacitacion = '';
        $this->descripcion = '';
        $this->enlaceDeYoutube = '';

        $this->nombreDeUsuario = '';
        $this->email = '';
        $this->estado = '';
        $this->rol = '';
        $this->usuario_id = '';
        $this->capacitacion_id = '';
        $this->statusCapacitacion = '';
        $this->selectedId = 0;
        $this->search = '';
        $this->searchCapacitacion = '';
        $this->searchUsuario = '';
        $this->showTableCapacitacion = false;
        $this->showTableUsuarios = false;
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
        asignarCapacitaciones::create([
            'capacitacion_id'=>$this->capacitacion_id,
            'userACapacitar_id'=>$this->usuario_id,
            'userCapacitador_id'=>auth()->user()->id,
            'estado'=>$this->statusCapacitacion,
        ]);
        $this->resetUI();
        $this->show='ver';
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
