<div>
    <div>
        <div class="add-items d-flex"> 
            <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" wire:model.lazy="itemText"> 
            <button class="add btn btn-primary font-weight-bold todo-list-add-btn" wire:click="$emit('addItemToList')">Add</button>
        </div>
    </div>
    <div class="list-wrapper">
        <ul class="d-flex flex-column-reverse todo-list">
            @foreach($todoLists as $todoListItem)
                <li class= "{{ $todoListItem['status'] == 'completed' ? 'completed' : '' }}">
                    <div class="form-check"> 
                        <label class="form-check-label" > 
                            <input class="checkbox" type="checkbox" wire:model="values.{{ $todoListItem['id'] }}" {{ $todoListItem['status'] == 'completed' ? 'checked' : '' }} > {{ $todoListItem['task'] }} 
                            <i class="input-helper"> </i>
                        </label> 
                    </div> 
                    <i class="remove mdi mdi-close-circle-outline" wire:click="deleteItemFromList({{ $todoListItem['id']}})"></i>
                </li>
            @endforeach
        </ul>
    </div>
</div>
