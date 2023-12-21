
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Categories ')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-l text-gray-500">#</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Noms')</th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($categories as $categorie)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $categorie->id }}</td>
                        <td class="px-4 py-4">{{ $categorie->nom }}</td>
                        <x-link-button href="{{ route('Categorie.show', $categorie->id) }}">
                            @lang('Voir')
                        </x-link-button>
                        <x-link-button href="{{ route('Categorie.edit', $categorie->id) }}">
                            @lang('Modifier')
                        </x-link-button>
                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $categorie->id }}').submit();">
                            @lang('Supprimer')
                        </x-link-button>
                        <form id="destroy{{ $categorie->id }}" action="{{ route('Categorie.destroy', $categorie->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
</x-app-layout>