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
        src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#4F46E5"
        data-border-radius='small'></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center"> <img class="h-8 w-auto"
                            src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="Logo">
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#"
                            class="border-custom text-custom inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Tableau de bord
                        </a>
                        <a href="#"
                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Mes événements
                        </a>
                        <a href="#"
                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Participants
                        </a>
                    </div>
                </div>
                <div class="flex items-center"> <button type="button"
                        class="!rounded-button bg-custom px-4 py-2 text-white text-sm font-medium hover:bg-custom/90">
                        <i class="fas fa-plus mr-2"></i>Créer un événement
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Gestion des Événements</h1>
            <p class="mt-2 text-gray-600">Organisez et gérez vos événements facilement</p>
        </div>

        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-lg font-medium text-gray-900 mb-6">Créer un nouvel événement</h2>
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" >
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
                        <select  name="categorie" class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom">
                            <option>Conférence</option>
                            <option>Atelier</option>
                            <option>Séminaire</option>
                            <option>Formation</option>
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
                                    <input required type="file" name="image_path" accept="image/*" class="sr-only"> </label>
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

        <!-- <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-medium text-gray-900">Événements à venir</h2>
                <div class="flex space-x-4"> <select
                        class="border-gray-300 focus:border-custom focus:ring-custom text-sm">
                        <option>Tous les événements</option>
                        <option>Cette semaine</option>
                        <option>Ce mois</option>
                    </select>
                    <button type="button"
                        class="!rounded-button bg-gray-100 px-4 py-2 text-gray-700 text-sm font-medium hover:bg-gray-200">
                        <i class="fas fa-filter mr-2"></i>Filtrer
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="border rounded-lg overflow-hidden"> <img
                        src="https://creatie.ai/ai/api/search-image?query=A professional conference room setup with modern amenities, natural lighting, and a clean, minimalist design. The space features comfortable seating, presentation screens, and networking areas, all captured in high resolution with balanced composition.&width=400&height=250&orientation=landscape&flag=ad781cbe-728b-4dba-9526-f463381069f0"
                        class="w-full h-48 object-cover" alt="Conférence annuelle">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">Conférence annuelle 2024</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="far fa-calendar mr-2"></i>15 mars 2024, 09:00
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-map-marker-alt mr-2"></i>Paris Expo Porte de Versailles
                        </p>
                        <div class="mt-4 flex justify-between items-center"> <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-users mr-1"></i>120/150 places
                            </span>
                            <div class="flex space-x-2"> <button type="button"
                                    class="!rounded-button text-custom hover:bg-gray-100 p-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="!rounded-button text-red-600 hover:bg-gray-100 p-2"> <i
                                        class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg overflow-hidden"> <img
                        src="https://creatie.ai/ai/api/search-image?query=A modern workshop setting with creative workspace elements, featuring collaborative areas, whiteboards, and interactive tools. The space has excellent lighting and a contemporary aesthetic, perfect for hands-on learning.&width=400&height=250&orientation=landscape&flag=4694e210-6ed9-4bec-8fbd-c79e2233fa06"
                        class="w-full h-48 object-cover" alt="Atelier">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">Atelier Design Thinking</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="far fa-calendar mr-2"></i>20 mars 2024, 14:00
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-map-marker-alt mr-2"></i>Station F, Paris
                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-users mr-1"></i>28/30 places
                            </span>
                            <div class="flex space-x-2"> <button type="button"
                                    class="!rounded-button text-custom hover:bg-gray-100 p-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="!rounded-button text-red-600 hover:bg-gray-100 p-2"> <i
                                        class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg overflow-hidden"> <img
                        src="https://creatie.ai/ai/api/search-image?query=A professional training room environment with modern technology integration, comfortable seating arrangements, and educational materials displayed. The space reflects a corporate learning atmosphere with clean lines and professional aesthetics.&width=400&height=250&orientation=landscape&flag=b8e27bb7-afcb-472e-a446-2e54ce6ba34c"
                        class="w-full h-48 object-cover" alt="Formation">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">Formation Leadership</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="far fa-calendar mr-2"></i>25 mars 2024, 10:00
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-map-marker-alt mr-2"></i>Le Village by CA, Paris
                        </p>
                        <div class="mt-4 flex justify-between items-center"> <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <i class="fas fa-users mr-1"></i>20/20 places
                            </span>
                            <div class="flex space-x-2"> <button type="button"
                                    class="!rounded-button text-custom hover:bg-gray-100 p-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="!rounded-button text-red-600 hover:bg-gray-100 p-2"> <i
                                        class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </main>

    <footer class="bg-white mt-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="border-t border-gray-200 pt-8">
                <p class="text-center text-sm text-gray-500"> © 2024 Gestion des Événements. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
@endsection
