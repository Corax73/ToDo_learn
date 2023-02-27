<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDo_learn</title>

        
    </head>
    <body class="antialiased" style="background-color: #5d615c47; color: grey; text-align: center">
    @if (Auth::check())
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, {{ Auth::user()->name }}.
                    </a>
                    <p>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>
                    </p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                    </form>
    
        <h1>ToDo list</h1>
                <table border="5px" align="center">
                     <thead>
                        <th>Task</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach($Task as $key=>$taskItem)
                           @if($taskItem)
                        <tr>
                                <!-- Task Name -->
                            <td class="table-text">
                            <form method="post" action="{{ route('deleteTask', $taskItem->id) }}" accept-charset="UTF-8">
                                {{ csrf_field()  }}
                                <p>Task: {{ $taskItem->name }}</p>
                                
                                
                    
                            @endif
                            </td>
                            <td>
                            <p>Created_at: {{ $taskItem->created_at }}</p>
                            </td>
                            <td>
                                <button type="submit">Delete</button>
                            </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="post" action="{{ route('saveTask') }}" accept-charset="UTF-8">
                {{ csrf_field()  }}
                <div class="form-group">
                <label for="Task">New task</label> </br>
                <input type="text" name="name"> </br>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                </div>
                <button type="submit">Save task</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Please log in</a>
    @endif
            <p><a href="{{ url('/home') }}" class="text-white underline">Home</a></p>

            

    </body>
</html>