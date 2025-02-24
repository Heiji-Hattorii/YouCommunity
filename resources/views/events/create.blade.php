@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Événements</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">
    <script
        src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1">
    </script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#4F46E5"
        data-border-radius='small'></script>
</head>

<body class="bg-gray-50 min-h-screen">

    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Créer un nouveau événement</h1>
            <p class="mt-2 text-gray-600"></p>
        </div>

        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-lg font-medium text-gray-900 mb-6"></h2>
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div> <label class="block text-sm font-medium text-gray-700">Titre de l'événement</label>
                        <input type="text" name="titre"
                            class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                            placeholder="Saisissez le titre">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date et heure</label>
                        <input type="datetime-local" name="date_heure"
                            class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Lieu</label>
                        <input type="text" name="lieu"
                            class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                            placeholder="Adresse de l'événement">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Max des participants</label>
                        <input type="number" name="max_participants"
                            class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                            placeholder="Adresse de l'événement">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select name="categorie"
                            class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom">
                            <option>Sport</option>
                            <option>Jeu</option>
                            <option>Art</option>
                            <option>Cuisine</option>
                            <option>Culture</option>
                            <option>Musique</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Description</label> <textarea rows="4"
                            class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                            placeholder="Décrivez votre événement" name="description"></textarea>
                    </div>

                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Image de l'événement</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                            <div class="flex text-sm text-gray-600">
                                <label
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-custom hover:text-custom/90">
                                    <span>Télécharger un fichier</span>
                                    <input type="file" name="image_path" accept="image/*" class="sr-only"> </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="!rounded-button bg-custom px-4 py-2 text-white text-sm font-medium hover:bg-custom/90">
                        <i class="fas fa-save mr-2"></i>Enregistrer l'événement
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
@endsection