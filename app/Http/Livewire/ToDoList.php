<?php
/**
 * Created by Fahim Ahmed <fahim152@gmail.com>.
 */
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
        $this->validate([
            'itemText'  => 'required|string|max:100',
        ], [
            'itemText.required'   => 'Bro! WTF !! You want an error? Write something first man! ',
        ]);
        ToDoListModel::insert([
            'task' => $this->itemText
        ]);
        $this->itemText = null;
        $this->emit('toast:show', 'success', "New Task Added To The List!");
    }

    public function EditItemStatusFromList($id)
    {
        $isActive = ToDoListModel::whereId($id)->pluck('status')->first();
        if($isActive == 'active') {
            ToDoListModel::whereId($id)->update(['status' =>'completed']);
            $this->emit('toast:show', 'success', "Marked as Completed");
        } 
        elseif ($isActive == 'completed') {
            ToDoListModel::whereId($id)->update(['status' => 'active']);
            $this->emit('toast:show', 'success', "Marked as Active");
        }
    }
  
    public function deleteItemFromList($id)
    {
        ToDoListModel::whereId($id)->delete();
        $this->emit('toast:show', 'success', "Task Deleted Successfully!");
    }

    public function deleteAllCompleted()
    {
        ToDoListModel::where('status', 'completed')->delete();
        $this->emit('toast:show', 'success', "All Completed Task Deleted Successfully");
    }

    public function sortRecords($status)
    {
        $this->sortStatus = $status;
        $this->emit('toast:show', 'success', "Current Sort Selection: ".ucfirst($status), 'top-end', 5000);
    }

}
