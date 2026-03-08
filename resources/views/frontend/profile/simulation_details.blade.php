@extends('layouts.frontend')

@section('title', 'Détails Simulation - AIAE')

@section('styles')
<style>
    .details-card {
        background: white;
        border-radius: 2xl;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    .mono { font-family: 'JetBrains Mono', monospace; }
    .status-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 99px;
    }
    #navBar { background-color: #162064 !important; }
</style>
@endsection

@section('content')
<div class="min-h-screen pt-40 pb-20 px-4 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button & Title -->
        <div class="flex items-center justify-between mb-8">
            <a href="{{ route('profile') }}" class="flex items-center gap-2 text-gray-500 hover:text-[#162064] transition-colors font-bold">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Retour à l'historique
            </a>
            <div class="flex items-center gap-3">
                <span class="status-badge bg-blue-100 text-blue-700">Réf: {{ $simulation->reference_id }}</span>
                <button onclick="window.print()" class="p-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 00-2 2h2m2 4h10a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                </button>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Header Summary -->
            <div class="bg-[#162064] text-white rounded-3xl p-8 shadow-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h1 class="text-3xl font-bold mb-2">{{ $typeLabels[$config['typeBat']] ?? $config['typeBat'] }}</h1>
                        <p class="text-white/70 text-sm">Réalisée le {{ $simulation->created_at->format('d/m/Y à H:i') }}</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white/10 rounded-lg text-xs">{{ $secteurLabels[$config['secteur']] ?? $config['secteur'] }}</span>
                            <span class="px-3 py-1 bg-white/10 rounded-lg text-xs">{{ ucfirst($config['standing'] ?? 'Standard') }}</span>
                            <span class="px-3 py-1 bg-white/10 rounded-lg text-xs">{{ $zoneLabels[$config['zone']] ?? $config['zone'] }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-white/60 mb-1 text-sm">Estimation Totale (Min-Max)</div>
                        <div class="text-3xl md:text-4xl font-bold mono text-[#ff8400]">
                            {{ number_format($simulation->total_amount_ttc * 0.9, 0, ',', ' ') }} — {{ number_format($simulation->total_amount_ttc * 1.15, 0, ',', ' ') }} F
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Info Column -->
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-[#162064] mb-4">Configuration</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between"><span class="text-gray-500">Surface</span><span class="font-bold">{{ $config['dimensions']['surface'] ?? 0 }} m²</span></div>
                            <div class="flex justify-between"><span class="text-gray-500">Niveaux</span><span class="font-bold">R+{{ ($config['dimensions']['niveaux'] ?? 1) - 1 }}</span></div>
                            @if(isset($config['dimensions']['catHotel']))
                                <div class="flex justify-between"><span class="text-gray-500">Classe Hôtel</span><span class="font-bold border-b border-blue-200">{{ strtoupper($config['dimensions']['catHotel']) }}</span></div>
                            @endif
                            @if(isset($config['dimensions']['hauteurLibre']))
                                <div class="flex justify-between"><span class="text-gray-500">H. Libre</span><span class="font-bold">{{ $config['dimensions']['hauteurLibre'] }} m</span></div>
                            @endif
                            <div class="flex justify-between"><span class="text-gray-500">Sol</span><span class="font-bold text-blue-600">{{ $solLabels[$config['sol']] ?? $config['sol'] }}</span></div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-[#162064] mb-4">Options Choisies</h3>
                        <div class="flex flex-wrap gap-2">
                            @php $hasOptions = false; @endphp
                            @foreach($config['options'] as $key => $val)
                                @if($val && $val !== 'non')
                                    @php $hasOptions = true; @endphp
                                    <span class="px-2 py-1 bg-gray-50 text-gray-700 rounded text-[10px] font-bold uppercase border border-gray-100">
                                        {{ str_replace('_', ' ', $key) }}: {{ $optionLabels[$val] ?? (is_bool($val) ? 'Oui' : $val) }}
                                    </span>
                                @endif
                            @endforeach
                            @if(!$hasOptions)
                                <span class="text-gray-400 text-xs italic">Aucune option spécifique</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Posts Column -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                        <h3 class="text-xl font-bold text-[#162064] mb-6">Détails des postes de coût</h3>
                        <div class="space-y-4">
                            @if(isset($config['details']) && count($config['details']) > 0)
                                @foreach($config['details'] as $poste)
                                    <div class="flex justify-between items-center border-b border-gray-50 pb-3 {{ ($poste['accent'] ?? false) ? 'bg-orange-50 -mx-2 px-2 py-2 rounded' : '' }}">
                                        <div>
                                            <div class="text-sm font-bold {{ ($poste['accent'] ?? false) ? 'text-orange-900' : 'text-gray-800' }}">{{ $poste['nom'] ?? $poste['label'] }}</div>
                                            <div class="text-[10px] text-gray-500">{{ $poste['description'] ?? '' }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-sm mono font-bold {{ ($poste['accent'] ?? false) ? 'text-orange-700' : 'text-[#162064]' }}">{{ $poste['val'] ?? number_format($poste['montant'] ?? 0, 0, ',', ' ') . ' F' }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-10 text-gray-400 italic">
                                    Détails non disponibles pour cette simulation.
                                </div>
                            @endif
                        </div>

                        @if(isset($config['energy']))
                            <!-- Energy Summary -->
                            <div class="mt-8 pt-8 border-t border-gray-100">
                                <h3 class="text-sm font-bold text-[#162064] mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                                    Besoins Énergétiques Estimés
                                </h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="text-[10px] text-gray-500 uppercase font-bold">Éclairage</div>
                                        <div class="text-lg font-bold mono text-[#162064]">{{ $config['energy']['lum'] ?? '0' }} <span class="text-[10px]">kW</span></div>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="text-[10px] text-gray-500 uppercase font-bold">Prises</div>
                                        <div class="text-lg font-bold mono text-[#162064]">{{ $config['energy']['prises'] ?? '0' }} <span class="text-[10px]">kW</span></div>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="text-[10px] text-gray-500 uppercase font-bold">Clim</div>
                                        <div class="text-lg font-bold mono text-[#162064]">{{ $config['energy']['clim'] ?? '0' }} <span class="text-[10px]">kW</span></div>
                                    </div>
                                    <div class="bg-[#162064] p-3 rounded-lg text-white">
                                        <div class="text-[10px] text-white/70 uppercase font-bold">Total Estimé</div>
                                        <div class="text-lg font-bold mono">{{ $config['energy']['total'] ?? '0' }} <span class="text-[10px]">kVA</span></div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="mt-10 p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Note Importante</h4>
                            <p class="text-[11px] text-gray-500 leading-relaxed">
                                Les estimations fournies sont à titre indicatif et ne constituent pas un devis contractuel. 
                                Les prix peuvent varier selon l'étude géotechnique réelle et l'évolution du coût des matériaux.
                                Contactez AIAE pour une étude technique approfondie.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
