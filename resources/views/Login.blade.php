<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <h1>Connexion</h1>
            
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </ul>
                    @endif
            
                    @if ($message = Session::get('error'))
                        <div>{{ $message }}</div><br />
                    @endif
            
                    <label for="email" class="form-label">Email</label><br />
                    <input type="text"  class="form-control" name="email"  id="email" placeholder="Saisir l'e-mail ici ... "><br /><br />
            
                    <label for="password" class="form-label">Mot de passe</label><br />
                    <input type="password"  class="form-control" name="password" id="password" placeholder="Saisir le mot de passe ici ... "><br /><br />
            
                    <a href="{{ route('registration') }}" class="btn btn-link">S'inscrire</a><br /><br />
                    <a href="{{ route('forgottenPassword') }}" class="btn btn-link">Mot de passe oublier</a><br /><br />
            
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
