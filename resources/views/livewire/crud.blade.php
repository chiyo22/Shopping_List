<div>
<div class="todoList">
  <div class="cover-img">
    <div class="cover-inner">
      <h3 id="dayName">Shopping list</h3>
      @if($updateTodo)
      <input type="hidden" wire:model="t_id">
      <input type="text" name="add" placeholder="Add item..." wire:model="text" wire:submit="updateTodo()">
      @else
    </div>
  </div>
  <div class="content">
    <form class="add">
      <input type="text" name="add" placeholder="Add item..." wire:model="text" wire:submit="AddTodo()">
      <div class="input-buttons">
        <a href="#0" class="add-todo">
          <i class="fas fa-plus add plus-icon"></i>
        </a>
      </div>
    </form>
    @endif
    <ul class="todos align">
      @foreach($todos as $todo)
      <li>
        <input type="checkbox" id="todo_3">
        <label for="todo_3">
          <span class="check"></span>
          {{ $todo->text }}
        </label>
        <i class="far fa-edit" wire:click="EditTodo({{ $todo->id}})"></i>
        <i class="far fa-check"></i>
        <i class="far fa-trash-alt delete" wire:click="DeleteTodo({{$todo->id}})"></i>
      </li>
      @endforeach
    </ul>
  </div>
</div>
</div>
