<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            @error("email")
            {{ $message }}
            @enderror
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            @error("password")
            {{ $message }}
            @enderror
        </div>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

