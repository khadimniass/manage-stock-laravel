<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Détails d\'Entrées')
        </h2>
    </x-slot>

    <x-div-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom du Produite')</h3>
        <p>
            @foreach($produits as $produit)
                @if ($produit->id == $entree->produit_id)
                {{ $produit->libelle }}
                @endif
            @endforeach
        </p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Quantité')</h3>
        <p>{{ $entree->quantite }}</p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Prix')</h3>
        <p>{{ $entree->prix }}</p> 
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date d entrée')</h3>
        <p>{{ $entree->created_at->format('d/m/Y') }}</p>
        @if($entree->created_at != $entree->updated_at)
          <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last update')</h3>
          <p>{{ $entree->updated_at->format('d/m/Y') }}</p>
        @endif
    </x-div-card>
</x-app-layout>