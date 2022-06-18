<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Web solution</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container container-fluid">
            <div class="container container-lg">
                <h1>Web solution</h1>
                <table class="table">
                    <thead>
                        <th>Label</th>
                        <th>geo-longitude</th>
                        <th>geo-latitude</th>
                        <th>dublin-distance</th>
                    </thead>
                    <tbody>
                        @foreach ($computedFilters as $key => $row)
                            <tr>
                                <td>{{ $row['label'] }}</td>
                                <td>{{ $row['longitude'] }}</td>
                                <td>{{ $row['latitude'] }}</td>
                                <td>{{ $row['dublin-distance'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
