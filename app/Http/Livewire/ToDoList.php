<?php

namespace App\Http\Livewire;

use App\TodoList as TodoListModel;
use Livewire\Component;

class ToDoList extends Component
{
    public $todoLists = [];

    public $values = null;

    public $itemText = null;
        
    protected $listeners = [
        'addItemToList' => 'addItemToList',
    
    ];

    public function render()
    {   
        $this->todoLists = TodoListModel::all();
        return view('livewire.to-do-list', [
            'todoLists' => $this->todoLists,
        ]);
    }

    public function updated()
    {
        if(!isset($this->values)){
            return;
        }

        foreach($this->values as $key => $value)
        {
            ToDoListModel::whereId($key)->update(['status' => $value ? 'completed' : 'active']);
        }
    }

    public function addItemToList()
    {
        ToDoListModel::insert([
            'task' => $this->itemText
        ]);
    }
  
    public function deleteItemFromList($id)
    {
        ToDoListModel::whereId($id)->delete();
    }

}
