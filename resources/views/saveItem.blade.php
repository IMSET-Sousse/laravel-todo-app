<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>To do list</h1>
    <table class="table">
        <thead>
            <tr><th scope="col">Id</th><th scope="col">Item</th><th scope="col">Status</th><th scope="col">Actions</th></tr>
        </thead>
        <tbody>
            @if (sizeof($listItems) != 0)
                @foreach ( $listItems as $listItem)
                <tr>
                    <td scope="row">{{ $listItem->id}}</td>
                    <td>{{ $listItem->name}}</td>
                    <td>
                        @if ($listItem->is_complete != 0)
                        <span class="badge text-bg-success">Done</span>
                        @else
                        <span class="badge text-bg-primary">Not yet</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex flex-row">
                            @if ($listItem->is_complete == 0)
                                <form class="mx-1" action="{{ route('markComplete', $listItem->id)}}" method="post">
                                    {{ csrf_field() }}
                                    <input class="btn btn-success" type="submit" value="Done"/>
                                </form>
                            @else
                                <form class="mx-1" action="{{ route('markNotYet', $listItem->id)}}" method="post">
                                    {{ csrf_field() }}
                                    <input class="btn btn-warning" type="submit" value="Not yet"/>
                                </form>
                            @endif
                            <form class="mx-1" action="{{ route('delete', $listItem->id)}}" method="post">
                                {{ csrf_field() }}
                                <input class="btn btn-danger" type="submit" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            @else
                <tr><td colspan="4" class="text-center">No items found</td></tr>
            @endif
        </tbody>
    </table>


    <h1>Add a item to todo list</h1>
    <form action="{{ route('saveItem') }}" method="POST">
        {{ csrf_field() }}
        <label for="todo">To do item</label>
        <input id="todo" name="todo"/>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
