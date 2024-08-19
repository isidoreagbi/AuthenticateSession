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
    {{-- <form action="{{ route('registration.process') }}" method="POST">
        @csrf
        <h1>Inscription</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            </ul>
        @endif

        @if ($message = Session::get('error'))
            <div>{{ $message }}</div><br />
        @endif

        <label for="name">Nom d'utilisateur</label><br />
        <input type="text" name="name" id="name" placeholder="Saisir le nom ici ... "><br /><br />

        <label for="email">Email</label><br />
        <input type="text" name="email" id="email" placeholder="Saisir l'e-mail ici ... "><br /><br />

        <label for="password">Mot de passe</label><br />
        <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ... "><br /><br />

        <label for="passwordConfirm">Confirmer mot de passe</label><br />
        <input type="password" name="passwordConfirm" id="passwordConfirm"
            placeholder="Confirmer le mot de passe ici ... "> <br /> <br />

        <a href="{{ route('login') }}">Se connecter</a><br /><br />

        <button type="submit">Soumettre</button>
    </form> --}}
    <div class="container">
        <div class="card-body">
            <div class="card-body">
                <form action="{{ route('registration.process') }}" method="POST">
                    @csrf
                    <h1>Inscription</h1>
            
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </ul>
                    @endif
            
                    @if ($message = Session::get('error'))
                        <div>{{ $message }}</div><br />
                    @endif
            
                    @if ($message = Session::get('success'))
                        <div>{{ $message }}</div><br />
                    @endif
            
                    <label for="name" class="form-label">Nom d'utilisateur</label><br />
                    <input type="text" class="form-control" name="name" id="name" placeholder="Saisir le nom ici ... "><br /><br />
            
                    <label for="email"class="form-label">Email</label><br />
                    <input type="text" class="form-control" name="email" id="email" placeholder="Saisir l'e-mail ici ... "><br /><br />
            
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>

        </div>
        
    </div>


</body>

</html>
