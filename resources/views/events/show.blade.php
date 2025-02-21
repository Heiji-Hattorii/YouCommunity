@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $event->title }}</h1>
        <p class="text-gray-700 mb-2"><strong>Date :</strong> {{ $event->date_heure }}</p>
        <p class="text-gray-700 mb-2"><strong>Lieu :</strong> {{ $event->lieu }}</p>
        <p class="text-gray-700 mb-2"><strong>Description :</strong> {{ $event->description }}</p>
        <p class="text-gray-700 mb-2"><strong>Participants max :</strong> {{ $event->max_participants }}</p>

        <div class="mt-4">
            <a href="{{ route('events.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Retour</a>
            <a href="{{ route('events.edit', $event->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Modifier</a>
        </div>
    </div>
</div>
@endsection
