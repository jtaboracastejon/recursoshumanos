<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

use App\Models\parametosEvaluar;
use App\Models\User;

class ParametrosEvaluacionController extends Component
{
    use WithPagination;

    public $search,$pagination,$selectedId, $pageTitle, $componentName, $show;

    public $searchUsuario, $dataUsuarios, $showTableUsuarios;
    public $nombreDeUsuario,$email, $usuario_id, $estado, $rol, $statusCapacitacion;

    public $niveldeIniciativa,$generaciondeIdeas,$resoluciondeProblemas,$cumplimientodeObjetivo,$calidaddeTrabajo;
    public $loggedUserId;
    public function mount()
    {
        $this->componentName = 'Parametros de Evaluación';
        $this->pageTitle = 'Listado';
        $this->pagination = 5;
        $this->show = 'ver';

        $this->niveldeIniciativa = "Elegir";
        $this->generaciondeIdeas = "Elegir";
        $this->resoluciondeProblemas = "Elegir";
        $this->cumplimientodeObjetivo = "Elegir";
        $this->calidaddeTrabajo = "Elegir";

        $this->loggedUserId = auth()->user()->id;
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
        $evaluaciones= parametosEvaluar::join('users as userEvaluado', 'parametos_evaluars.userEvaluado_id', '=', 'userEvaluado.id')
        ->join('users as userEvaluador', 'parametos_evaluars.userEvaluador_id', '=', 'userEvaluador.id')
        ->select('parametos_evaluars.id', 'parametos_evaluars.niveldeIniciativa', 'parametos_evaluars.generaciondeIdeas', 'parametos_evaluars.resoluciondeProblemas', 'parametos_evaluars.cumplimientodeObjetivo', 'parametos_evaluars.calidaddeTrabajo', 'userEvaluado.name as nombreDeUsuarioEvaluado', 'userEvaluador.name as nombreDeUsuarioEvaluador', 'parametos_evaluars.created_at')
        ->orderBy('parametos_evaluars.id', 'desc')
        ->get();


        return view('livewire.parametrosEvaluacion.barrel', compact('evaluaciones'))
        ->extends('adminlte::page')
        ->section('content');
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
        $this->niveldeIniciativa = "Elegir";
        $this->generaciondeIdeas = "Elegir";
        $this->resoluciondeProblemas = "Elegir";
        $this->cumplimientodeObjetivo = "Elegir";
        $this->calidaddeTrabajo = "Elegir";

        $this->nombreDeUsuario = '';
        $this->email = '';
        $this->estado = '';
        $this->rol = '';
        $this->usuario_id = '';
        $this->statusCapacitacion = '';
    }

    public function validateForm(){
        $rules=[
            'niveldeIniciativa'=>'required|not_in:Elegir',
            'generaciondeIdeas'=>'required|not_in:Elegir',
            'resoluciondeProblemas'=>'required|not_in:Elegir',
            'cumplimientodeObjetivo'=>'required|not_in:Elegir',
            'calidaddeTrabajo'=>'required|not_in:Elegir'

        ];
        $messages=[
            'niveldeIniciativa.required'=>'Nivel de iniciativa es requerido',
            'niveldeIniciativa.not_in'=>'Debe elegir una opción',
            'generaciondeIdeas.required'=>'Generación de ideas es requerido',
            'generaciondeIdeas.not_in'=>'Debe elegir una opción',
            'resoluciondeProblemas.required'=>'Resolución de problemas es requerido',
            'resoluciondeProblemas.not_in'=>'Debe elegir una opción',
            'cumplimientodeObjetivo.required'=>'Cumplimiento de trabajo es requerido',
            'cumplimientodeObjetivo.not_in'=>'Debe elegir una opción',
            'calidaddeTrabajo.required'=>'Calidad de trabajo es requerido',
            'calidaddeTrabajo.not_in'=>'Debe elegir una opción'
        ];

        $this->validate($rules,$messages);
    }

    public function Store(){
        $this->validateForm();
        parametosEvaluar::create([
            'niveldeIniciativa'=>$this->niveldeIniciativa,
            'generaciondeIdeas'=>$this->generaciondeIdeas,
            'resoluciondeProblemas'=>$this->resoluciondeProblemas,
            'cumplimientodeObjetivo'=>$this->cumplimientodeObjetivo,
            'calidaddeTrabajo'=>$this->calidaddeTrabajo,
            'userEvaluado_id'=>$this->usuario_id,
            'userEvaluador_id'=>$this->loggedUserId
        ]);
        $this->resetUI();
        $this->emit('item-added', 'Se ha asignado la capacitación');
        $this->pageTitle = 'Lista de Capacitaciones Asignadas';
        $this->show = 'ver';
    }
}
