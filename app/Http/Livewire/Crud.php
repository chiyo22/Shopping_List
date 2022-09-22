<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todo;

class Crud extends Component
{
    public $todos, $text, $t_id;
    public $updateTodo = false;
    
    public function AddTodo()
    {
        $todo = new Todo();
        $todo->text = $this->text;
        $todo->save();
        $this->resetToDo();
    }

    public function DeleteTodo($id){
        $this->updateTodo = true;
    }
    
    public function UpdateTodo($id){
        $todo = Todo::finderfail($this->t_id);
        $todo->text = $this->text;
        $todo->save();
        $this->updateTodo = false;
        $this->resetToDo();
    }

    public function EditTodo($id){
        Todo::find($id)->delete();
        $todo = Todo::finderfail($id);
        $this->text = todo->text;
        $this->t_id = todo->t_id;
    }

    public function resetToDo(){
        $this->text = null;
    }


    public function render()
    {
        $this->todos = Todo::latest()->get();
        return view('livewire.crud');
    }
}
