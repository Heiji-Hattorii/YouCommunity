<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-gray-50 font-['Poppins']">
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between h-16 flex items-center">

                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center justify-start">
                        <img class="h-8 w-auto" src="path_to_your_image.jpg" alt="YouCommunity">
                    </a>
                </div>

                @if (Route::has('login'))

                <div class="hidden sm:ml-6 sm:flex sm:space-x-8 flex">
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="border-custom text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Register</a>

                    @endif
                    @endauth
                </div>
                @endif
            </div>
            </div>
        </nav>
    </header>

    <section class="relative mt-10 bg-gray-900 h-[580px] overflow-hidden ">
        <img src="{{ asset('images/photo1.webp') }}"
            class="absolute inset-0 w-full h-full object-[100%100%] opacity-50 ">
        <div class="relative max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-bold text-white mb-6">Découvrez des événements qui vous ressemblent</h1>
                <p class="text-xl text-gray-200 mb-8">Rejoignez une communauté dynamique et participez à des
                    événements passionnants près de chez vous.</p>
                <button class="bg-custom text-white px-8 py-4 !rounded-button text-lg font-medium hover:bg-custom/90">
                    Découvrir les événements <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 ">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm !rounded-button p-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative">
                        <i class="fas fa-map-marker-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Ville ou code postal"
                            class="!rounded-button w-full pl-10 pr-3 py-2 border-gray-300 focus:ring-custom focus:border-custom">
                    </div>
                    <div class="relative">
                        <i class="fas fa-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select
                            class="!rounded-button w-full pl-10 pr-3 py-2 border-gray-300 focus:ring-custom focus:border-custom">
                            <option>Toutes les catégories</option>
                            <option>Sport</option>
                            <option>Culture</option>
                            <option>Musique</option>
                            <option>Jeu</option>
                        </select>
                    </div>
                    <div class="relative">
                        <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="date"
                            class="!rounded-button w-full pl-10 pr-3 py-2 border-gray-300 focus:ring-custom focus:border-custom">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Événements à la une</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div class="bg-white shadow-sm !rounded-button overflow-hidden"> <img
                        src="{{ asset('images/photo1.webp') }}" alt="Concert en plein air"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-2">Festival de Jazz</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            25 juin 2024
                        </p>
                        <div class="flex items-center justify-between"> <span class="text-sm text-gray-500">
                                <i class="fas fa-users mr-1"></i>
                                156 participants
                            </span>
                            <button
                                class="!rounded-button text-custom hover:bg-custom/10 px-3 py-1 text-sm font-medium">
                                S'inscrire
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Catégories populaires</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <a href="#"
                    class="bg-white p-6 text-center !rounded-button shadow-sm hover:shadow-md transition-shadow"> <i
                        class="fas fa-music text-3xl text-custom mb-4"></i>
                    <h3 class="font-medium">Musique</h3>
                </a>
                <a href="#"
                    class="bg-white p-6 text-center !rounded-button shadow-sm hover:shadow-md transition-shadow"> <i
                        class="fas fa-palette text-3xl text-custom mb-4"></i>
                    <h3 class="font-medium">Art</h3>
                </a>
                <a href="#"
                    class="bg-white p-6 text-center !rounded-button shadow-sm hover:shadow-md transition-shadow"> <i
                        class="fas fa-running text-3xl text-custom mb-4"></i>
                    <h3 class="font-medium">Sport</h3>
                </a>
                <a href="#"
                    class="bg-white p-6 text-center !rounded-button shadow-sm hover:shadow-md transition-shadow"> <i
                        class="fas fa-utensils text-3xl text-custom mb-4"></i>
                    <h3 class="font-medium">Cuisine</h3>
                </a>
                <a href="#"
                    class="bg-white p-6 text-center !rounded-button shadow-sm hover:shadow-md transition-shadow"> <i
                        class="fas fa-book text-3xl text-custom mb-4"></i>
                    <h3 class="font-medium">Culture</h3>
                </a>
                <a href="#"
                    class="bg-white p-6 text-center !rounded-button shadow-sm hover:shadow-md transition-shadow"> <i
                        class="fas fa-gamepad text-3xl text-custom mb-4"></i>
                    <h3 class="font-medium">Jeux</h3>
                </a>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 bg-black">
            <div class="bg-custom !rounded-button text-white">
                <div class="max-w-4xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-extrabold sm:text-4xl">
                        <span class="block">Prêt à rejoindre notre communauté ?</span>
                    </h2>
                    <p class="mt-4 text-lg">
                        Créez votre compte gratuitement et commencez à participer aux événements qui vous
                        passionnent.
                    </p> <button
                        class="!rounded-button mt-8 bg-black text-custom hover:bg-gray-100 hover:text-black px-8 py-3 text-base font-medium inline-flex items-center">
                        Créer un compte
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    </main>

    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-8xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">À propos</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Notre histoire
                            </a>
                        </li>
                        <li> <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                L'équipe
                            </a> </li>
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Carrières
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Ressources</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Centre d'aide
                            </a>
                        </li>
                        <li> <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                Guides
                            </a> </li>
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Blog
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Légal</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                Confidentialité
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900"> CGU
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Cookies
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Suivez-nous</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 flex items-center"> <i
                                    class="fab fa-facebook mr-2"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 flex items-center"> <i
                                    class="fab fa-twitter mr-2"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 flex items-center"> <i
                                    class="fab fa-instagram mr-2"></i> Instagram
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-200 pt-8">
                <p class="text-base text-gray-400 text-center">
                    &copy; 2024 YouCommunity. Tous droits réservés.
                </p>
            </div>
        </div>

    </footer>

</body>

</html>