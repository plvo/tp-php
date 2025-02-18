<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Panel de connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
