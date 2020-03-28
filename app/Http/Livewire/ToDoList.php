<?php

namespace App\Http\Livewire;

use App\TodoList as TodoListModel;
use Livewire\Component;

class ToDoList extends Component
{
    public $todoLists = [];

    public $values = null;

    public $itemText = null;

    public $sortStatus = 'all';
        
    public function render()
    {   
        if($this->sortStatus == 'all'){
            $this->todoLists = TodoListModel::get();
        }else{
            $this->todoLists = TodoListModel::where('status', $this->sortStatus)->get();
        }
        return view('livewire.to-do-list', [
            'todoLists' => $this->todoLists,
        ]);
    }

    public function addItemToList()
    {
        ToDoListModel::insert([
            'task' => $this->itemText
        ]);
        $this->itemText = null;
    }

    public function EditItemStatusFromList($id)
    {
        $isActive = ToDoListModel::whereId($id)->pluck('status')->first();
        if($isActive == 'active') {
            ToDoListModel::whereId($id)->update(['status' =>'completed']);
        } 
        elseif ($isActive == 'completed') {
            ToDoListModel::whereId($id)->update(['status' => 'active']);
        }
    }
  
    public function deleteItemFromList($id)
    {
        ToDoListModel::whereId($id)->delete();
    }

    public function deleteAllCompleted()
    {
        ToDoListModel::where('status', 'completed')->delete();
    }

    public function sortRecords($status)
    {
        $this->sortStatus = $status;

    }

}
