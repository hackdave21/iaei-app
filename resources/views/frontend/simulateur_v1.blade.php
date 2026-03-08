@extends('layouts.frontend')

@section('title', 'Simulateur - Estimation Construction')

@section('styles')
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --bleu: #162064;
      --vert: #05482C;
      --orange: #FF8400
    }

    body {
      margin: 0;
      font-family: 'Inter', system-ui, sans-serif;
      background: #f8fafc
    }

    .mono {
      font-family: 'JetBrains Mono', monospace
    }

    .card {
      background: white;
      border: 1px solid #e2e8f0;
      border-radius: 12px
    }

    .btn-primary {
      background: var(--orange);
      color: white;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      border: none;
      transition: all 0.2s;
    }

    .btn-primary:hover {
      filter: brightness(1.1);
      transform: translateY(-1px);
    }

    .btn-primary:disabled {
      background: #e5e7eb;
      color: #9ca3af;
      cursor: not-allowed;
      transform: none;
    }

    .option-btn {
      padding: 16px;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      text-align: left;
      cursor: pointer;
      transition: all 0.2s;
      background: white;
      width: 100%;
    }

    .option-btn:hover {
      border-color: #cbd5e1;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1)
    }

    .option-btn.selected {
      border-color: #3b82f6;
      background: #eff6ff
    }

    .badge {
      display: inline-flex;
      align-items: center;
      padding: 2px 8px;
      border-radius: 6px;
      font-size: 11px;
      font-weight: 600
    }

    .badge-blue { background: #dbeafe; color: #1e40af }
    .badge-gray { background: #f3f4f6; color: #374151 }

    .input-num {
      display: flex;
      align-items: center;
      background: white;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      overflow: hidden;
      width: 140px;
    }

    .input-num button {
      width: 40px;
      height: 40px;
      border: none;
      background: #f8fafc;
      cursor: pointer;
      font-size: 18px
    }

    .input-num .value {
      flex: 1;
      text-align: center;
      font-weight: 600;
      font-family: 'JetBrains Mono', monospace;
    }

    /* Force Navbar background color for this page */
    #navBar {
      background-color: var(--bleu) !important;
      backdrop-filter: none !important;
    }
  </style>
@endsection

@section('content')
  <div class="pt-32 pb-20 px-4">
    <div class="max-w-5xl mx-auto">
      
      <!-- Progress Bar -->
      <div id="progress-container" class="mb-10 flex justify-between items-center relative">
        <div class="absolute h-1 bg-gray-200 top-1/2 -translate-y-1/2 left-0 right-0 z-0"></div>
        <div id="progress-bar" class="absolute h-1 bg-blue-600 top-1/2 -translate-y-1/2 left-0 z-0 transition-all duration-500" style="width: 0%"></div>
        
        <div class="step-dot active z-10 w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm">1</div>
        <div class="step-dot z-10 w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold text-sm">2</div>
        <div class="step-dot z-10 w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold text-sm">3</div>
        <div class="step-dot z-10 w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold text-sm">4</div>
        <div class="step-dot z-10 w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold text-sm">5</div>
      </div>

      <!-- STEP 1: TYPE DE PROJET -->
      <section id="step-1" class="step-content">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Type de projet (<span id="display-secteur">{{ $secteur }}</span>)</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8" id="types-container">
          <!-- JS Rendered -->
        </div>

        <!-- V8.1: Hôtel Stars (Only if Tertiaire + Hôtel) -->
        <div id="hotel-stars-panel" class="hidden card p-6 mb-8 border-blue-100 bg-blue-50/30">
            <h3 class="font-semibold text-[#162064] mb-4 flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                Classification Hôtelière
            </h3>
            <div class="grid grid-cols-3 md:grid-cols-6 gap-2">
                @foreach(['1s' => '★', '2s' => '★★', '3s' => '★★★', '4s' => '★★★★', '5s' => '★★★★★', 'palace' => 'Palace'] as $code => $label)
                    <button onclick="setHotelStar('{{ $code }}')" id="star-{{ $code }}" class="star-btn px-2 py-3 rounded-xl border border-gray-200 text-xs font-bold hover:border-[#162064] hover:text-[#162064] transition-all bg-white">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>
        
        <div id="standing-container" class="hidden">
           <div class="card p-6 mb-8">
              <h3 class="font-semibold text-gray-700 mb-4">Standing souhaité</h3>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-3" id="standings-grid">
                  <!-- JS Rendered -->
              </div>
           </div>
        </div>
      </section>

      <!-- STEP 2: LOCALISATION -->
      <section id="step-2" class="step-content hidden">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Localisation et Terrain</h2>
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="card p-6">
                <h3 class="font-semibold text-gray-700 mb-4">Zone géographique</h3>
                <div class="space-y-3" id="zones-container">
                    <!-- JS Rendered -->
                </div>
            </div>
            <div class="card p-6">
                <h3 class="font-semibold text-gray-700 mb-4">Type de sol</h3>
                <div class="grid grid-cols-1 gap-2" id="sols-container">
                    <!-- JS Rendered -->
                </div>
            </div>
        </div>
      </section>

      <!-- STEP 3: DIMENSIONS (Placeholder logic for now, keeping it simple) -->
      <section id="step-3" class="step-content hidden">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Dimensions du bâtiment</h2>
        <div class="card p-6 mb-8">
            <div class="grid md:grid-cols-2 gap-10">
                <div>
                  <h3 class="font-semibold text-gray-700 mb-4">Emprise au sol</h3>
                  <div class="space-y-6">
                      <div class="flex justify-between items-center">
                          <span class="text-gray-600">Longueur (m)</span>
                          <div class="input-num">
                              <button onclick="changeDim('dimA', -5)">−</button>
                              <div class="value" id="val-dimA">30</div>
                              <button onclick="changeDim('dimA', 5)">+</button>
                          </div>
                      </div>
                      <div class="flex justify-between items-center">
                          <span class="text-gray-600">Largeur (m)</span>
                          <div class="input-num">
                              <button onclick="changeDim('dimB', -5)">−</button>
                              <div class="value" id="val-dimB">20</div>
                              <button onclick="changeDim('dimB', 5)">+</button>
                          </div>
                      </div>
                      <div class="pt-4 border-t">
                          <div class="flex justify-between text-sm text-gray-500">
                              <span>Surface terrain</span>
                              <span class="font-bold text-gray-800"><span id="val-surf">600</span> m²</span>
                          </div>
                      </div>
                  </div>
                </div>
                <div>
                  <h3 class="font-semibold text-gray-700 mb-4">Nombre de niveaux</h3>
                  <div class="flex items-center gap-4 mb-6">
                      <div class="input-num">
                          <button onclick="changeDim('niveaux', -1)">−</button>
                          <div class="value" id="val-niveaux">1</div>
                          <button onclick="changeDim('niveaux', 1)">+</button>
                      </div>
                      <span class="text-sm text-gray-500">(R+<span id="label-etages">0</span>)</span>
                  </div>
                  <div class="info-box bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500 text-sm text-blue-800">
                      La surface totale bâtie estimée est de <span class="font-bold"><span id="val-surfBatie">0</span> m²</span>.
                  </div>
                </div>
            </div>
        </div>

        <!-- V8.1: Industrial & Agricole Features -->
        <div id="sector-features-panel" class="hidden card p-6 mb-8 border-orange-100 bg-orange-50/20">
            <div id="industrial-addon" class="hidden space-y-6">
                <h3 class="font-semibold text-gray-700">Spécifications Industrielles</h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Hauteur Libre (m)</span>
                        <div class="input-num">
                            <button onclick="changeDim('hauteurLibre', -1)">−</button>
                            <div class="value" id="val-hauteur">8</div>
                            <button onclick="changeDim('hauteurLibre', 1)">+</button>
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" onchange="state.pontRoulant=this.checked; calculate();" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-sm font-medium text-gray-700 group-hover:text-blue-600 transition-colors">Pont roulant</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" onchange="state.groupeFroid=this.checked; calculate();" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-sm font-medium text-gray-700 group-hover:text-blue-600 transition-colors">Groupe froid</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div id="agricole-addon" class="hidden">
                <h3 class="font-semibold text-gray-700 mb-4">Effectif Élevage</h3>
                <div class="flex justify-between items-center bg-white p-4 rounded-xl border border-gray-100">
                    <span class="text-gray-600">Nombre de sujets / têtes</span>
                    <div class="input-num">
                        <button onclick="changeDim('effectif', -10)">−</button>
                        <div class="value" id="val-effectif">50</div>
                        <button onclick="changeDim('effectif', 10)">+</button>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!-- STEP 4: OPTIONS -->
      <section id="step-4" class="step-content hidden">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 font-FuturaStdMedium">Équipements et Options</h2>
        <div class="grid md:grid-cols-2 gap-6 mb-8">
           <!-- SÉCURITÉ -->
           <div class="card p-6">
              <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                Sécurité & Surveillance
              </h3>
              <div class="space-y-4">
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Alarme</span>
                    <div class="space-y-2 mt-2" id="alarme-container"></div>
                  </div>
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Vidéosurveillance</span>
                    <div class="space-y-2 mt-2" id="video-container"></div>
                  </div>
              </div>
           </div>

           <!-- DOMOTIQUE -->
           <div class="card p-6">
              <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                Maison Intelligente
              </h3>
              <div class="space-y-2" id="domotique-container"></div>
           </div>

           <!-- EXTERIEUR & EAU -->
           <div class="card p-6">
              <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                Aménagement & Eau
              </h3>
              <div class="space-y-4">
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Clôture</span>
                    <div class="space-y-2 mt-2" id="cloture-container"></div>
                  </div>
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Portail</span>
                    <div class="space-y-2 mt-2" id="portail-container"></div>
                  </div>
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Piscine</span>
                    <div class="space-y-2 mt-2" id="piscine-container"></div>
                  </div>
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Citerne Eau de Pluie</span>
                    <div class="space-y-2 mt-2" id="citerne-container"></div>
                  </div>
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Aménagement Paysager</span>
                    <div class="space-y-2 mt-2" id="paysager-container"></div>
                  </div>
              </div>
           </div>

           <!-- ÉNERGIE & AUTRES -->
           <div class="card p-6">
              <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                Énergie & Finitions
              </h3>
              <div class="space-y-4">
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Solaire</span>
                    <div class="space-y-2 mt-2" id="solaire-container"></div>
                  </div>
                  <hr>
                  <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Volets Roulants</span>
                    <div class="space-y-2 mt-2" id="volets-container"></div>
                  </div>
                  <label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                      <span class="font-medium">Forage d'eau</span>
                      <input type="checkbox" onchange="toggleOption('forage', true)" class="w-5 h-5">
                  </label>
              </div>
           </div>
        </div>
      </section>

      <!-- STEP 5: RÉSULTATS -->
      <section id="step-5" class="step-content hidden">
          @auth
            <div id="results-view">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Estimation de votre projet</h2>
                <div class="card p-8 mb-8" style="background: linear-gradient(135deg, #162064 0%, #1e3a8a 100%)">
                    <div class="text-center text-white">
                        <div class="text-white/70 mb-2">Budget estimé (Clé en main)</div>
                        <div class="text-4xl md:text-5xl font-bold mono" id="total-estimation">
                            --
                        </div>
                    </div>
                </div>
                <div class="card p-6">
                    <h3 class="font-bold mb-4">Détails des postes</h3>
                    <div class="space-y-4" id="postes-details">
                        <!-- JS Rendered -->
                    </div>
                </div>

                <!-- V8.1: BESOIN ÉNERGÉTIQUE -->
                <div class="mt-8 card p-6 border-blue-100 bg-blue-50/10">
                    <div class="flex items-center gap-2 mb-6 text-blue-900">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        <h3 class="text-lg font-bold">Estimation des besoins énergétiques</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white p-4 rounded-xl border border-blue-50">
                            <div class="text-xs text-blue-600 font-bold uppercase mb-1">Éclairage</div>
                            <div class="text-2xl font-bold mono text-blue-900"><span id="energy-lum">--</span> <span class="text-xs">kW</span></div>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-blue-50">
                            <div class="text-xs text-blue-600 font-bold uppercase mb-1">Prises de courants</div>
                            <div class="text-2xl font-bold mono text-blue-900"><span id="energy-prises">--</span> <span class="text-xs">kW</span></div>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-blue-50">
                            <div class="text-xs text-blue-600 font-bold uppercase mb-1">Climatisation</div>
                            <div class="text-2xl font-bold mono text-blue-900"><span id="energy-clim">--</span> <span class="text-xs">kW</span></div>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-blue-50 flex justify-between items-center px-2">
                        <span class="text-sm font-bold text-blue-800">PUISSANCE TOTALE ESTIMÉE</span>
                        <span class="text-xl font-black text-blue-900 mono"><span id="energy-total">--</span> kVA</span>
                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <button onclick="saveSimulation()" class="btn-primary px-10 py-4 text-lg">
                        Enregistrer & Voir mon historique
                    </button>
                </div>
            </div>
          @else
            <div class="text-center py-20 card p-10 bg-white shadow-xl">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 15v2m0 0v2m0-2h2m-2 0H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Connectez-vous pour voir vos résultats</h2>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    Afin de vous fournir une étude détaillée et de sauvegarder votre simulation, vous devez être connecté à votre espace client.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="saveSimulation('login')" class="btn-primary">Se connecter</button>
                    <button onclick="saveSimulation('register')" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold text-center mt-2 sm:mt-0">Créer un compte</button>
                </div>
            </div>
          @endauth
      </section>

      <!-- NAVIGATION BUTTONS -->
      <div id="nav-container" class="flex justify-between items-center mt-8 pt-6 border-t no-print">
        <button id="btn-prev" onclick="moveStep(-1)" class="px-5 py-2.5 text-gray-600 hover:text-gray-800 rounded-lg">
          Retour
        </button>
        <button id="btn-next" onclick="moveStep(1)" class="btn-primary flex items-center gap-2">
          Continuer
        </button>
      </div>

    </div>
  </div>
@endsection

@section('scripts')
  <script>
    // DATA INJECTION
    // DATA INJECTION
    const ZONES = @json($zones->keyBy('code'));
    const SOLS = @json($sols->keyBy('code'));
    const STANDINGS = @json($standings->keyBy('code'));
    const TYPE_BATIMENTS = @json($typeBatiments->keyBy('code'));
    const EQUIP_OPTIONS = @json($equipementOptions->groupBy('categorie'));
    
    const TYPES = {
      residentiel: [
        { id: 'villa', name: 'Villa individuelle', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' },
        { id: 'duplex', name: 'Duplex / Triplex', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' },
        { id: 'immeuble', name: 'Immeuble résidentiel', icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' }
      ],
      tertiaire: [
        { id: 'bureaux', name: 'Bureaux', icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' },
        { id: 'commerce', name: 'Commerce / Boutiques', icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z' },
        { id: 'hotel', name: 'Hôtel / Résidence', icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' }
      ],
      industriel: [
        { id: 'entrepot', name: 'Entrepôt Logistique', icon: 'M19 21V10l-6-3-6 3v11m12 0h-12m12 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-1' },
        { id: 'usine', name: 'Unité de Production', icon: 'M19 21V10l-6-3-6 3v11m12 0h-12m12 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-1' }
      ],
      agricole: [
        { id: 'hangar_agri', name: 'Hangar Agricole', icon: 'M19 21V10l-6-3-6 3v11m12 0h-12m12 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-1' },
        { id: 'ferme_avicole', name: 'Bâtiment d\'élevage', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3' }
      ]
    };

    // STATE
    const state = {
      etape: 1,
      secteur: "{{ $secteur }}",
      typeBat: '',
      standing: 'confort',
      catHotel: '3s',
      forme: 'rect',
      dimA: 30,
      dimB: 20,
      surfManuelle: 600,
      terrainDispo: 'oui',
      zone: 'zone1',
      sol: '',
      niveaux: 1,
      ssSol: 0,
      hspRdc: 3.0,
      hspEtage: 2.8,
      nbChambres: 30,
      espacesHotel: [],
      hauteurLibre: 8,
      pontRoulant: false,
      pontCap: 5,
      groupeFroid: '',
      effectif: 100,
      irrigation: '',
      surfExploit: 5,
      nbAsc: 0,
      nbQuais: 2,
      solaire: '',
      groupe: '',
      alarme: '',
      nbZones: 6,
      video: '',
      acces: '',
      nbPortes: 2,
      cloture: false,
      clotureH: 2,
      portail: '',
      piscine: '',
      forage: false,
      forageProf: 30,
      parkType: '',
      parkPlaces: 0,
      options: {}
    };

    // INIT
    function init() {
      renderTypes();
      renderStandings();
      renderZones();
      renderSols();
      
      // Apply initial standing mapping
      applyStandingMapping(state.standing);

      updateProgress();
      updateUI();
    }

    // STEP NAVIGATION
    function moveStep(delta) {
      if (delta === 1 && state.etape === 5) return;
      if (delta === -1 && state.etape === 1) return;
      
      state.etape += delta;
      
      // Handle hidden sections
      document.querySelectorAll('.step-content').forEach(s => s.classList.add('hidden'));
      document.getElementById('step-' + state.etape).classList.remove('hidden');
      
      if (state.etape === 5) calculate();
      
      updateProgress();
      updateUI();
    }

    function updateProgress() {
      const bar = document.getElementById('progress-bar');
      bar.style.width = ((state.etape - 1) / 4 * 100) + '%';
      
      document.querySelectorAll('.step-dot').forEach((dot, i) => {
        if (i < state.etape) {
          dot.classList.add('bg-blue-600', 'text-white');
          dot.classList.remove('bg-gray-200', 'text-gray-500');
        } else {
          dot.classList.remove('bg-blue-600', 'text-white');
          dot.classList.add('bg-gray-200', 'text-gray-500');
        }
      });
    }

    function updateUI() {
      const btnNext = document.getElementById('btn-next');
      const btnPrev = document.getElementById('btn-prev');
      
      btnPrev.classList.toggle('invisible', state.etape === 1);
      btnNext.innerHTML = state.etape === 5 ? 'Finaliser' : (state.etape === 4 ? 'Voir l\'estimation' : 'Continuer');
      
      // Sector Panel Visibility
      const hotelPanel = document.getElementById('hotel-stars-panel');
      if (hotelPanel) {
          hotelPanel.classList.toggle('hidden', !(state.secteur === 'tertiaire' && state.typeBat === 'hotel' && state.etape === 1));
      }

      const featuresPanel = document.getElementById('sector-features-panel');
      if (featuresPanel) {
          const isShow = (state.secteur === 'industriel' || state.secteur === 'agricole') && state.etape === 3;
          featuresPanel.classList.toggle('hidden', !isShow);
          if (isShow) {
              document.getElementById('industrial-addon').classList.toggle('hidden', state.secteur !== 'industriel');
              document.getElementById('agricole-addon').classList.toggle('hidden', state.secteur !== 'agricole');
          }
      }

      // Star highlighting
      document.querySelectorAll('.star-btn').forEach(btn => {
          const code = btn.id.replace('star-', '');
          btn.classList.toggle('border-[#162064]', state.catHotel === code);
          btn.classList.toggle('bg-blue-100', state.catHotel === code);
      });

      // Disable next if input missing
      if (state.etape === 1) btnNext.disabled = !state.typeBat;
      else btnNext.disabled = false;
    }

    function setHotelStar(code) {
        state.catHotel = code;
        updateUI();
        calculate();
    }

    // RENDERS
    function renderTypes() {
      const container = document.getElementById('types-container');
      const types = TYPES[state.secteur] || TYPES.residentiel;
      container.innerHTML = types.map(t => `
        <button onclick="setType('${t.id}')" class="option-btn ${state.typeBat === t.id ? 'selected' : ''}">
          <div class="text-blue-600 mb-2">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="${t.icon}" />
            </svg>
          </div>
          <div class="font-medium text-gray-800">${t.name}</div>
        </button>
      `).join('');
    }

    function setType(id) {
       state.typeBat = id;
       renderTypes();
       updateUI();
    }

    function setSecteur(id) {
      state.secteur = id;
      state.typeBat = ''; // Reset type bat when sector changes
      // renderSecteurs(); // This function is not defined in the provided code, assuming it's external or a typo.
      renderTypes();
      
      const standingContainer = document.getElementById('standing-container');
      if (state.secteur === 'residentiel') {
         standingContainer.classList.remove('hidden');
      } else {
         standingContainer.classList.add('hidden');
         state.standing = 'standard'; // Default for non-residential calculations
      }
      
      updateUI();
    }

    function renderStandings() {
      const container = document.getElementById('standings-grid');
      container.innerHTML = Object.values(STANDINGS).map(s => `
        <button onclick="setStanding('${s.code}')" class="option-btn ${state.standing === s.code ? 'selected' : ''}">
          <div class="font-bold">${s.name}</div>
          <div class="text-[10px] text-gray-500 mt-1">${fmt(s.prix_m2_min)} - ${fmt(s.prix_m2_max)} F/m²</div>
        </button>
      `).join('');
    }

    function setStanding(code) {
      state.standing = code;
      applyStandingMapping(code);
      renderStandings();
    }

    function applyStandingMapping(standing) {
      // Clear options that are influenced by mapping
      const catsToClear = ['solaire', 'securite', 'alarme', 'video', 'exterieur', 'piscine', 'citerne', 'paysager', 'volet', 'second_oeuvre'];
      
      // Auto-logic from Tableau 14
      const mapping = {
        standard: { solaire: 'solaire_3kwc', video: null, alarme: null, piscine: null, domotique: null, paysager: null, volet: null, citerne: 'citerne_5m3' },
        confort: { solaire: 'solaire_5kwc', video: 'video_4cam', alarme: 'alarme_basique', piscine: 'piscine_6x3', domotique: 'domotique_basique', paysager: 'paysager_basique', volet: 'volet_manuel', citerne: 'citerne_5m3' },
        premium: { solaire: 'solaire_10kwc', video: 'video_8cam', alarme: 'alarme_avancee', piscine: 'piscine_8x4', domotique: 'domotique_partielle', paysager: 'paysager_soigne', volet: 'volet_motorise', citerne: 'citerne_10m3' },
        prestige: { solaire: 'solaire_15kwc', video: 'video_8cam', alarme: 'alarme_complete', piscine: 'piscine_10x5', domotique: 'domotique_complete', paysager: 'paysager_prestige', volet: 'volet_connecte', citerne: 'citerne_20m3' }
      };

      const defaults = mapping[standing] || {};
      
      // Reset and apply
      state.options = {};
      for (const [key, code] of Object.entries(defaults)) {
         if (code) setOption(key, code, false); // false = don't recalculate immediately during loop
      }
      
      // Forage depth mapping based on zone
      const zoneDepth = { grand_lome: 'forage_60m', maritime: 'forage_30m', plateaux: 'forage_90m', centrale: 'forage_90m', kara_savanes: 'forage_120m' };
      state.options['forage'] = zoneDepth[state.zone] || 'forage_60m';
      state.forage = (standing === 'premium' || standing === 'prestige'); // Recommended/Pre-selected

      // Clôture & Portail defaults
      const clotureDefaults = { standard: 'cloture_agglos', confort: 'cloture_agglos', premium: 'cloture_mixte', prestige: 'cloture_hg' };
      const portailDefaults = { standard: 'portail_simple', confort: 'portail_double', premium: 'portail_motorise', prestige: 'portail_motorise' };
      setOption('cloture', clotureDefaults[standing]);
      setOption('portail', portailDefaults[standing]);

      initStep4(); // Re-render Step 4 to show recommendations
      calculate();
    }

    function initStep4() {
      renderOptionCategory('solaire', 'solaire-container');
      renderOptionCategory('securite', 'alarme-container', true, 'alarme');
      renderOptionCategory('securite', 'video-container', true, 'video');
      renderOptionCategory('domotique', 'domotique-container');
      renderOptionCategory('exterieur', 'cloture-container', true, 'cloture');
      renderOptionCategory('exterieur', 'portail-container', true, 'portail');
      renderOptionCategory('exterieur', 'piscine-container', true, 'piscine');
      renderOptionCategory('exterieur', 'citerne-container', true, 'citerne');
      renderOptionCategory('exterieur', 'paysager-container', true, 'paysager');
      renderOptionCategory('second_oeuvre', 'volets-container', true, 'volet');
    }

    function renderZones() {
      const container = document.getElementById('zones-container');
      container.innerHTML = Object.values(ZONES).map(z => `
        <button onclick="setZone('${z.code}')" class="w-full option-btn flex justify-between items-center ${state.zone === z.code ? 'selected' : ''}">
            <div class="font-medium">${z.nom}</div>
            <span class="badge badge-blue">×${z.coefficient.toFixed(2)}</span>
        </button>
      `).join('');
    }

    function setZone(code) { state.zone = code; renderZones(); }

    function renderSols() {
      const container = document.getElementById('sols-container');
      container.innerHTML = Object.values(SOLS).map(s => `
        <button onclick="setSol('${s.code}')" class="option-btn flex justify-between items-center ${state.sol === s.code ? 'selected' : ''}">
            <div class="text-sm">${s.nom}</div>
            <span class="badge badge-gray">×${s.coefficient.toFixed(2)}</span>
        </button>
      `).join('');
    }

    function setSol(code) { state.sol = code; renderSols(); }

    function renderOptionCategory(cat, containerId, filter = false, keyword = '') {
      const container = document.getElementById(containerId);
      if (!container) return;
      
      let options = EQUIP_OPTIONS[cat] || [];
      if (filter) {
        options = options.filter(o => o.code.includes(keyword) || o.designation.toLowerCase().includes(keyword.toLowerCase()));
      }

      container.innerHTML = options.map(o => {
        const mapping = o.mapping_standings?.[state.standing];
        const isSelected = state.options[keyword || cat] === o.code;
        const isPreselect = mapping === 'preselect';
        const isRecom = mapping === 'recom';

        return `
          <label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer hover:bg-gray-50 ${isSelected ? 'bg-blue-50 border-blue-600' : ''}">
            <div class="flex items-center gap-3">
              <input type="${keyword === 'volet' ? 'checkbox' : 'radio'}" name="${keyword || cat}" 
                onchange="setOption('${keyword || cat}', '${o.code}')" 
                ${isSelected ? 'checked' : ''}>
              <div>
                <div class="flex items-center gap-2">
                    <div class="font-medium text-sm">${o.designation}</div>
                    ${isPreselect ? '<span class="text-[8px] bg-blue-100 text-blue-700 px-1 rounded uppercase font-bold">Pré-sélectionné</span>' : ''}
                    ${isRecom ? '<span class="text-[8px] bg-green-100 text-green-700 px-1 rounded uppercase font-bold">Recommandé</span>' : ''}
                </div>
                <div class="text-[10px] text-gray-400">${o.puissance || ''}</div>
              </div>
            </div>
            <span class="text-xs mono text-gray-500">${fmt(o.prix_min)} F${o.unite === 'm²' ? '/m²' : (o.unite === 'ml' ? '/ml' : '')}</span>
          </label>
        `;
      }).join('');
    }

    function setOption(key, code, recalc = true) {
      if (key === 'volet') {
        state.options[key] = state.options[key] === code ? null : code;
      } else {
        state.options[key] = state.options[key] === code ? null : code;
      }
      
      initStep4(); 
      if (recalc) calculate();
    }

    // DIMENSIONS
    function changeDim(key, delta) {
        state[key] = Math.max(key === 'niveaux' ? 1 : (key === 'hauteurLibre' ? 4 : 0), state[key] + delta);
        
        if (document.getElementById('val-' + key)) {
            document.getElementById('val-' + key).textContent = state[key];
        }
        if (key === 'dimA') document.getElementById('val-dimA').textContent = state.dimA;
        if (key === 'dimB') document.getElementById('val-dimB').textContent = state.dimB;
        if (key === 'niveaux') document.getElementById('label-etages').textContent = state.niveaux - 1;
        if (key === 'hauteurLibre' && document.getElementById('val-hauteur')) document.getElementById('val-hauteur').textContent = state.hauteurLibre;
        if (key === 'effectif' && document.getElementById('val-effectif')) document.getElementById('val-effectif').textContent = state.effectif;
        
        // Update derivatives
        const surface = state.dimA * state.dimB;
        if (document.getElementById('val-surf')) document.getElementById('val-surf').textContent = surface;
        
        const standingData = STANDINGS[state.standing] || { emprise_max: 50 };
        const empriseTaux = standingData.emprise_max / 100;
        const surfBatie = Math.round(surface * empriseTaux * state.niveaux);
        if (document.getElementById('val-surfBatie')) document.getElementById('val-surfBatie').textContent = surfBatie;
        
        calculate(); 
    }

    // CALCULATE
    function calculate() {
      // 1. DATA PREP
      const zoneData = ZONES[state.zone] || { coefficient: 1.0, prix_foncier_m2: 50000 };
      const solData = SOLS[state.sol] || { coefficient: 1.15, prix_fondation_m2: 45000, nom: 'Non déterminé' };
      
      // 2. SURFACE CALCULATIONS
      let surface = state.forme === 'carre' ? state.dimA * state.dimA : (state.forme === 'rect' ? state.dimA * state.dimB : state.surfManuelle);
      let perimetre = state.forme === 'carre' ? 4 * state.dimA : (state.forme === 'rect' ? 2 * (parseFloat(state.dimA) + parseFloat(state.dimB)) : Math.sqrt(state.surfManuelle) * 4 * 1.1);
      
      const STANDINGS_EMPRISE = { standard: 0.40, confort: 0.35, premium: 0.30, prestige: 0.25 };
      const emprise = state.secteur === 'residentiel' ? (STANDINGS_EMPRISE[state.standing] || 0.35) : (state.secteur === 'industriel' ? 0.65 : (state.secteur === 'agricole' ? 0.50 : 0.40));
      
      let surfaceBatie;
      if (state.secteur === 'agricole' && (state.typeBat === 'ferme_avicole' || state.typeBat === 'elevage')) {
          const ratio = (state.typeBat === 'ferme_avicole') ? 0.1 : 5;
          surfaceBatie = Math.round(state.effectif * ratio * 1.3);
      } else {
          const empriseAuSol = surface * emprise;
          surfaceBatie = Math.round(empriseAuSol * state.niveaux + state.ssSol * empriseAuSol * 0.85);
      }

      // 3. PRICING M2
      const STANDINGS_PRIX = { standard: 375000, confort: 500000, premium: 690000, prestige: 1025000 };
      const HOTELS_PRIX = { '1s': 430000, '2s': 500000, '3s': 625000, '4s': 800000, '5s': 1175000, 'palace': 2000000 };
      
      let prixM2;
      if (state.secteur === 'residentiel') {
          prixM2 = STANDINGS_PRIX[state.standing] || 500000;
      } else if (state.typeBat === 'hotel') {
          prixM2 = HOTELS_PRIX[state.catHotel] || 625000;
      } else if (state.secteur === 'industriel') {
          prixM2 = 250000;
          if (state.hauteurLibre > 10) prixM2 *= 1.12;
          if (state.pontRoulant) prixM2 *= 1.15;
          if (state.groupeFroid) prixM2 *= 1.25;
      } else {
          prixM2 = 450000;
      }

      const coefTotal = zoneData.coefficient * solData.coefficient;
      const baseCost = surfaceBatie * prixM2 * coefTotal;

      // 4. POSTES BREAKDOWN
      const postes = [];
      let total = 0;
      const add = (id, nom, detail, montant, accent = false) => { postes.push({ id, nom, val: fmtM(montant), accent, detail }); total += montant; };

      if (state.terrainDispo !== 'oui') {
          const foncier = surface * (zoneData.prix_foncier_m2 || 50000);
          add('0', '1. Acquisition foncière', `${Math.round(surface)} m²`, foncier);
      }
      
      add('1', '2. Études et honoraires', 'Architecture, structure', baseCost * 0.08);
      
      let fond = surface * emprise * (solData.prix_fondation_m2 || 45000);
      if (state.secteur === 'industriel') fond *= 1.3;
      if (state.ssSol > 0) fond += state.ssSol * surface * emprise * 85000;
      add('2', '3. Fondations', solData.nom || 'À définir', fond);
      
      add('3', '4. Gros œuvre', 'Maçonnerie, planchers', baseCost * 0.38);
      add('4', '5. Charpente / Couverture', 'Toiture et étanchéité', baseCost * 0.12);
      add('5', '6. Second œuvre', 'Cloisons, menuiseries', baseCost * 0.13);
      add('6', '7. Lots techniques', 'Électricité, plomberie', baseCost * 0.18);
      add('7', '8. Finitions', 'Peinture, revêtements', baseCost * 0.11);

      // 5. EQUIPMENT & OPTIONS
      let equip = 0;
      if (state.nbAsc > 0) equip += state.nbAsc * (state.niveaux <= 5 ? 28000000 : 35000000);
      if (state.nbQuais > 0 && state.secteur === 'industriel') equip += state.nbQuais * 8500000;
      if (state.pontRoulant) equip += state.pontCap <= 5 ? 28000000 : (state.pontCap <= 10 ? 48000000 : 78000000);
      if (state.groupeFroid) equip += surfaceBatie * (state.groupeFroid === 'negatif' ? 95000 : 55000);
      if (equip > 0) add('8', '9. Équipements spécifiques', 'Ascenseurs, quais, etc.', equip);

      let secu = 0;
      ['alarme', 'video', 'acces'].forEach(k => {
          if (state.options[k]) {
              const o = Object.values(EQUIP_OPTIONS).flat().find(x => x.code === state.options[k]);
              if (o) secu += o.prix_moyen || o.prix_min;
          }
      });
      if (secu > 0) add('9', '10. Sécurité & Tech', 'Alarme, vidéo, etc.', secu);

      let vrd = surface * 8500;
      ['cloture', 'portail', 'piscine', 'citerne'].forEach(k => {
          if (state.options[k]) {
              const o = Object.values(EQUIP_OPTIONS).flat().find(x => x.code === state.options[k]);
              if (o) {
                  let val = o.prix_moyen || o.prix_min;
                  if (o.unite === 'ml') val *= perimetre;
                  vrd += val;
              }
          }
      });
      if (state.forage) vrd += 4500000; // Simplified forage base
      if (vrd > 0) add('10', '11. Aménagements ext.', 'Clôture, forage, etc.', vrd);

      // Aleas 5%
      add('11', '12. Provisions et divers', 'Assurances, aléas (5%)', total * 0.05);

      // 6. ENERGY NEEDS
      const energy = {
          lum: Math.round(surfaceBatie * (state.secteur === 'industriel' ? 0.008 : 0.012) * 10) / 10,
          prises: Math.round(surfaceBatie * 0.015 * 10) / 10,
          clim: Math.round(surfaceBatie * (state.secteur === 'residentiel' ? 0.7 : 0.4) * 0.1 * 10) / 10
      };
      energy.total = Math.ceil(energy.lum + energy.prises + energy.clim);

      // 7. RENDER RESULTS
      if (document.getElementById('total-estimation')) {
          document.getElementById('total-estimation').innerText = fmt(total) + ' F CFA';
      }
      if (document.getElementById('postes-details')) {
          document.getElementById('postes-details').innerHTML = postes.map(p => `
              <div class="flex justify-between items-center py-2 border-b border-gray-50">
                  <div>
                      <div class="font-bold text-gray-800 text-sm">${p.nom}</div>
                      <div class="text-xs text-gray-400 italic">${p.detail || ''}</div>
                  </div>
                  <div class="font-bold text-[#162064] text-sm">${p.val} F</div>
              </div>
          `).join('');
      }

      ['lum', 'prises', 'clim', 'total'].forEach(id => {
          const el = document.getElementById('energy-' + id);
          if (el) el.innerText = energy[id];
      });

      state.results = { total, postes, energy, surfaceBatie };
    }

    function saveSimulation(target = null) {
      console.log('Saving simulation...', { target, state });
      const surface = state.dimA * state.dimB;
      const totalElem = document.getElementById('total-estimation');
      const totalText = totalElem ? totalElem.textContent : '0 — 0';
      
      let finalTotal = 0;
      try {
          const parts = totalText.split('—');
          const maxPart = parts[1] || parts[0];
          finalTotal = parseFloat(maxPart.replace(/[^0-9]/g, '')) || 0;
      } catch(e) { console.error('Error parsing total', e); }

      const payload = {
        secteur: state.secteur,
        typeBat: state.typeBat,
        standing: state.standing,
        zone: state.zone,
        sol: state.sol,
        dimensions: {
          largeur: state.dimA,
          longueur: state.dimB,
          surface: surface,
          niveaux: state.niveaux,
          catHotel: state.catHotel,
          hauteurLibre: state.hauteurLibre
        },
        options: state.options,
        total: finalTotal,
        base_amount: 0,
        options_amount: 0,
        energy: {
            lum: document.getElementById('energy-lum')?.textContent || '0',
            prises: document.getElementById('energy-prises')?.textContent || '0',
            clim: document.getElementById('energy-clim')?.textContent || '0',
            total: document.getElementById('energy-total')?.textContent || '0'
        },
        details: Array.from(document.getElementById('postes-details').children).map(el => ({
            'nom': el.querySelector('.text-sm').textContent,
            'val': el.querySelector('.mono').textContent,
            'accent': el.classList.contains('bg-orange-50')
        }))
      };

      fetch('{{ route("simulator.save") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(payload)
      })
      .then(res => res.json())
      .then(data => {
        console.log('Save response:', data);
        if (target === 'login') window.location.href = '{{ route("login") }}';
        else if (target === 'register') window.location.href = '{{ route("register") }}';
        else if (data.redirect) window.location.href = data.redirect;
      })
      .catch(err => {
        console.error('Erreur sauvegarde:', err);
        // Fallback redirection if save fails but we have a target
        if (target === 'login') window.location.href = '{{ route("login") }}';
        else if (target === 'register') window.location.href = '{{ route("register") }}';
      });
    }

    // UTILS
    function fmt(n) { return new Intl.NumberFormat('fr-FR').format(Math.round(n || 0)); }
    function fmtM(n) { return n >= 1e6 ? (n / 1e6).toFixed(1) + ' M' : fmt(n); }

    // INITIALIZE
    document.addEventListener('DOMContentLoaded', init);
  </script>
@endsection
