<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

use App\Models\Brand;
class BrandsController extends Component
{
    use WithPagination;

    public $search,$pagination,$selectedId;
    public $name;
    public function mount()
    {
        $this->componentName = 'Marcas';
        $this->pagination = 5;
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
        if(strlen($this->search)>0){
            $brands = Brand::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        }else
        {
            $brands = Brand::orderBy('name','desc')->paginate($this->pagination);
        }
        return view('livewire.brand.index', compact('brands'))
        ->extends('adminlte::page')
        ->section('content');
    }

    public function resetUI(){
        $this->name = '';
    }

    public function validateForm(){
        $rules=[
            'name'=>'required|min:3|max:100',
        ];
        $messages=[
            'name.required'=>'El nombre es requerido',
            'name.min'=>'El nombre debe tener al menos 3 caracteres',
            'name.max'=>'El nombre debe tener como maximo 100 caracteres',
        ];

        $this->validate($rules,$messages);
    }

    public function Store(){
        $this->validateForm();
        Brand::create([
            'name'=>$this->name,
        ]);
        $this->resetUI();
        $this->emit('item-added', 'Se ha agregado una nueva marca');
    }

    public function Edit(Brand $brand){
        $this->name = $brand->name;
        $this->selectedId = $brand->id;

        $this->emit('show-modal', 'showing modal');
    }

    public function Update(){
        $this->validateForm();
        $brand = Brand::find($this->selectedId);
        $brand->Update([
            'name'=>$this->name,
        ]);
        $this->resetUI();
        $this->emit('item-updated', 'Se ha actualizado la marca');
    }

    protected $listeners = [
        'brandDestroy' => 'Destroy',
        'resetUI' => 'resetUI',
    ];

    public function Destroy(Brand $brand){
        $brand->delete();
        $this->resetUI();
        $this->emit('item-deleted', 'Se ha eliminado la marca');
    }
}
