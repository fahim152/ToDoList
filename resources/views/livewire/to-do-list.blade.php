<div>
    <div>
        <div class="add-items d-flex"> 
            <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" wire:model.lazy="itemText" required='true'> 
            
            <button class="add btn btn-primary font-weight-bold todo-list-add-btn" wire:click="addItemToList">Add</button>
         
        </div>
        @error('itemText') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="list-wrapper">
        <ul class="d-flex flex-column-reverse todo-list">
            @foreach($todoLists as $todoListItem)
                <li class= "{{ $todoListItem['status'] == 'completed' ? 'completed' : '' }}">
                    <div class="form-check"> 
                        <label class="form-check-label" > 
                            <input class="checkbox" type="checkbox" wire:click="EditItemStatusFromList({{ $todoListItem['id'] }})"  {{ $todoListItem['status'] == 'completed' ? 'checked' : '' }} >  
                            <i class="input-helper"> </i>
                        </label> 
                    </div> 
                    <div id="editTaskText_{{ $todoListItem['id'] }}" contenteditable="true" onfocusout="editTask({{ $todoListItem['id'] }})"> {{ $todoListItem['task'] }} </div> 
                    <i class="remove mdi mdi-close-circle-outline" wire:click="deleteItemFromList({{ $todoListItem['id']}})"></i>
                </li>
            @endforeach
        </ul>  
    </div>
    {{ $todoLists->where('status', 'active')->count() . ' item(s) left' }}  

   <div>
        <button type="button" class="btn btn-primary btn-sm" wire:click="sortRecords('all')"> All </button>
        <button type="button" class="btn btn-primary btn-sm" wire:click="sortRecords('active')"> Active </button>
        <button type="button" class="btn btn-success btn-sm" wire:click="sortRecords('completed')"> Completed </button>
        @if($todoLists->where('status', 'completed')->count() >= 1)
        <button type="button" class="btn btn-danger btn-sm"  wire:click="deleteAllCompleted">Clear All Completed</button>
        @endif
   </div>
</div>
