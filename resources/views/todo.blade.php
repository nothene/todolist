<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>To do</title>
    </head>
    <style>
        body {
            font-family: arial;
        }
        .header{
            color: purple;
            font-size: 35px;
        }
        .block{
            width: 30%;
        }
    </style>
    <body>
        <div class="header">To Do List</div>
        <br>
        <hr>
        <div style="display:flex">
            <div class="block">Task</div>
            <div class="block">Recipient</div>                
        </div>        
        <hr>
        @foreach ($todos as $todo)
            <div style="display:flex">
                <div class="block">{{ $todo->description }}</div>
                <div class="block">{{ $todo->recipient }}</div>
                <form method="POST" action="/todo/{{ $todo->id }}/update">
                    @csrf
                    @method('PUT')
                    <button type="submit">Update</button>
                </form>
                <form method="POST" action="/todo/{{ $todo->id }}/delete">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
        <hr>
        <div style="display:flex">
            @for($i = 1; $i <= ceil($count / 5); $i++)
                <a href="http://127.0.0.1:8000/todo?page={{ $i }}"><button>{{ $i }}</button></a>
            @endfor
        </div>
        <form method="POST" action="/todo/create">
            @csrf
            <div style="display:flex">
                <div>Task: </div>
                <input type="text" name="description" id="description">
            </div>
            <div style="display:flex">
                <div>Recipient: </div>
                <input type="text" name="recipient"  id="recipient">
            </div>
            <button type="submit">Create</button>
        </form>
    </body>
</html>
