@extends('layouts.app')

@section('content')
@if(isset($message))
        <p>{{ $message }}</p>
    @endif

<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-medium text-gray-900">Mes Evenements</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
        <div class="border rounded-lg overflow-hidden">
            <img src="{{ asset($event->image_path) }}" class="w-full h-48 object-cover" alt="Formation">
            <div class="p-4">
                <h3 class="text-lg font-medium text-gray-900">{{ $event->titre }}</h3>
                <p class="text-sm text-gray-500 mt-1">
                    <i class="far fa-calendar mr-2"></i>{{ $event->date_heure }}
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    <i class="fas fa-map-marker-alt mr-2"></i>{{ $event->lieu }}
                </p>
                <div class="mt-4 flex justify-between items-center">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        <i class="fas fa-users mr-1"></i>5/{{ $event->max_participants }} places
                    </span>
                    <div class="flex space-x-2">
                        <button type="button" onclick="openEditModal({{ $event }})"
                            class="!rounded-button text-custom hover:bg-gray-100 p-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" onclick="openDeleteModal({{ $event->id }})"
                            class="!rounded-button text-red-600 hover:bg-gray-100 p-2">
                            <i class="fas fa-trash"></i>
                        </button>
                        <a href="{{ route('events.show', $event->id) }}" class="text-blue-500">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    {{ $events->links() }}
</div>


<div id="deleteModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Supprimer l'événement</h2>
        <p class="mb-4">Êtes-vous sûr de vouloir supprimer cet événement ?</p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-gray-500 text-white rounded">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Supprimer</button>
            </div>
        </form>
    </div>
</div>

<div id="editModal"
    class="hidden fixed min-h-[100vh] inset-0 bg-gray-300 bg-opacity-75 flex justify-center items-center">
    <form id="editForm" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 ">
            <div>
                <label class="block text-sm font-medium text-gray-700">Titre de l'événement</label>
                <input type="text" id="editTitre" name="titre"
                    class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                    placeholder="Saisissez le titre">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Date et heure</label>
                <input type="datetime-local" id="editDate" name="date_heure"
                    class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Lieu</label>
                <input type="text" id="editLieu" name="lieu"
                    class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                    placeholder="Adresse de l'événement">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Max des participants</label>
                <input type="number" id="editMaxParticipants" name="max_participants"
                    class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                    placeholder="Max des participants">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="categorie" id="editCategorie"
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
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea rows="4" class="mt-1 block w-full border-gray-300 focus:border-custom focus:ring-custom"
                    placeholder="Décrivez votre événement" name="description" id="editDescription"></textarea>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Image de l'événement</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                    <div class="flex text-sm text-gray-600">
                        <label
                            class="relative cursor-pointer bg-white rounded-md font-medium text-custom hover:text-custom/90">
                            <span>Télécharger un fichier</span>
                            <input type="file" name="image_path" accept="image/*" class="sr-only">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="!rounded-button bg-custom bg-white px-4 py-2 text-black text-sm font-medium hover:bg-green ">
                Enregistrer l'événement
            </button>
        </div>
    </form>
</div>

<script>
function openDeleteModal(eventId) {
    document.getElementById("deleteModal").classList.remove("hidden");
    document.getElementById("deleteForm").action = "/events/" + eventId;
}

function closeDeleteModal() {
    document.getElementById("deleteModal").classList.add("hidden");
}

function openEditModal(event) {
    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("editTitre").value = event.titre;
    document.getElementById("editDate").value = event.date_heure;
    document.getElementById("editLieu").value = event.lieu;
    document.getElementById("editMaxParticipants").value = event.max_participants;
    document.getElementById("editCategorie").value = event.categorie;
    document.getElementById("editDescription").value = event.description;
    document.getElementById("editForm").action = "/events/" + event.id;
}

function closeEditModal() {
    document.getElementById("editModal").classList.add("hidden");
}
</script>
@endsection