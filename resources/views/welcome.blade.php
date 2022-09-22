<html>
    <head>
      <style>
          *,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}
body {
  min-height: 450px;
  height: 100vh;
  margin: 0;
  background: #f3eac2;
  color: #fff;
  font-family: "Nunito", sans-serif;
}
button,
input,
select,
textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}
.todoList {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 360px;
  height: 500px;
  background: #ec524b;
  border-radius: 10px;
  box-shadow: 0 7px 30px rgba(75, 70, 6, 0.3);
}
.cover-img .cover-inner {
  height: 120px;
  background-size: cover;
  background-position: 10%;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  position: relative;
}
.cover-img .cover-inner::after {
  background: rgba(0, 0, 0, 0.3);
  content: "";
  top: 0;
  left: 0;
  position: absolute;
  width: 100%;
  height: 100%;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.cover-img h3 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: "Nunito", sans-serif;
  text-transform: uppercase;
  font-size: 2rem;
  z-index: 10;
  color: rgba(255, 255, 255, 0.9);
  font-weight: 700;
}
.content {
  padding: 10px 20px;
}
.content form {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
  padding: 0 10px 0 5px;
  border-bottom: 1px solid #cccccc;
}
.content form > * {
  background: transparent;
  border: none;
  height: 35px;
}

.content input[type=text] {
  padding: 0 5px;
  font-weight: 700;
  font-size: 1.2rem;
  color: #fff;
  outline: none;
}
.content input-buttons a {
  text-decoration: none;
}
.content ul .todos {
  margin-left: 0;
  padding: 0;
  letter-spacing: none;
  height: 220px;
  overflow: auto;
  cursor: pointer;
}
.todos li i {
  cursor: pointer;
}
.align {
  padding: 0;
}
.content li {
  user-select: none;
  margin-bottom: 10px;
  display: flex;
  justify-content: space-between;
}
.content input[type=checkbox] {
  display: none;
}
.content input[type=checkbox] + label {
  color: #ffffff;
  font-size: 15px;
  cursor: pointer;
  position: relative;
  border-radius: 3px;
  display: inline-block;
  padding: 5px 5px 5px 40px;
}
.content input[type=checkbox] + label:hover {
  color: #fff;
  background-color: #f5b461;
}
.content input[type=checkbox] + label span.check {
  left: 4px;
  top: 50%;
  position: absolute;
  transform: translatey(-50%);
  width: 18px;
  height: 18px;
  display: block;
  background: #9ad3bc;
  border-radius: 3px;
  border: 1px solid #fff;
  box-shadow: -2px -2px 2px rgba(67, 67, 67, 0.5), 
              inset 2px 2px 4px rgba(0, 0, 0, 0.5), 
              inset -2px -2px 2px rgba(67, 67, 67, 0.3), 
              2px 2px 4px rgba(0, 0, 0, 0.3);
}
.content input[type=checkbox]:checked + label {
  color: #e8e8e8;
  text-decoration: line-through;
}
.content input[type=checkbox]:checked + label span.check {
  background-color: transparent;
  border-color: transparent;
  box-shadow: none;
}
.content input[type=checkbox] + label span.check::after {
  width: 100%;
  height: 100%;
  content: "";
  display: block;
  position: absolute;
  background-image: url(check-mark.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: 16px 16px;
  transform: scale(0);
  transition: transform 300ms cubic-bezier(0.3, 0, 0, 1.5);
}

.content input[type=checkbox]:checked + label span.check::after {
  transform: scale(1);
}

.content input[type=checkbox] + label span.check::before {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: block;
  content: "";
  position: absolute;
  border-radius: 50%;
  background: #d9d9d9;
  opacity: 0.8;
  transform: scale(0);
}

.content input[type=checkbox]:checked + label span.check::before {
  opacity: 0;
  transform: scale(1.3);
  transition: opacity 300ms cubic-bezier(0.2, 0, 0, 1), 
              transform 400ms cubic-bezier(0.3, 0, 0, 1.4);
}
.plus-icon {
  color: #fff;
} 
const submitForm = document.querySelector(".add");
const addButton = document.querySelector(".add-todo");
const todoList = document.querySelector(".todos");
const list = document.querySelectorAll(".todos li");

const lang = navigator.language;

let date = new Date();

let dayName = date.toLocaleString(lang, {
  weekday: "long"
});

let listLenght = list.lenght;

const generateTempalate = (todo) => {
  const html = `<li>
                  <input type="checkbox" id="todo_${listLenght}">
                  <label for="todo_${listLenght}">
                    <span class="check"></span>
                    ${todo}
                  </label>
                  <i class="far fa-trash-alt delete"></i>
                </li>`;
  todoList.innerHTML += html;
};

function addTodos(e) {
  e.preventDefault();
  const todo = submitForm.add.value.trim();
  if (todo.length) {
    listLenght = listLenght + 1;
    generateTempalate(todo);
    submitForm.reset();
  }
}

submitForm.addEventListener("submit", addTodos);
addButton.addEventListener("click", addTodos);

function deleteTodos(e) {
  if (e.target.classList.contains("delete")) {
    e.target.parentElement.remove();
  }
}

todoList.addEventListener("click", deleteTodos);
<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

 </style>

    @livewireStyles

</head>
 <body>
 
 <main>
    
    @livewire('crud')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


 </main>
   @livewireScripts
 </body>
</html>