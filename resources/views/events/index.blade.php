@extends('layouts.app')

@section('content')


<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-medium text-gray-900">Mes Evenements</h2>
    </div>
    @foreach($events as $event)
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

        <div class="border rounded-lg overflow-hidden"> <img
                src="https://creatie.ai/ai/api/search-image?query=A professional training room environment with modern technology integration, comfortable seating arrangements, and educational materials displayed. The space reflects a corporate learning atmosphere with clean lines and professional aesthetics.&width=400&height=250&orientation=landscape&flag=b8e27bb7-afcb-472e-a446-2e54ce6ba34c"
                class="w-full h-48 object-cover" alt="Formation">
            <div class="p-4">
                <h3 class="text-lg font-medium text-gray-900">{{ $event->titre }}</h3>
                <p class="text-sm text-gray-500 mt-1">
                    <i class="far fa-calendar mr-2"></i>{{ $event->date_heure }}
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    <i class="fas fa-map-marker-alt mr-2"></i>{{ $event->lieu }}
                </p>
                <div class="mt-4 flex justify-between items-center"> <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        <i class="fas fa-users mr-1"></i>5/{{ $event->max_participants }} places
                    </span>
                    <div class="flex space-x-2">
                        
                        <button type="button" class="!rounded-button text-custom hover:bg-gray-100 p-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="!rounded-button text-red-600 hover:bg-gray-100 p-2"> <i
                                class="fas fa-trash"></i>
                        </button>
                        <a href="{{ route('events.show', $event->id) }}" class="text-blue-500">Voir plus</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $events->links() }}
    @endsection