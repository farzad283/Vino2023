<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Registration</h1>

    <form method="POST">
        @csrf

        <div>
            @error('first_name')
            <div>{{ $message }}</div>
            @enderror
            <label for="first_name">Prénom</label>
            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
        </div>

        <div>
            @error('last_name')
            <div>{{ $message }}</div>
            @enderror
            <label for="last_name">Nom de famille</label>
            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required>
        </div>

        <div>
            @error('email')
            <div>{{ $message }}</div>
            @enderror
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            @error('password')
            <div>{{ $message }}</div>
            @enderror
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmation du mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">S'inscrire</button>
        </div>
    </form>
</body>
</html>