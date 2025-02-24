@extends('layouts.app')

@section('content')
<div class="min-h-screen w-[100%]">
    <div class="w-[100%] mx-auto p-6">
        <div class="relative mb-12">
            <img src="{{ asset($event->image_path) }}" class="w-full h-[45vh] object-cover rounded-xl" alt="Event banner">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-xl"></div>
            <h1 class="absolute bottom-6 left-6 text-5xl font-[Playfair Display] font-bold text-white">
                {{ $event->titre }}
            </h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8 mb-8 transform transition duration-300 hover:shadow-xl">
            <div class="grid grid-cols-2 gap-8 mb-8">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3"> 
                        <i class="fas fa-calendar-alt text-custom text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Date</p>
                            <p class="font-medium">{{ $event->date_heure }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-map-marker-alt text-custom text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Lieu</p>
                            <p class="font-medium">{{ $event->lieu }}</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-users text-custom text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Participants</p>
                            <p class="font-medium">120 / {{ $event->max_participants }} places</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3"> 
                        <i class="fas fa-ticket-alt text-custom text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Catégorie</p>
                            <p class="font-medium">{{ $event->categorie }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Description</h2>
                <p class="text-gray-600 leading-relaxed">{{ $event->description }}</p>
            </div>

            <div class="flex space-x-4">
                @if(auth()->check())
                    @if($event->rsvps->contains('user_id', auth()->id()))
                        <form action="{{ route('rsvp.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="!rounded-button bg-custom bg-black text-white hover:bg-white hover:text-black px-6 py-3 font-medium transition duration-300">
                                <i class="fas fa-check-circle mr-2"></i>Se désinscrire
                            </button>
                        </form>
                    @else
                        <form action="{{ route('rsvp.store', $event->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="!rounded-button bg-custom bg-black text-white hover:bg-white hover:text-black px-6 py-3 font-medium transition duration-300">
                                <i class="fas fa-check-circle mr-2"></i>S'inscrire
                            </button>
                        </form>
                    @endif
                @endif
                <a href="{{ route('events.index') }}" class="!rounded-button border border-custom text-custom hover:bg-black hover:text-white bg-white text-black px-6 py-3 font-medium transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Retour
                </a>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-xl font-semibold mb-6">Commentaires</h2>
            <form action="{{ route('comments.store', $event->id) }}" method="POST">
                @csrf
                <textarea name="contenu" class="w-full border border-gray-200 rounded-lg p-4 focus:ring-2 focus:ring-custom focus:border-custom transition duration-300" rows="4" placeholder="Partagez vos pensées..."></textarea>
                @error('contenu')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <button type="submit" class="!rounded-button my-2 bg-custom bg-black text-white hover:bg-white hover:text-black px-6 py-3 font-medium transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i>Commenter
                </button>
            </form>
            
            <div class="space-y-6 mt-6">
                @foreach($event->comments as $comment)
                    <div class="border-b border-gray-100 pb-6">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <p class="font-medium">{{ $comment->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $comment->created_at }}</p>
                                </div>
                            </div>
                            @if($comment->user_id == auth()->id())
                                <form action="{{ route('comments.destroy', ['commentId' => $comment->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-500 transition duration-300">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                        <p class="text-gray-600">{{ $comment->contenu }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection