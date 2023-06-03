<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: #4b5563;
            color: #ccc;
        }
    </style>
    <title>Todo</title>
</head>
<body>
<div class="container my-4">
    <div class="d-flex justify-content-center">
        <h1 class="p-3">Todo List</h1>
    </div>

    <div class="d-flex justify-content-center">
        @if($errors->any())
            <div class="alert alert-danger w-25 m-1 pb-0 d-flex justify-content-center">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <form action="{{ route('store') }}" method="post" class="m-5">
        @csrf
        <div class="d-flex justify-content-center">
            <input type="text" name="task" placeholder="New Task..." class="form-control w-50" autocomplete="off">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary my-3 w-25">Save</button>
        </div>
    </form>

    @foreach($items as $number => $item)
        <div class="row py-3 ms-5">
            <div class="col-10 p-3"><span style="font-weight: bolder">{{ ++$number }}: </span><span class="ps-2">{{ $item->task }}</span></div>
            <div class="col-1 p-2 ms-5">
                <form action="{{ route('done', $item->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-light p-0"><span class="material-symbols-outlined p-1">check_box_outline_blank</span></button>
                </form>
            </div>
        </div>
    @endforeach
    <hr>
    @foreach($itemsDone as $number => $itemDone)
        <div class="row py-3 ms-5">
            <div class="col-10 p-3"><span style="font-weight: bolder">{{ ++$number }}: </span><del class="ps-2">{{ $itemDone->task }}</del></div>
            <div class="col-1 p-2 ms-5">
                <form action="{{ route('delete', $itemDone->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger p-0"><span class="material-symbols-outlined p-1">delete</span></button>
                </form>
            </div>
        </div>
    @endforeach

</div>
</body>
</html>
