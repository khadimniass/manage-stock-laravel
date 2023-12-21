<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <a class="font-semibold text-xl text-gray-800" href="{{route('Role.create')}}">
                            <div class="p-6 bg-white border-b border-gray-200">
                                Ajouter des Roles
                            </div>
                        </a>

                        <a class="font-semibold text-xl text-gray-800" href="{{route('Categorie.create')}}">
                            <div class="p-6 bg-white border-b border-gray-200">
                                Ajouter des Catégories
                            </div>
                        </a>

                        <a class="font-semibold text-xl text-gray-800" href="{{route('Produit.create')}}">
                            <div class="p-6 bg-white border-b border-gray-200">
                                Ajouter des Produits
                            </div>
                        </a>

                        <a class="font-semibold text-xl text-gray-800" href="{{route('Entree.create')}}">
                            <div class="p-6 bg-white border-b border-gray-200">
                                Ajouter des Entrées
                            </div>
                        </a>

                        <a class="font-semibold text-xl text-gray-800" href="{{route('Sortie.create')}}">
                            <div class="p-6 bg-white border-b border-gray-200">
                                Ajouter des Sorties
                                </div>
                        </a>
               </div>
        </div>
    </div>
</x-app-layout>
