
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Entrées ')
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
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Produits')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Quantités')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Prix')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Dates')</th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($entrees as $entree)
                      <tr class="whitespace-nowrap">
                          <td class="px-4 py-4 text-sm text-gray-500">{{ $entree->id }}</td>
                          <td class="px-4 py-4">
                              @foreach($produits as $produit)
                                  @if ($produit->id == $entree->produit_id)
                                  {{ $produit->libelle }}
                                  @endif
                              @endforeach
                          </td>
                        <td class="px-4 py-4">{{ $entree->quantite }}</td>
                        <td class="px-4 py-4">{{ $entree->prix }}</td>
                        <td class="px-4 py-4">{{ $entree->date }}</td>
                        <x-link-button href="{{ route('Entree.show', $entree->id) }}">
                            @lang('Voir')
                        </x-link-button>
                        <x-link-button href="{{ route('Entree.edit', $entree->id) }}">
                            @lang('Modifier')
                        </x-link-button>
                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $entree->id }}').submit();">
                            @lang('Supprimer')
                        </x-link-button>
                        <form id="destroy{{ $entree->id }}" action="{{ route('Entree.destroy', $entree->id) }}" method="POST" style="display: none;">
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