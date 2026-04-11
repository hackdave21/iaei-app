@extends('layouts.frontend')

@section('title', 'AIAE - Projets & Réalisations')

@section('content')
  <!-- ================= HERO ================= -->
  <section class="relative px-1 sm:px-1 pt-1">
    <div class="relative max-w-[1600px] mx-auto rounded-[15px] overflow-hidden shadow-2xl">
      <img src="{{ asset('aiae-frontend/Images/industriel.png') }}" class="w-full h-[60vh] md:h-[70vh] object-cover" />

      <!-- overlay -->
      <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>

      <!-- contenu -->
      <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 px-10 md:px-16 max-w-7xl text-white">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[56px] font-bold mb-6">
          Nos Projets & Réalisations
        </h1>
        <p class="text-sm sm:text-base md:text-lg leading-relaxed mb-8 max-w-2xl">
          Découvrez comment nous transformons des visions en infrastructures concrètes. 
          De la construction résidentielle aux grands complexes industriels, AIAE livre l'excellence sur tout le territoire.
        </p>
      </div>
    </div>
  </section>

  <!-- ================= INTRODUCTION ================= -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h2 class="text-2xl md:text-4xl font-bold text-darkBlue mb-8">L'Excellence Technique au Service de l'Afrique</h2>
      <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
        AIAE s'engage à fournir des solutions d'ingénierie et de construction durables. 
        Chaque projet est pour nous l'opportunité de démontrer notre savoir-faire unique dans l'intégration 
        de technologies modernes et de pratiques respectueuses de l'environnement.
      </p>
    </div>
  </section>

  <!-- ================= CATEGORIES & PROJECTS GRID ================= -->
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
      
      <!-- Filtres (Visuels) -->
      <div class="flex flex-wrap justify-center gap-4 mb-16">
        <button class="px-6 py-2 rounded-full bg-primary text-white shadow-lg">Tous les projets</button>
        <button class="px-6 py-2 rounded-full bg-white text-darkBlue hover:bg-gray-100 transition">Résidentiel</button>
        <button class="px-6 py-2 rounded-full bg-white text-darkBlue hover:bg-gray-100 transition">Tertiaire</button>
        <button class="px-6 py-2 rounded-full bg-white text-darkBlue hover:bg-gray-100 transition">Industriel</button>
        <button class="px-6 py-2 rounded-full bg-white text-darkBlue hover:bg-gray-100 transition">Énergie & Solaire</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Projet 1 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-md group border border-gray-100 transition-all hover:shadow-xl">
          <div class="relative h-64 overflow-hidden">
            <img src="{{ asset('aiae-frontend/Images/familles.png') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
            <div class="absolute top-4 left-4 bg-primary text-white text-xs px-3 py-1 rounded-full">Résidentiel</div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-darkBlue mb-2">Résidence Oasis</h3>
            <p class="text-gray-500 text-sm mb-4">Construction d'un complexe résidentiel de 12 villas de luxe à Lomé.</p>
            <div class="flex justify-between items-center text-xs text-gray-400 font-medium">
              <span>2024</span>
              <span>Lomé, Togo</span>
            </div>
          </div>
        </div>

        <!-- Projet 2 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-md group border border-gray-100 transition-all hover:shadow-xl">
          <div class="relative h-64 overflow-hidden">
            <img src="{{ asset('aiae-frontend/Images/entreprises.png') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
            <div class="absolute top-4 left-4 bg-secondary text-white text-xs px-3 py-1 rounded-full">Tertiaire</div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-darkBlue mb-2">Bureaux AIAE HQ</h3>
            <p class="text-gray-500 text-sm mb-4">Conception d'un immeuble de bureaux à haute efficacité énergétique.</p>
            <div class="flex justify-between items-center text-xs text-gray-400 font-medium">
              <span>2023</span>
              <span>Lomé II, Togo</span>
            </div>
          </div>
        </div>

        <!-- Projet 3 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-md group border border-gray-100 transition-all hover:shadow-xl">
          <div class="relative h-64 overflow-hidden">
            <img src="{{ asset('aiae-frontend/Images/industriel.png') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
            <div class="absolute top-4 left-4 bg-darkBlue text-white text-xs px-3 py-1 rounded-full">Industriel</div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-darkBlue mb-2">Unité de Préfabrication</h3>
            <p class="text-gray-500 text-sm mb-4">Extension d'un site industriel pour la production locale de matériaux.</p>
            <div class="flex justify-between items-center text-xs text-gray-400 font-medium">
              <span>2023</span>
              <span>Tsévié, Togo</span>
            </div>
          </div>
        </div>

        <!-- Projet 4 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-md group border border-gray-100 transition-all hover:shadow-xl">
          <div class="relative h-64 overflow-hidden">
            <img src="{{ asset('aiae-frontend/Images/sim.png') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
            <div class="absolute top-4 left-4 bg-yellow-600 text-white text-xs px-3 py-1 rounded-full">Énergie</div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-darkBlue mb-2">Champ Solaire Rural</h3>
            <p class="text-gray-500 text-sm mb-4">Installation de 500kW de panneaux solaires pour l'électrification rurale.</p>
            <div class="flex justify-between items-center text-xs text-gray-400 font-medium">
              <span>2024</span>
              <span>Région des Savanes</span>
            </div>
          </div>
        </div>

        <!-- Projet 5 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-md group border border-gray-100 transition-all hover:shadow-xl">
          <div class="relative h-64 overflow-hidden">
            <img src="{{ asset('aiae-frontend/Images/institutions.png') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
            <div class="absolute top-4 left-4 bg-gray-500 text-white text-xs px-3 py-1 rounded-full">Public</div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-darkBlue mb-2">École Moderne</h3>
            <p class="text-gray-500 text-sm mb-4">Construction d'un centre éducatif innovant avec préfabrication rapide.</p>
            <div class="flex justify-between items-center text-xs text-gray-400 font-medium">
              <span>2023</span>
              <span>Kara, Togo</span>
            </div>
          </div>
        </div>

        <!-- Projet 6 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-md group border border-gray-100 transition-all hover:shadow-xl">
          <div class="relative h-64 overflow-hidden">
            <img src="{{ asset('aiae-frontend/Images/coffre.png') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
            <div class="absolute top-4 left-4 bg-red-800 text-white text-xs px-3 py-1 rounded-full">Sécurité</div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-darkBlue mb-2">Sécurisation Bancaire</h3>
            <p class="text-gray-500 text-sm mb-4">Audit et renforcement de la sécurité physique pour une institution majeure.</p>
            <div class="flex justify-between items-center text-xs text-gray-400 font-medium">
              <span>2024</span>
              <span>Lomé, Togo</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= FINAL CTA ================= -->
  <section class="py-20 bg-darkBlue text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
      <img src="{{ asset('aiae-frontend/Images/footer.png') }}" class="w-full h-full object-cover" />
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
      <h2 class="text-3xl md:text-5xl font-bold mb-8">Vous avez un projet en tête ?</h2>
      <p class="text-lg opacity-80 mb-10 max-w-2xl mx-auto">
        Discutons de vos besoins et voyons comment l'expertise AIAE peut donner vie à vos ambitions.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-6">
        <a href="{{ route('contact') }}" class="bg-white text-darkBlue px-10 py-4 rounded-xl font-bold hover:bg-gray-100 transition">
          Prendre Rendez-vous
        </a>
        <a href="{{ route('contact') }}" class="border-2 border-white text-white px-10 py-4 rounded-xl font-bold hover:bg-white/10 transition">
          Demander un Devis
        </a>
      </div>
    </div>
  </section>
@endsection
