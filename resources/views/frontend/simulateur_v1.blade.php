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
    let state = {
      etape: 1,
      secteur: "{{ $secteur }}",
      typeBat: '',
      standing: 'confort',
      dimA: 30, // Longueur
      dimB: 20, // Largeur
      niveaux: 1,
      zone: 'grand_lome',
      sol: 'ferralitique',
      options: {}, // Stores selected codes: { solaire: 'solaire_3kwc', domotique: 'domotique_basique', ... }
      volets: false, // For per-m2 calculation
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
      
      // Disable next if input missing
      if (state.etape === 1) btnNext.disabled = !state.typeBat;
      else btnNext.disabled = false;
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
        state[key] = Math.max(key === 'niveaux' ? 1 : 10, state[key] + delta);
        document.getElementById('val-' + key).textContent = state[key];
        if (key === 'niveaux') document.getElementById('label-etages').textContent = state.niveaux - 1;
        
        // Update derivatives
        const surface = state.dimA * state.dimB;
        document.getElementById('val-surf').textContent = surface;
        
        const empriseTaux = (STANDINGS[state.standing]?.emprise_max || 50) / 100;
        const surfBatie = Math.round(surface * empriseTaux * state.niveaux);
        document.getElementById('val-surfBatie').textContent = surfBatie;
        calculate(); // Recalculate when dimensions change
    }

    // CALCULATE
    function calculate() {
      const resView = document.getElementById('results-view');
      if (!resView) return;

      const surface = state.dimA * state.dimB;
      const standingData = STANDINGS[state.standing];
      const empriseTaux = (standingData?.emprise_max || 50) / 100;
      const surfaceRDC = surface * empriseTaux;
      const surfBatie = surfaceRDC * state.niveaux;
      
      const zoneData = ZONES[state.zone];
      const solData = SOLS[state.sol];
      const coefZone = zoneData?.coefficient || 1;
      const coefSol = solData?.coefficient || 1;
      const coefTotal = coefZone * coefSol;

      const prixMin = standingData.prix_m2_min;
      const prixMax = standingData.prix_m2_max;
      
      // POST 2: FONDATIONS
      const fondMinMax = surfaceRDC * solData.prix_fondation_m2 * coefZone;
      
      // POST 3-8: CONSTRUCTION BASE (0.95 of Total Const excluding foundation)
      const constBaseMin = surfBatie * prixMin * coefTotal;
      const constBaseMax = surfBatie * prixMax * coefTotal;
      
      const workMin = fondMinMax + (constBaseMin * 0.95);
      const workMax = fondMinMax + (constBaseMax * 0.95);

      // POST 9-10: OPTIONS (EXT & TECH)
      let optExtMin = 0, optExtMax = 0;
      let optTechMin = 0, optTechMax = 0;
      
      // exterior categories
      ['piscine', 'citerne', 'paysager', 'cloture', 'portail'].forEach(k => {
        if (state.options[k]) {
          const o = Object.values(EQUIP_OPTIONS).flat().find(x => x.code === state.options[k]);
          if (o) { 
              let pMin = o.prix_min, pMax = o.prix_max;
              if (o.unite === 'ml') {
                  const perimetre = 4 * Math.sqrt(surface);
                  pMin *= perimetre;
                  pMax *= perimetre;
              }
              optExtMin += pMin; optExtMax += pMax; 
          }
        }
      });
      if (state.forage) { 
          const code = state.options['forage'] || 'forage_60m';
          const f = (EQUIP_OPTIONS['exterieur'] || []).find(o => o.code === code);
          if (f) { optExtMin += f.prix_min; optExtMax += f.prix_max; }
      }

      // tech categories
      ['solaire', 'alarme', 'video', 'domotique', 'volet'].forEach(k => {
        if (state.options[k]) {
          const o = Object.values(EQUIP_OPTIONS).flat().find(x => x.code === state.options[k]);
          if (o) {
            let pMin = o.prix_min, pMax = o.prix_max;
            if (o.unite === 'm²') { 
                const voletSurfByStanding = { standard: 10, confort: 17, premium: 28, prestige: 45 };
                const vSurf = voletSurfByStanding[state.standing] || 20;
                pMin *= vSurf;
                pMax *= vSurf;
            }
            optTechMin += pMin; optTechMax += pMax; 
          }
        }
      });

      // POST 11: HONORAIRES
      const forfaitHonos = 500000;
      const rates = { standard: 0.06, confort: 0.05, premium: 0.04, prestige: 0.03 };
      const rate = rates[state.standing] || 0.05;
      
      const subTotalForHonosMin = workMin + optExtMin + optTechMin;
      const subTotalForHonosMax = workMax + optExtMax + optTechMax;
      
      const honosMin = forfaitHonos + (subTotalForHonosMin * rate);
      const honosMax = forfaitHonos + (subTotalForHonosMax * rate);

      // POST 12: ASSURANCES (2%)
      const baseAssurancesMin = subTotalForHonosMin + honosMin;
      const baseAssurancesMax = subTotalForHonosMax + honosMax;
      const assurancesMin = baseAssurancesMin * 0.02;
      const assurancesMax = baseAssurancesMax * 0.02;

      // TOTAL AVANT MARGE
      const totalAvantMargeMin = baseAssurancesMin + assurancesMin;
      const totalAvantMargeMax = baseAssurancesMax + assurancesMax;

      // MARGE AIAE
      const margeRate = standingData.marge || 0.20;
      const margeValMin = totalAvantMargeMin * margeRate;
      const margeValMax = totalAvantMargeMax * margeRate;

      // TOTAL CLIENT
      const finalMin = totalAvantMargeMin + margeValMin;
      const finalMax = totalAvantMargeMax + margeValMax;

      document.getElementById('total-estimation').textContent = `${fmtM(finalMin)} — ${fmtM(finalMax)} FCFA`;

      // 12 POSTES DETAILS
      const postes = [
        { nom: '1. Terrain', val: fmtM(surface * zoneData.prix_foncier_m2) },
        { nom: '2. Fondations', val: fmtM(fondMinMax) },
        { nom: '3. Structure Gros Œuvre (42%)', val: fmtM(constBaseMin * 0.42) + ' - ' + fmtM(constBaseMax * 0.42) },
        { nom: '4. Charpente / Couverture (12%)', val: fmtM(constBaseMin * 0.12) + ' - ' + fmtM(constBaseMax * 0.12) },
        { nom: '5. Menuiseries (10%)', val: fmtM(constBaseMin * 0.10) + ' - ' + fmtM(constBaseMax * 0.10) },
        { nom: '6. Revêtements / Finitions (14%)', val: fmtM(constBaseMin * 0.14) + ' - ' + fmtM(constBaseMax * 0.14) },
        { nom: '7. Électricité (9%)', val: fmtM(constBaseMin * 0.09) + ' - ' + fmtM(constBaseMax * 0.09) },
        { nom: '8. Plomberie / Sanitaires (8%)', val: fmtM(constBaseMin * 0.08) + ' - ' + fmtM(constBaseMax * 0.08) },
        { nom: '9. Aménagements Extérieurs', val: fmtM(optExtMin) + ' - ' + fmtM(optExtMax) },
        { nom: '10. Équipements Techniques', val: fmtM(optTechMin) + ' - ' + fmtM(optTechMax) },
        { nom: '11. Honoraires & Études', val: fmtM(honosMin) + ' - ' + fmtM(honosMax) },
        { nom: '12. Assurances & Divers', val: fmtM(assurancesMin) + ' - ' + fmtM(assurancesMax) },
        { nom: 'Marge AIAE (' + (margeRate*100) + '%)', val: fmtM(margeValMin) + ' - ' + fmtM(margeValMax), accent: true }
      ];

      document.getElementById('postes-details').innerHTML = postes.map(p => `
        <div class="flex justify-between border-b border-gray-100 pb-2 ${p.accent ? 'bg-orange-50 -mx-2 px-2 py-2 rounded' : ''}">
            <div class="text-sm ${p.accent ? 'font-bold text-orange-800' : 'text-gray-600'}">${p.nom}</div>
            <div class="text-right">
                <div class="mono font-bold text-sm ${p.accent ? 'text-orange-900' : 'text-blue-900'}">${p.val}</div>
            </div>
        </div>
      `).join('');
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
          niveaux: state.niveaux
        },
        options: state.options,
        total: finalTotal,
        base_amount: 0,
        options_amount: 0
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
