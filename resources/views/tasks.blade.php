<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des Tâches</title>
</head>
<body>
    <h2>Vos Tâches</h2>
    <a href="/logout">Déconnexion</a>

    <form action="/tasks" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Titre" required>
        <textarea name="description" placeholder="Description"></textarea>
        <select name="status">
            <option value="À faire">À faire</option>
            <option value="En cours">En cours</option>
            <option value="Terminé">Terminé</option>
        </select>
        <button type="submit">Créer</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                {{ $task->title }} - {{ $task->status }}
                <a href="/tasks/edit/{{ $task->id }}">Modifier</a>
                <form action="/tasks/delete/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
