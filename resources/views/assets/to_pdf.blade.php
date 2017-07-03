<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table table-hover" border="1" cellpadding="1" width="100%" cellspacing="1">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($resources as $resource)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $resource->name }}</td>
    </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>