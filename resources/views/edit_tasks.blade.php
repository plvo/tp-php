<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modification Tache</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="container">
        <h2>Modifier la tâche</h2>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $task->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label">Statut :</label>
                <select id="status" name="status" class="form-select">
                <option value="À faire" {{ $task->status == 'À faire' ? 'selected' : '' }}>En attente</option>
                <option value="En cours" {{ $task->status == 'En cours' ? 'selected' : '' }}>En cours</option>
                <option value="Terminé" {{ $task->status == 'Terminé' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('tasks') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>