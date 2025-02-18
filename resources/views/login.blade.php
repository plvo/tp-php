<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Panel de connexion</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Connexion à TaskyRavel</h2>
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Se connecter</button>
            </div>
        </form>
    </div>
</body>
</html>