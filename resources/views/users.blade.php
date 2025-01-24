<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Laravel 11 CRUD System
                <a href="/add/user" class="btn btn-success btn-sm float-end">Add New</a>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">
                    {{Session::get('success')}}
                </span>
            @endif
            <div class="card-body">
                <table class="table table-sm table-stripped table-bordered">
                    <thead>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Register Date</th>
                        <th>Last Update</th>
                    </thead>
                    <tbody>
                        @if (count($all_users) > 0)
                            @foreach ($all_users as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone_number}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No User Found!!!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

