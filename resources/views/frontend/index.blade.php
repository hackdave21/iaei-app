@extends('layouts.frontend')

@section('title', 'AIAE - Accueil')

@section('content')
  <!-- ================= HERO ================= -->
  <section class="relative px-1 sm:px-1 pt-1">
    <div class="relative max-w-[1600px] mx-auto rounded-[15px] overflow-hidden shadow-2xl">
      <img id="heroImage" src="{{ asset('aiae-frontend/Images/home.png') }}" class="w-full h-[75vh] md:h-[90vh] object-cover" />

      <!-- overlay -->
      <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>

      <!-- contenu -->
      <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 px-10 md:px-16 max-w-7xl text-white">
        <!-- TITRE -->
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-[44px] font-bold mb-6">
          De La Conception À La Réalisation
        </h1>

        <!-- TEXTE -->
        <p class="text-sm sm:text-base md:text-lg leading-relaxed mb-8 max-w-xl">
          Construction, énergie solaire, sécurité haute performance et
          préfabrication industrielle :<br />
          AIAE réunit toutes les compétences pour mener votre projet de A à Z.
          <br /><br />
          <span class="font-semibold">
            Un interlocuteur unique, des engagements tenus.
          </span>
        </p>

        <!-- BOUTONS -->
        <div class="flex flex-col sm:flex-row items-center gap-4 w-full mt-8">
          <!-- BOUTON GAUCHE -->
          <button
            class="bg-primary text-white px-6 py-3 rounded-lg text-sm shadow-lg whitespace-nowrap w-full sm:w-auto">
            Prendre rendez-vous maintenant
          </button>

          <!-- BOUTON MILIEU -->
          <div class="flex items-center bg-white rounded-full shadow-lg p-1 w-full sm:w-auto">
            <span class="px-6 py-2 text-black text-sm whitespace-nowrap flex-1 text-center sm:text-left">
              Demander un devis gratuit
            </span>
            <div class="w-10 h-10 flex items-center justify-center bg-white rounded-full shrink-0">
              <img src="{{ asset('aiae-frontend/Images/envoi.png') }}" class="w-5" />
            </div>
          </div>

          <!-- TEXTE DROITE -->
          <div class="flex items-start text-white sm:ml-auto">
            <img src="{{ asset('aiae-frontend/Images/Arrow4Expertises.svg') }}" class="w-6 mt-[2px] mr-2 shrink-0" />
            <p class="text-sm md:text-base font-medium leading-[1.2]">
              Un partenaire. Quatre<br />
              expertises. Zéro compromis.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= PANNEAU SIMULATEUR ================= -->
  <section class="relative -mt-16 md:-mt-20 z-10 px-2 sm:px-4">
    <div
      class="w-full max-w-[92%] sm:max-w-[640px] md:max-w-[820px] lg:max-w-[900px] xl:max-w-[990px] mx-auto bg-glass backdrop-blur-xl rounded-2xl shadow-xl p-4 sm:p-5">
      <!-- Onglets -->
      <div class="flex flex-col sm:flex-row sm:flex-wrap items-stretch sm:items-center gap-2 mb-4" id="categoryButtons">
        <div class="flex flex-wrap gap-2">
          <button data-img="{{ asset('aiae-frontend/Images/residentiel.png') }}"
            class="tabBtn px-3 py-2 rounded-lg bg-white text-xs sm:text-sm shadow">
            Résidentiel
          </button>

          <button data-img="{{ asset('aiae-frontend/Images/tertiaire.png') }}" class="tabBtn px-3 py-2 rounded-lg bg-glassDark text-xs sm:text-sm">
            Tertiaire
          </button>

          <button data-img="{{ asset('aiae-frontend/Images/industriel.png') }}" class="tabBtn px-3 py-2 rounded-lg bg-glassDark text-xs sm:text-sm">
            Industriel
          </button>

          <button data-img="{{ asset('aiae-frontend/Images/agricole.png') }}" class="tabBtn px-3 py-2 rounded-lg bg-glassDark text-xs sm:text-sm">
            Agricole
          </button>
        </div>

        <a href="{{ route('simulator.index') }}" class="w-full sm:w-auto sm:ml-auto px-4 py-2 bg-secondary text-white rounded-lg text-xs sm:text-sm text-center">
          Ouvrir le Calculateur d'Énergies Renouvelables
        </a>
      </div>

      <!-- Formulaire -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-3">
        <input class="col-span-1 sm:col-span-1 md:col-span-2 h-10 px-3 rounded-lg text-xs sm:text-sm"
          placeholder="Surface dispo (m²)" />

        <input class="col-span-1 sm:col-span-1 md:col-span-2 h-10 px-3 rounded-lg text-xs sm:text-sm"
          placeholder="Surface bâtie (m²)" />

        <!-- CONFIGURATION -->
        <div class="relative col-span-1 sm:col-span-2 md:col-span-2">
          <button id="openConfig"
            class="w-full h-10 bg-white text-left px-3 rounded-lg text-xs sm:text-sm flex justify-between items-center">
            Configuration
            <span><img src="{{ asset('aiae-frontend/Images/Flèche haut.svg') }}" class="arrow transition-transform duration-200" alt="" /></span>
          </button>

          <div id="configPanel"
            class="hidden absolute left-0 right-0 bottom-full mb-2 bg-white rounded-xl shadow-lg p-3 space-y-2 z-20">
            <label class="flex justify-between items-center text-xs sm:text-sm">
              Espaces Communs <input type="checkbox" />
            </label>

            <div class="flex justify-between items-center text-xs sm:text-sm">
              Salles De Bain
              <div class="flex items-center gap-2">
                <button class="minusBath bg-gray-200 rounded-full w-6 h-6">
                  -
                </button>
                <span id="bathCount">1</span>
                <button class="plusBath bg-gray-200 rounded-full w-6 h-6">
                  +
                </button>
              </div>
            </div>

            <div class="flex justify-between items-center text-xs sm:text-sm">
              Chambres
              <div class="flex items-center gap-2">
                <button class="minusBed bg-gray-200 rounded-full w-6 h-6">
                  -
                </button>
                <span id="bedCount">1</span>
                <button class="plusBed bg-gray-200 rounded-full w-6 h-6">
                  +
                </button>
              </div>
            </div>

            <button class="w-full bg-[#05482C] text-white rounded-lg py-2 text-xs sm:text-sm">
              Valider
            </button>
          </div>
        </div>

        <!-- STANDING -->
        <div class="relative col-span-1 sm:col-span-1 md:col-span-2">
          <button id="openStand"
            class="w-full h-10 bg-white text-left px-3 rounded-lg text-xs sm:text-sm flex justify-between items-center">
            Standing
            <span><img src="{{ asset('aiae-frontend/Images/Flèche haut.svg') }}" class="arrow transition-transform duration-200" alt="" /></span>
          </button>

          <div id="standPanel"
            class="hidden absolute left-0 right-0 bottom-full mb-2 bg-white rounded-xl shadow-lg p-3 space-y-1 z-20">
            <button class="block w-full text-left hover:bg-gray-100 rounded-lg px-2 py-1">
              Prestige
            </button>
            <button class="block w-full text-left hover:bg-gray-100 rounded-lg px-2 py-1">
              Premium
            </button>
            <button class="block w-full text-left hover:bg-gray-100 rounded-lg px-2 py-1">
              Confort
            </button>
            <button class="block w-full text-left hover:bg-gray-100 rounded-lg px-2 py-1">
              Standard
            </button>
          </div>
        </div>

        <!-- OPTIONS -->
        <div class="relative col-span-1 sm:col-span-1 md:col-span-2">
          <button id="openOptions"
            class="w-full h-10 bg-white text-left px-3 rounded-lg text-xs sm:text-sm flex justify-between items-center">
            Options
            <span><img src="{{ asset('aiae-frontend/Images/Flèche haut.svg') }}" class="arrow transition-transform duration-200" alt="" /></span>
          </button>

          <div id="optionsPanel"
            class="hidden absolute left-0 right-0 bottom-full mb-2 bg-white rounded-xl shadow-lg p-3 space-y-2 z-20">
            <label class="flex justify-between text-xs sm:text-sm">Forage <input type="checkbox" /></label>
            <label class="flex justify-between text-xs sm:text-sm">Clôture <input type="checkbox" /></label>
            <label class="flex justify-between text-xs sm:text-sm">Aménagement Paysager <input
                type="checkbox" /></label>
            <label class="flex justify-between text-xs sm:text-sm">Domotique <input type="checkbox" /></label>
            <label class="flex justify-between text-xs sm:text-sm">Solaire <input type="checkbox" /></label>
            <label class="flex justify-between text-xs sm:text-sm">Piscine <input type="checkbox" /></label>

            <button class="w-full bg-[#05482C] text-white rounded-lg py-2 text-xs sm:text-sm">
              Valider
            </button>
          </div>
        </div>

        <!-- BOUTON FINAL -->
        <a href="{{ route('simulator.index') }}"
          class="col-span-1 sm:col-span-2 md:col-span-2 h-10 bg-[#05482C] text-white rounded-lg text-xs sm:text-sm flex items-center justify-center whitespace-nowrap">
          Poursuivre la simulation
        </a>
      </div>
    </div>
  </section>

  <!-- ================= SECTION QUI SOMMES NOUS ================= -->
  <section class="relative py-16">
    <!-- fond bleu -->
    <div class="absolute bottom-0 left-0 w-full h-[380px] bg-[#162064]"></div>

    <div class="relative max-w-[1200px] mx-auto px-6">
      <!-- carte grise -->
      <div class="bg-[#f2f2f2] rounded-xl shadow-[0_30px_70px_rgba(0,0,0,0.35)] p-12">
        <div class="grid md:grid-cols-2 gap-10 items-start">
          <!-- TEXTE GAUCHE -->
          <div>
            <h2 class="text-[#162064] font-bold text-2xl md:text-3xl mb-6">
              QUI SOMMES-NOUS ?
            </h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-4">
              AIAE (
              <span class="font-semibold">Afrika Infrastructures And Equipments</span>)<br />
              est une entreprise togolaise
              <span class="font-semibold">fondée par des experts avec plus de 15 ans d'expérience en génie civil</span>,
              avec une ambition claire :<br />
              <span class="font-semibold">transformer le secteur de la construction en Afrique de l'Ouest.</span>
            </p>

            <p class="text-gray-600 leading-relaxed mb-4">
              Face à un marché où le client doit coordonner lui-même<br class="hidden sm:inline" />
              architecte, bureau d'études, constructeur et installateurs,<br class="hidden sm:inline" />
              <span class="text-primary mb-4">
                AIAE propose un modèle intégré : de la conception<br class="hidden sm:inline" />
                jusqu'à la remise des clés, en passant par l'autonomie<br class="hidden sm:inline" />
                énergétique et la sécurisation des installations.
              </span>
            </p>

            <button
              class="bg-[#0b5b3a] text-white px-5 py-2 mt-10 rounded-lg text-sm flex items-center gap-2 whitespace-nowrap">
              En savoir plus sur nous
              <img src="{{ asset('aiae-frontend/Images/Arrow4Expertises.svg') }}" class="w-4" />
            </button>

            <p class="text-xs text-gray-500 mt-10">
              Cliquez <span class="underline font-semibold">Simulation</span>
              & simulez votre projet en 2 minutes !
            </p>
          </div>

          <!-- COLONNE DROITE -->
          <div class="space-y-4 flex flex-col items-center md:items-end pt-2">
            <img src="{{ asset('aiae-frontend/Images/Expertise.png') }}" class="w-full max-w-[460px] rounded-lg shadow-sm" alt="Expertise" />

            <img src="{{ asset('aiae-frontend/Images/Siège.png') }}" class="w-full max-w-[460px] rounded-lg shadow-sm" alt="Siège" />

            <img src="{{ asset('aiae-frontend/Images/Ambition.png') }}" class="w-full max-w-[460px] rounded-lg shadow-sm" alt="Modèle" />
          </div>
        </div>

      </div> <!-- FIN CARTE GRISE -->

      <!-- STATS BAS - SORTIE DE LA CARTE POUR ÊTRE SUR LE FOND BLEU -->
      <div class="grid grid-cols-2 md:grid-cols-4 text-center text-white mt-14 gap-6 relative z-10">
        <div>
          <p class="text-5xl font-bold">+18</p>
          <p class="text-sm mt-2 font-medium">Années d'expertise</p>
        </div>

        <div>
          <p class="text-5xl font-bold">04</p>
          <p class="text-sm mt-2 font-medium">Divisions complémentaires</p>
        </div>

        <div>
          <p class="text-5xl font-bold">05</p>
          <p class="text-sm mt-2 font-medium">Zones d’intervention</p>
        </div>

        <div>
          <p class="text-5xl font-bold">04</p>
          <p class="text-sm mt-2 font-medium">Niveaux de standing</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SECTION CIBLES ================= -->
  <section class="relative pt-16 bg-[#f2f2f2] overflow-hidden">
    <!-- forme décorative -->
    <div class="absolute -top-32 -left-32 w-[520px] h-[520px] bg-gray-200 rounded-full opacity-70"></div>

    <div class="relative max-w-[1200px] mx-auto px-6">
      <!-- Titre -->
      <h2 class="text-[#162064] font-bold text-2xl md:text-3xl mb-8">
        À QUI S'ADRESSE AIAE ?
      </h2>

      <!-- GRID -->
      <div class="grid grid-cols-2 rounded-xl overflow-hidden">
        <!-- PARTICULIERS -->
        <div class="relative group">
          <img src="{{ asset('aiae-frontend/Images/familles.png') }}" class="w-full h-full object-cover" />

          <button class="absolute bottom-6 right-6 bg-white/20 backdrop-blur text-white text-xs px-4 py-1 rounded-full">
            Contactez-nous
          </button>
        </div>

        <!-- DIASPORA -->
        <div class="relative group">
          <img src="{{ asset('aiae-frontend/Images/diaspora.png') }}" class="w-full h-full object-cover" />

          <button class="absolute bottom-6 right-6 bg-white/20 backdrop-blur text-white text-xs px-4 py-1 rounded-full">
            Contactez-nous
          </button>
        </div>

        <!-- ENTREPRISES -->
        <div class="relative group">
          <img src="{{ asset('aiae-frontend/Images/entreprises.png') }}" class="w-full h-full object-cover" />

          <button class="absolute bottom-6 right-6 bg-white/20 backdrop-blur text-white text-xs px-4 py-1 rounded-full">
            Contactez-nous
          </button>
        </div>

        <!-- INSTITUTIONS -->
        <div class="relative group">
          <img src="{{ asset('aiae-frontend/Images/institutions.png') }}" class="w-full h-full object-cover" />

          <button class="absolute bottom-6 right-6 bg-white/20 backdrop-blur text-white text-xs px-4 py-1 rounded-full">
            Contactez-nous
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SECTION NOS DIVISIONS ================= -->
  <section class="relative py-24 bg-[#f3f3f3] overflow-hidden">
    <!-- forme cercle décorative -->
    <div class="absolute top-1/2 left-1/2 w-[650px] h-[650px] bg-gray-200 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
    <!-- image décorative gauche -->
    <img src="{{ asset('aiae-frontend/Images/Gauche.png') }}" class="absolute left-0 top-1/2 -translate-y-1/2 w-[480px]">
    <!-- image décorative droite -->
    <img src="{{ asset('aiae-frontend/Images/Droit.png') }}" class="absolute right-0 top-1/2 -translate-y-1/2 w-[480px]">

    <div class="relative max-w-[900px] mx-auto text-center px-6">
      <h2 class="text-[#162064] font-black text-[40px] sm:text-[60px] md:text-[90px] leading-[1.05]">
        NOS <span class="text-[#0b5b3a]">04</span><br>
        DIVISIONS
      </h2>
      <p class="mt-6 text-sm md:text-base text-gray-700 max-w-[520px] mx-auto leading-relaxed">
        AIAE STRUCTURE SON DÉVELOPPEMENT AUTOUR DE<br>
        <span class="font-bold">QUATRE DIVISIONS COMPLÉMENTAIRES</span>, ENSEMBLE,<br>
        ELLES FORMENT UN <span class="font-bold">ÉCOSYSTÈME INÉDIT SUR LE</span><br>
        <span class="font-bold">MARCHÉ OUEST-AFRICAIN.</span>
      </p>
    </div>
  </section>

  <!-- ================= SECTION DIVISIONS ================= -->
  <section class="py-20 bg-[#f3f3f3]">
    <div class="max-w-[1100px] mx-auto px-6">
      <!-- Ligne 1 -->
      <div class="grid md:grid-cols-2 gap-12 items-stretch">
        <img src="{{ asset('aiae-frontend/Images/Construction.png') }}" class="rounded-xl w-full h-full object-cover">
        <div class="flex flex-col justify-between h-full">
          <div>
            <h3 class="text-[#0b5b3a] font-extrabold text-5xl mb-4">CONSTRUCTION</h3>
            <p class="text-gray-700 leading-relaxed text-[24px]">
              Notre cœur de métier. Nous concevons et réalisons des
              <strong>infrastructures durables</strong> : villas résidentielles,
              bâtiments commerciaux, ouvrages d’art et infrastructures techniques.
              <strong>Conception architecturale et structurelle.</strong>
              Construction tous standings (Standard à Prestige).
              Ouvrages d’art (<strong>ponts, murs de soutènement, etc.</strong>).
              <strong>Réhabilitation et extension</strong> de bâtiments existants.
            </p>
          </div>
          <p class="text-[#0b5b3a] mt-6 text-[24px]">
            À partir de <span class="font-semibold">330 000 FCFA/m²</span>
          </p>
        </div>
      </div>
      <div class="border-t border-gray-300 my-16"></div>
      <!-- Ligne 2 -->
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="text-right">
          <h3 class="text-[#d86d00] font-extrabold text-5xl mb-4">ÉNERGIE</h3>
          <p class="text-gray-700 leading-relaxed text-[24px]">
              Solutions d’autonomie énergétique pour vos installations.
              Nous dimensionnons et installons des
              <strong>systèmes solaires adaptés aux besoins des entreprises</strong>
              et exploitations agricoles.
              <strong class="text-[#d86d00]">Solaire C&I</strong> (commercial et industriel).
              <strong class="text-[#d86d00]">Systèmes hybrides</strong> avec stockage par batteries.
              Solutions pour sites isolés ou sans raccordement.
              <strong>Maintenance et optimisation</strong> des installations.
          </p>
          <p class="mt-3 text-gray-600 text-[24px]">
            Lancement <span class="font-semibold">2026</span>
          </p>
        </div>
        <img src="{{ asset('aiae-frontend/Images/Energie.png') }}" class="rounded-xl w-full object-cover">
      </div>
      <div class="border-t border-gray-300 my-16"></div>
      <!-- Ligne 3 -->
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <img src="{{ asset('aiae-frontend/Images/Sécurité.png') }}" class="rounded-xl w-full object-cover">
        <div>
          <h3 class="text-[#0b5b3a] font-extrabold text-5xl mb-4">SÉCURITÉ</h3>
          <p class="text-gray-700 leading-relaxed text-[24px]">
            Protection haute performance pour vos biens et vos personnes.
            Nous concevons et installons des solutions de sécurité physique
            répondant aux normes européennes.
            <strong>Chambres fortes et coffres certifiés</strong> (banques, entreprises).
            <strong>Safe rooms</strong>, salles de repli sécurisées.
            Armureries et locaux de stockage sensible.
            Systèmes de contrôle d’accès.
          </p>
          <p class="mt-3 text-[#0b5b3a] text-[24px]">Prochainement</p>
        </div>
      </div>
      <div class="border-t border-gray-300 my-16"></div>
      <!-- Ligne 4 -->
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="text-right">
          <h3 class="text-[#d86d00] font-extrabold text-5xl mb-4">PRÉFABRICATION</h3>
          <p class="text-gray-700 leading-relaxed text-[24px]">
            Production industrielle d’éléments de construction pour
            des chantiers plus rapides et économiques.
            <strong>BTC (briques de terre compressée)</strong>,
            matériau écologique local.
            Éléments en <strong>béton précontraint</strong> (portées longues,
            résistance accrue).
            Nervures et poutrelles pour planchers.
            Éléments pour ponts et ouvrages d’art.
          </p>
          <p class="mt-3 text-[#d86d00] text-[24px]">Prochainement</p>
        </div>
        <img src="{{ asset('aiae-frontend/Images/Préfabrication.png') }}" class="rounded-xl w-full object-cover">
      </div>
    </div>
  </section>

  <!-- ================= BARRE ACTIONS ================= -->
  <div class="w-full bg-[#e9e9e9] py-4">
    <div class="max-w-[1100px] mx-auto flex flex-col sm:flex-row items-center justify-between px-6 sm:px-16 gap-4">
      <button class="bg-[#0b5b3a] text-white px-10 py-3 rounded-lg text-[16px] font-medium hover:opacity-90 transition w-full sm:w-auto">
        Prendre rendez-vous maintenant
      </button>
      <button class="flex items-center justify-center text-[16px] bg-[#ffffff] gap-3 border border-black px-10 py-3 rounded-full text-sm font-medium hover:bg-gray-100 transition w-full sm:w-auto">
        Demander un devis gratuit
        <span class="flex items-center justify-center w-7 h-7 border border-black rounded-full shrink-0">
          <img src="{{ asset('aiae-frontend/Images/envoi.png') }}" class="w-3">
        </span>
      </button>
    </div>
  </div>

  <!-- ================= SECTION POURQUOI AIAE ================= -->
  <section class="relative w-full bg-[#05482C] overflow-hidden">
    <div class="max-w-[1600px] mx-auto px-6 pt-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-center lg:text-left">
        <div class="text-white relative mx-auto lg:ml-20 max-w-xl">
          <h2 class="text-5xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-10 text-center lg:text-left">
            Pourquoi<br>Choisir AIAE ?
          </h2>
        </div>
        <div class="relative lg:mr-20 flex justify-center">
          <img src="{{ asset('aiae-frontend/Images/Défile.png') }}" alt="bloc glass" class="ml-20">
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SECTION AVANTAGES ================= -->
  <section class="bg-[#f3f3f3] py-20">
    <div class="max-w-[1200px] mx-auto px-6">
      <div class="grid md:grid-cols-2 gap-x-16 gap-y-14">
        <div class="flex gap-6">
          <div class="flex items-start justify-center w-12 h-12 rounded-full bg-[#0b5b3a] text-white font-bold text-lg shrink-0">01</div>
          <div>
            <h3 class="text-[#0b5b3a] font-extrabold text-2xl mb-2">UN INTERLOCUTEUR UNIQUE</h3>
            <p class="text-gray-700 text-[24px] leading-relaxed">
              Fini la coordination entre architecte, bureau d’études, constructeur
              et installateurs. <strong>AIAE prend en charge l’intégralité de votre projet</strong>,
              de la première esquisse à la remise des clés.
            </p>
          </div>
        </div>
        <div class="flex gap-6">
          <div class="flex items-start justify-center w-12 h-12 rounded-full bg-[#0b5b3a] text-white font-bold text-lg shrink-0">02</div>
          <div>
            <h3 class="text-[#0b5b3a] font-extrabold text-2xl mb-2">EXPERTISE TECHNIQUE AVANCÉE</h3>
            <p class="text-gray-700 text-[24px] leading-relaxed">
              <strong>Forte de plus de 15 ans d’expérience en génie civil</strong>, AIAE dispose
              de compétences rares pour traiter des projets complexes :
              ouvrages d’art, béton précontraint, structures spéciales.
            </p>
          </div>
        </div>
        <div class="flex gap-6">
           <div class="flex items-start justify-center w-12 h-12 rounded-full bg-[#0b5b3a] text-white font-bold text-lg shrink-0">03</div>
           <div>
             <h3 class="text-[#0b5b3a] font-extrabold text-2xl mb-2">TRANSPARENCE ET CONTRÔLE</h3>
             <p class="text-gray-700 text-[24px] leading-relaxed">
               Grâce à nos simulateurs et à nos process rigoureux, vous connaissez les
               <strong>coûts et les délais avant même le premier coup de pioche</strong>.
               Pas de surprises, des engagements contractuels tenus.
             </p>
           </div>
        </div>
        <div class="flex gap-6">
           <div class="flex items-start justify-center w-12 h-12 rounded-full bg-[#0b5b3a] text-white font-bold text-lg shrink-0">04</div>
           <div>
             <h3 class="text-[#0b5b3a] font-extrabold text-2xl mb-2">ACCOMPAGNEMENT DIASPORA</h3>
             <p class="text-gray-700 text-[24px] leading-relaxed">
               Nous offrons aux Togolais de l'extérieur la <strong>garantie d'un projet bien géré</strong>
               sans besoin de présence physique constante, avec un reporting régulier et transparent.
             </p>
           </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    // changement d'image dans le hero
    const tabButtons = document.querySelectorAll(".tabBtn");
    const hero = document.getElementById("heroImage");

    tabButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        hero.src = btn.dataset.img;
        tabButtons.forEach((b) => {
          b.classList.remove("bg-white", "shadow");
          b.classList.add("bg-glassDark");
        });
        btn.classList.remove("bg-glassDark");
        btn.classList.add("bg-white", "shadow");
      });
    });

    const openConfig = document.getElementById("openConfig");
    const configPanel = document.getElementById("configPanel");
    const openStand = document.getElementById("openStand");
    const standPanel = document.getElementById("standPanel");
    const openOptions = document.getElementById("openOptions");
    const optionsPanel = document.getElementById("optionsPanel");

    if (openConfig) openConfig.onclick = () => togglePanel(openConfig, configPanel);
    if (openStand) openStand.onclick = () => togglePanel(openStand, standPanel);
    if (openOptions) openOptions.onclick = () => togglePanel(openOptions, optionsPanel);

    // Salles de bain counter
    const plusBath = document.querySelector(".plusBath");
    const minusBath = document.querySelector(".minusBath");
    const bathCount = document.getElementById("bathCount");
    if (plusBath) plusBath.onclick = () => { bathCount.textContent = Number(bathCount.textContent) + 1; };
    if (minusBath) minusBath.onclick = () => { if (Number(bathCount.textContent) > 0) bathCount.textContent = Number(bathCount.textContent) - 1; };

    // Chambres counter
    const plusBed = document.querySelector(".plusBed");
    const minusBed = document.querySelector(".minusBed");
    const bedCount = document.getElementById("bedCount");
    if (plusBed) plusBed.onclick = () => { bedCount.textContent = Number(bedCount.textContent) + 1; };
    if (minusBed) minusBed.onclick = () => { if (Number(bedCount.textContent) > 0) bedCount.textContent = Number(bedCount.textContent) - 1; };
  </script>
@endsection
