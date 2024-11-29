<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class SearchTodo extends Component
{
    public $foo;
    public $search = '';
    public $page = 1;

    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    
    public function render()
    {
        return view('livewire.search-todo', [
            'todos' => Todo::where('todo', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
