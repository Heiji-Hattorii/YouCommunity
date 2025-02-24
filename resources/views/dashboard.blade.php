<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center w-[100%]">
    <div class="grid grid-cols-[60%40%] gap-20 m-6 w-[80%] justify-center ">

        <div >
            <div class="bg-white my-4 p-6 rounded-lg border border-gray-200 ">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Utilisateurs totaux</p>
                        <p class="text-2xl pt-4 font-semibold mt-1">2,451</p>
                    </div>
                    <div class="w-12 h-12 bg-custom/10 rounded-lg flex items-center justify-center"> <i
                            class="fas fa-users text-custom"></i>
                    </div>
                </div>

            </div>
            <div class="bg-white my-4 p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total événements</p>
                        <p class="text-2xl pt-4 font-semibold mt-1">145</p>
                    </div>
                    <div class="w-12 h-12 bg-custom/10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar text-custom"></i>
                    </div>
                </div>

            </div>
            <div class="bg-white my-4 p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total commentaires</p>
                        <p class="text-2xl pt-4  font-semibold mt-1">892</p>
                    </div>
                    <div class="w-12 h-12 bg-custom/10 rounded-lg flex items-center justify-center"> <i
                            class="fas fa-comments text-custom"></i>
                    </div>
                </div>
                <p class="text-sm text-red-600 mt-4 flex items-center">
                </p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold">Distribution des événements</h3>
            </div>
            <canvas id="eventDistributionChart" class="h-64 w-[80%]"></canvas>
        </div>

    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const eventDistributionData = {
        labels: ['Sport', 'Culture', 'Musique', 'Art', 'Cuisine', 'Jeu'],
        datasets: [{
            label: 'Distribution des événements',
            data: [1048, 735, 580, 484, 300],
            backgroundColor: ['#4F46E5', '#34D399', '#F59E0B', '#EF4444', '#9CA3AF'],
            borderColor: '#fff',
            borderWidth: 2
        }]
    };

    const eventDistributionOptions = {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw;
                    }
                }
            }
        }
    };
    const ctx = document.getElementById('eventDistributionChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: eventDistributionData,
        options: eventDistributionOptions
    });
    </script>
</x-app-layout>