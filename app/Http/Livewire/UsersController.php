<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Component
{
    use WithPagination;

    public $search,$pagination,$selectedId;
    public $name, $email, $phone, $status, $password, $rol;
    public function mount()
    {
        $this->componentName = 'Usuarios';
        $this->pagination = 5;
        $this->status = 'Elegir';
        $this->rol = 'Elegir';
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
        if(strlen($this->search)>0){
            $users = User::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        }else
        {
            $users = User::orderBy('name','desc')->paginate($this->pagination);
        }
        return view('livewire.users.index', compact('users'))
        ->extends('adminlte::page')
        ->section('content');
    }

    public function resetUI(){
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->status = '';
        $this->password = '';
        $this->rol = '';
    }

    public function validateForm(){
        $rules=[
            'name'=>'required|min:3|max:100',
            'email'=>'required|min:3|max:100|email',
            'phone'=>'required|regex:/^[0-9]{8}$/|numeric',
            'status'=>'required|min:3|max:100|not_in:Elegir',
            'password'=>'required|min:3|max:100',
            'rol'=>'required|min:3|max:100|not_in:Elegir',
        ];
        $messages=[
            'name.required'=>'El nombre es requerido',
            'name.min'=>'El nombre debe tener al menos 3 caracteres',
            'name.max'=>'El nombre debe tener como máximo 100 caracteres',
            'email.required'=>'El correo es requerido',
            'email.min'=>'El correo debe de tener al menos 3 caracteres',
            'email.max'=>'El correo debe de tener como máximo 10 caracteres',
            'email.email'=>'Debe de ingresar una dirección de correo valido',
            'phone.required'=>'El número de teléfono es requerido',
            'phone.regex'=>'Debe de ingresar un número de teléfono valido',
            'phone.numeric'=>'Solo se permiten números',
            'status.required'=>'El estado es requerido',
            'status.min'=>'El estado debe de tener al menos 3 caracteres',
            'status.max'=>'El estado debe de tener como máximo 100 caracteres',
            'password.required'=>'La contraseña es requerida',
            'password.min'=>'La contraseña debe de tener al menos 3 caracteres',
            'password.max'=>'La contraseña debe de tener como máximo 100 caracteres',
            'rol.required'=>'El rol es requerido',
        ];

        $this->validate($rules,$messages);
    }

    public function Store(){
        $this->validateForm();
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'status'=>$this->status,
            'password'=>Hash::make($this->password),
            'rol'=>$this->rol
        ]);
        $this->resetUI();
        $this->emit('item-added', 'Se ha agregado una nueva marca');
    }

    public function Edit(User $users){
        $this->name = $users->name;
        $this->email = $users->email;
        $this->phone = $users->phone;
        $this->status = $users->status;
        $this->rol = $users->rol;
        $this->selectedId = $users->id;

        $this->emit('show-modal', 'showing modal');
    }

    public function Update(){
        $this->validateForm();
        $brand = User::find($this->selectedId);
        $brand->Update([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'status'=>$this->status,
            'password'=>Hash::make($this->password),,
            'rol'=>$this->rol
        ]);
        $this->resetUI();
        $this->emit('item-updated', 'Se ha actualizado la marca');
    }

    protected $listeners = [
        'brandDestroy' => 'Destroy',
        'resetUI' => 'resetUI',
    ];

    public function Destroy(User $users){
        $users->delete();
        $this->resetUI();
        $this->emit('item-deleted', 'Se ha eliminado la marca');
    }
}
