// resources/views/components/event.blade.php

<div class="border rounded-lg overflow-hidden">
    <img src="{{ $image }}" class="w-full h-48 object-cover" alt="Formation">
    <div class="p-4">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
        <p class="text-sm text-gray-500 mt-1">
            <i class="far fa-calendar mr-2"></i>{{ $date }}
        </p>
        <p class="text-sm text-gray-500 mt-1">
            <i class="fas fa-map-marker-alt mr-2"></i>{{ $location }}
        </p>
        <div class="mt-4 flex justify-between items-center">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                <i class="fas fa-users mr-1"></i>{{ $participants }} / {{ $maxParticipants }} places
            </span>
            <div class="flex space-x-2">
                {{ $slot }} <!-- Le slot sera ici pour insérer des boutons personnalisés -->
            </div>
        </div>
    </div>
</div>
