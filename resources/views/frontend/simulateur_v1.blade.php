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
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Équipements et Options</h2>
        <div class="grid md:grid-cols-2 gap-6 mb-8">
           <div class="card p-6">
              <h3 class="font-semibold text-gray-700 mb-4">Énergie Solaire</h3>
              <div class="space-y-2" id="solaire-container">
                  <!-- JS Rendered -->
              </div>
           </div>
           <div class="card p-6">
              <h3 class="font-semibold text-gray-700 mb-4">Autres équipements</h3>
              <div class="space-y-3">
                  <label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                      <span>Piscine (8x4m)</span>
                      <input type="checkbox" onchange="toggleOption('piscine', '8x4')" class="w-5 h-5">
                  </label>
                  <label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                      <span>Forage d'eau</span>
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
                    <a href="{{ route('admin.login') }}" class="btn-primary">Se connecter</a>
                    <a href="#" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold">Créer un compte</a>
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
    const ZONES = @json($zones->keyBy('code'));
    const SOLS = @json($sols->keyBy('code'));
    const STANDINGS = @json($standings->keyBy('code'));
    const TYPE_BATIMENTS = @json($typeBatiments->keyBy('code'));
    
    const TYPES = {
      residentiel: [
        { id: 'villa', name: 'Villa individuelle', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' },
        { id: 'duplex', name: 'Duplex / Triplex', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' },
        { id: 'immeuble', name: 'Immeuble résidentiel', icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' }
      ],
      tertiaire: [
        { id: 'bureaux', name: 'Bureaux', icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' },
        { id: 'commerce', name: 'Commerce', icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z' }
      ],
      industriel: [
        { id: 'entrepot', name: 'Entrepôt', icon: 'M19 21V10l-6-3-6 3v11m12 0h-12m12 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-1' }
      ]
    };

    const SOLAIRES = [
      { id: '3', name: 'Kit 3 kW', prix: 4500000 },
      { id: '5', name: 'Kit 5 kW', prix: 7500000 },
      { id: '10', name: 'Kit 10 kW', prix: 14000000 }
    ];

    // STATE
    let state = {
      etape: 1,
      secteur: "{{ $secteur }}",
      typeBat: '',
      standing: 'confort',
      dimA: 30,
      dimB: 20,
      niveaux: 1,
      zone: 'grand_lome',
      sol: 'ferralitique',
      solaire: '',
      piscine: '',
      forage: false
    };

    // INIT
    function init() {
      renderTypes();
      renderStandings();
      renderZones();
      renderSols();
      renderSolaire();
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
       if (state.secteur === 'residentiel') {
         document.getElementById('standing-container').classList.remove('hidden');
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
      renderStandings();
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

    function renderSolaire() {
      const container = document.getElementById('solaire-container');
      container.innerHTML = SOLAIRES.map(s => `
        <label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer hover:bg-gray-50 ${state.solaire === s.id ? 'bg-blue-50 border-blue-600' : ''}">
          <div class="flex items-center gap-3">
            <input type="radio" name="solaire" onchange="state.solaire='${s.id}'; renderSolaire()" ${state.solaire === s.id ? 'checked' : ''}>
            <span class="font-medium">${s.name}</span>
          </div>
          <span class="text-sm mono text-gray-500">${fmt(s.prix)} F</span>
        </label>
      `).join('');
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
    }

    function toggleOption(key, value) {
        if (typeof value === 'boolean') state[key] = !state[key];
        else state[key] = state[key] === value ? '' : value;
    }

    // CALCULATE
    function calculate() {
      const resView = document.getElementById('results-view');
      if (!resView) return;

      const surface = state.dimA * state.dimB;
      const empriseTaux = (STANDINGS[state.standing]?.emprise_max || 50) / 100;
      const surfBatie = surface * empriseTaux * state.niveaux;
      
      const zoneData = ZONES[state.zone];
      const solData = SOLS[state.sol];
      const standingData = STANDINGS[state.standing];
      const coefTotal = (zoneData?.coefficient || 1) * (solData?.coefficient || 1);

      const prixMin = standingData.prix_m2_min;
      const prixMax = standingData.prix_m2_max;
      
      const workMin = surfBatie * prixMin * coefTotal;
      const workMax = surfBatie * prixMax * coefTotal;

      let equipMin = 0;
      let equipMax = 0;
      
      if (state.solaire) {
        const kit = SOLAIRES.find(k => k.id === state.solaire);
        equipMin += kit.prix * 0.95;
        equipMax += kit.prix * 1.05;
      }
      if (state.piscine) { equipMin += 10000000; equipMax += 15000000; }
      if (state.forage) { equipMin += 2500000; equipMax += 4000000; }

      const totalMin = workMin + equipMin;
      const totalMax = workMax + equipMax;
      
      const marge = standingData.marge || 0.20;
      const finalMin = totalMin * (1 + marge);
      const finalMax = totalMax * (1 + marge);

      document.getElementById('total-estimation').textContent = `${fmtM(finalMin)} — ${fmtM(finalMax)} FCFA`;

      const postes = [
        { nom: 'Gros & Second œuvre', detail: `${fmt(Math.round(surfBatie))} m² @ ${fmt(prixMin)}/m²`, min: workMin, max: workMax },
        { nom: 'Équipements & Options', detail: 'Solaire, Forage, Piscine', min: equipMin, max: equipMax },
        { nom: 'Honoraires AIAE', detail: `${Math.round(marge*100)}% de marge`, min: totalMin * marge, max: totalMax * marge }
      ];

      document.getElementById('postes-details').innerHTML = postes.map(p => `
        <div class="flex justify-between border-b pb-2">
            <div>
                <div class="font-medium text-gray-800">${p.nom}</div>
                <div class="text-[11px] text-gray-500">${p.detail}</div>
            </div>
            <div class="text-right">
                <div class="mono font-bold text-sm text-blue-900">${fmtM(p.min)} - ${fmtM(p.max)}</div>
            </div>
        </div>
      `).join('');
    }

    // UTILS
    function fmt(n) { return new Intl.NumberFormat('fr-FR').format(Math.round(n || 0)); }
    function fmtM(n) { return n >= 1e6 ? (n / 1e6).toFixed(1) + ' M' : fmt(n); }

    // INITIALIZE
    document.addEventListener('DOMContentLoaded', init);
  </script>
@endsection
