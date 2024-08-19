<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenue {{ Auth::user()->name }}</h3>

                <a href="/add/user" class="btn btn-success btn-sm float-end">Ajouter</a> 

            </div>

            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <h1>Tableau de bord</h1>
                            </td>

                            <td>
                                <a href="{{ route('logout') }}" class="btn btn-danger btn-sm float-end">
                                    Se déconnecter
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
