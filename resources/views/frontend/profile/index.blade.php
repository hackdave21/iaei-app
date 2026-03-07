@extends('layouts.frontend')

@section('title', 'Mon Espace - AIAE')

@section('styles')
<style>
    .profile-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .status-badge {
        font-size: 10px;
        text-transform: uppercase;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 99px;
    }
    .nav-link-active {
        color: #162064;
        font-weight: 700;
        border-bottom: 2px solid #162064;
    }
    #navBar {
        background-color: #162064 !important;
        backdrop-filter: none !important;
    }
</style>
@endsection

@section('content')
<div class="min-h-screen pt-40 pb-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar -->
            <div class="w-full md:w-1/3 lg:w-1/4">
                <div class="bg-white rounded-3xl p-8 profile-card shadow-xl sticky top-40">
                    <div class="text-center mb-8">
                        <div class="w-24 h-24 bg-[#162064]/10 rounded-full flex items-center justify-center mx-auto mb-4 text-[#162064] text-3xl font-bold font-FuturaStdMedium">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <h2 class="text-xl font-bold text-[#162064]">{{ $user->name }}</h2>
                        <p class="text-gray-500 text-sm italic">Client Privilège</p>
                    </div>

                    <nav class="space-y-2">
                        <a href="{{ route('profile') }}" class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 text-[#162064] font-bold transition-all">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            Mon Profil
                        </a>
                        <a href="{{ route('simulator.index') }}" class="flex items-center gap-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 hover:text-[#162064] transition-all">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg>
                            Nouvelle Simulation
                        </a>
                        <hr class="my-4 border-gray-100">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 p-3 rounded-xl text-red-500 hover:bg-red-50 transition-all font-medium">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                Déconnexion
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 space-y-8">
                <!-- Info Section -->
                <div class="bg-white rounded-3xl p-8 profile-card shadow-xl">
                    <h3 class="text-2xl font-bold text-[#162064] mb-6 font-FuturaStdMedium">Mes Informations</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <span class="text-gray-400 text-xs uppercase font-bold tracking-widest block mb-1">Email</span>
                            <div class="text-gray-800 font-medium">{{ $user->email }}</div>
                        </div>
                        <div>
                            <span class="text-gray-400 text-xs uppercase font-bold tracking-widest block mb-1">Téléphone</span>
                            <div class="text-gray-800 font-medium">{{ $user->phone ?? 'Non renseigné' }}</div>
                        </div>
                    </div>
                </div>

                <!-- History Section -->
                <div class="bg-white rounded-3xl p-8 profile-card shadow-xl">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-[#162064] font-FuturaStdMedium">Historique des simulations</h3>
                        <span class="bg-[#162064]/10 text-[#162064] px-4 py-1 rounded-full text-xs font-bold">{{ count($simulations) }} Simulation(s)</span>
                    </div>

                    @if(count($simulations) > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left border-b border-gray-100">
                                        <th class="pb-4 font-bold text-gray-400 text-xs uppercase tracking-widest">Date</th>
                                        <th class="pb-4 font-bold text-gray-400 text-xs uppercase tracking-widest">Type</th>
                                        <th class="pb-4 font-bold text-gray-400 text-xs uppercase tracking-widest">Estimation</th>
                                        <th class="pb-4 font-bold text-gray-400 text-xs uppercase tracking-widest">Statut</th>
                                        <th class="pb-4 font-bold text-gray-400 text-xs uppercase tracking-widest text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($simulations as $sim)
                                        <tr>
                                            <td class="py-5 text-gray-600 text-sm italic">{{ $sim->created_at->format('d/m/Y') }}</td>
                                            <td class="py-5">
                                                <div class="font-bold text-[#162064]">{{ $sim->type_batiment ?? 'N/A' }}</div>
                                                <div class="text-[10px] text-gray-400">{{ $sim->surface }} m² - {{ $sim->secteur }}</div>
                                            </td>
                                            <td class="py-5">
                                                <div class="font-bold text-[#ff8400] mono text-sm">{{ number_format($sim->prix_total, 0, ',', ' ') }} F</div>
                                            </td>
                                            <td class="py-5">
                                                <span class="status-badge bg-green-100 text-green-700">Enregistré</span>
                                            </td>
                                            <td class="py-5 text-right">
                                                <a href="#" class="text-[#162064] hover:text-[#ff8400] transition-colors inline-flex items-center gap-1 font-bold text-xs uppercase">
                                                    Détails
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12 bg-gray-50 rounded-2xl">
                            <p class="text-gray-500 italic mb-4">Vous n'avez pas encore effectué de simulation enregistrée.</p>
                            <a href="{{ route('simulator.index') }}" class="inline-flex items-center gap-2 bg-[#162064] text-white px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-wider hover:bg-[#ff8400] transition-all">
                                Commencer une estimation
                            </a>
                        </div>
                    @endif
                </div>
                
                <!-- Security Note -->
                <div class="p-6 rounded-2xl border-2 border-dashed border-[#162064]/20 bg-[#162064]/5 text-center">
                    <p class="text-xs text-gray-500">
                        Besoin d'aide pour interpréter vos estimations ? Contactez notre équipe technique via le formulaire de 
                        <a href="#" class="text-[#162064] font-bold underline">contact</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
