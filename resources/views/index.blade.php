<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scrap Bandit</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="bg-dark">
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand text-danger" href="#">
            Scrap Bandit
            </a>
        </nav>

        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($allData as $data)
            <tr>
                <td>{{ $data->title }}</td>
                <td>{{ $data->price }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>
