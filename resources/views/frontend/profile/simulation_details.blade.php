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
                        <div class="text-white/60 mb-1 text-sm">Estimation Totale TTC</div>
                        <div class="text-4xl font-bold mono text-[#ff8400]">
                            {{ number_format($simulation->total_amount_ttc, 0, ',', ' ') }} F
                        </div>
                        <div class="text-[10px] text-white/40 mt-1 uppercase tracking-widest">Valeur indicative moyenne</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Info Column -->
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-[#162064] mb-4 text-sm uppercase tracking-wider">Configuration</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between items-center"><span class="text-gray-500">Surface</span><span class="font-bold mono">{{ number_format($simulation->input_quantity, 0) }} m²</span></div>
                            <div class="flex justify-between items-center"><span class="text-gray-500">Niveaux</span><span class="font-bold">R+{{ ($config['dimensions']['niveaux'] ?? 1) - 1 }}</span></div>
                            <div class="flex justify-between items-center"><span class="text-gray-500">Sous-sol</span><span class="font-bold">{{ $config['dimensions']['ssSol'] ?? 0 }}</span></div>
                            <div class="flex justify-between items-center"><span class="text-gray-500">Zone</span><span class="font-bold text-xs text-right">{{ $zoneLabels[$config['zone'] ?? ''] ?? 'N/A' }}</span></div>
                            <div class="flex justify-between items-center"><span class="text-gray-500">Sol</span><span class="font-bold text-blue-600 text-xs text-right">{{ $solLabels[$config['sol'] ?? ''] ?? 'N/A' }}</span></div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-[#162064] mb-4 text-sm uppercase tracking-wider">Options & Énergie</h3>
                        <div class="space-y-4">
                           @if($config['options']['solaire'] ?? false)
                              <div class="p-3 bg-blue-50 rounded-xl border border-blue-100">
                                 <div class="text-[9px] font-bold text-blue-600 uppercase mb-1">Système Solaire</div>
                                 <div class="text-xs font-bold text-[#162064]">{{ $config['options']['solaire'] }} kWc</div>
                              </div>
                           @endif
                           @if($config['options']['groupe'] ?? false)
                              <div class="p-3 bg-orange-50 rounded-xl border border-orange-100">
                                 <div class="text-[9px] font-bold text-orange-600 uppercase mb-1">Groupe Électrogène</div>
                                 <div class="text-xs font-bold text-[#162064]">{{ $config['options']['groupe'] }} kVA</div>
                              </div>
                           @endif
                           <div class="flex flex-wrap gap-1.5 pt-2">
                                @foreach($config['options'] ?? [] as $key => $val)
                                    @if($val && $val !== 'non' && !in_array($key, ['solaire', 'groupe']))
                                        <span class="px-2 py-1 bg-gray-50 text-gray-500 rounded text-[9px] font-bold uppercase border border-gray-100">
                                            {{ str_replace('_', ' ', $key) }}
                                        </span>
                                    @endif
                                @endforeach
                           </div>
                        </div>
                    </div>
                </div>

                <!-- Posts Column -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                        <h3 class="text-xl font-bold text-[#162064] mb-6">Détail du budget (Postes V5)</h3>
                        <div class="space-y-3">
                            @if(isset($config['details']) && count($config['details']) > 0)
                                @foreach($config['details'] as $poste)
                                    <div class="flex justify-between items-center border-b border-gray-50 pb-3">
                                        <div class="flex-1">
                                            <div class="text-sm font-bold text-gray-800">{{ $poste['nom'] }}</div>
                                            <div class="text-[10px] text-gray-500 italic">{{ $poste['detail'] ?? '' }}</div>
                                        </div>
                                        <div class="text-right ml-4">
                                            <div class="text-xs mono font-bold text-gray-400">{{ number_format($poste['min'], 0, ',', ' ') }} F</div>
                                            <div class="text-sm mono font-black text-[#162064]">{{ number_format($poste['max'], 0, ',', ' ') }} F</div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-10 text-gray-400 italic">Détails non disponibles.</div>
                            @endif
                        </div>

                        <div class="mt-10 p-5 bg-blue-900 rounded-2xl text-white">
                           <div class="flex justify-between items-end">
                              <div>
                                 <div class="text-[10px] text-blue-300 uppercase font-bold mb-1">Total Estimatif HTVA</div>
                                 <div class="text-2xl font-bold mono">{{ number_format($simulation->base_amount, 0, ',', ' ') }} F</div>
                              </div>
                              <div class="text-right">
                                 <div class="text-[10px] text-blue-300 uppercase font-bold mb-1">Catégorie</div>
                                 <div class="font-bold">CONFORME V5.1</div>
                              </div>
                           </div>
                        </div>

                        <div class="mt-6 text-[10px] text-gray-400 leading-relaxed italic border-t pt-4">
                            * Les prix indiqués incluent les frais généraux, les assurances et les honoraires d'études forfaitaires. 
                            Cette estimation est basée sur les tarifs AIAE V5 (Février 2026).
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
