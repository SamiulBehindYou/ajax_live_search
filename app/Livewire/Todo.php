<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Todo extends Component
{
    #[Validate('required|unique:todos,todo')]
    public $todo = '';

    public function save(){
        $this->validate();
        ModelsTodo::create(
            $this->only(['todo'])
        );

        session()->flash('message', 'Todo added successfully!');
        // sleep(1);
        $this->todo = '';

        return back();
    }
    public function render()
    {
        $todos = ModelsTodo::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.todo', compact('todos'));
    }
}
