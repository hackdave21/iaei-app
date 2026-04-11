@extends('layouts.frontend')

@section('title', 'Nos Divisions - AIAE')

@section('styles')
<style>
  strong { font-weight: 600; color: #1d1d1b; }
  .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
  .hover-lift:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15); }
</style>
@endsection

@section('content')

  <!-- ================= HERO ================= -->
  <section class="relative pt-4 md:pt-24 pb-20 md:pb-36 bg-[#f3f3f3] overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[200vw] sm:w-[150vw] md:w-[900px] aspect-square bg-[#e6e6e6] rounded-full"></div>
    <img src="{{ asset('aiae-frontend/Images/Gauche.png') }}" class="absolute left-0 top-1/2 -translate-y-1/2 w-[30vw] md:w-[40vw] lg:w-[470px]">
    <img src="{{ asset('aiae-frontend/Images/Droit.png') }}" class="absolute right-0 top-1/2 -translate-y-1/2 w-[30vw] md:w-[40vw] lg:w-[450px]">

    <div class="relative z-10 max-w-[900px] mx-auto text-center px-6 pt-28">
      <h1 class="text-darkBlue font-bold text-[40px] sm:text-[60px] md:text-[90px] leading-[1.05]">
        NOS <span class="text-primary">04</span><br>DIVISIONS
      </h1>
      <p class="mt-4 sm:mt-6 font-normal text-[10px] min-[400px]:text-xs sm:text-sm md:text-base text-black max-w-[520px] mx-auto leading-relaxed">
        AIAE STRUCTURE SON DÉVELOPPEMENT AUTOUR DE<br>
        <span class="font-heavy">QUATRE DIVISIONS COMPLÉMENTAIRES</span>, ENSEMBLE,<br>
        ELLES FORMENT UN <span class="font-heavy">ÉCOSYSTÈME INÉDIT SUR LE</span><br>
        <span class="font-heavy">MARCHÉ OUEST-AFRICAIN.</span>
      </p>
    </div>
  </section>

  <!-- ================= SECTION DIVISIONS DÉTAILLÉES ================= -->
  <section class="py-10 bg-[#f3f3f3]">
    <div class="max-w-[1100px] mx-auto px-6">

      <!-- Ligne 1 - Construction -->
      <div class="grid md:grid-cols-[0.8fr_1.2fr] gap-6 md:gap-12 md:items-stretch">
        <img src="{{ asset('aiae-frontend/Images/Constr.png') }}" class="rounded-[20px] w-full h-auto max-h-[300px] md:h-full md:max-h-none object-contain object-center">
        <div class="flex flex-col justify-center h-full gap-5 py-4">
          <div>
            <h3 class="text-[#05482C] font-bold text-[25px] md:text-[50px] uppercase tracking-tight mb-6 leading-none">CONSTRUCTION</h3>
            <p class="text-gray-700 leading-relaxed text-[18px] md:text-[26px]">
              <strong class="font-heavy text-gray-800 text-[20px] md:text-[26px] block mb-2">Cœur de métier.</strong>
              <strong class="font-heavy text-gray-800">Conception et réalisation :</strong> résidentiel, tertiaire, industriel, agricole, ouvrages d'art.
            </p>
          </div>
          <div>
            <span class="inline-block bg-[#05482C] text-white px-8 py-2 md:px-10 border-[4px] border-[#00a651] rounded-[50px] text-[20px] md:text-[22px] font-book mt-2 shadow-sm">Opérationnelle</span>
          </div>
        </div>
      </div>

      <div class="border-t border-gray-300 my-8 md:my-16"></div>

      <!-- Ligne 2 - Énergie -->
      <div class="grid md:grid-cols-[1.2fr_0.8fr] gap-6 md:gap-12 md:items-stretch">
        <div class="text-right flex flex-col justify-center h-full gap-5 order-2 md:order-1 py-4">
          <div>
            <h3 class="text-[#CC6A00] font-bold text-[25px] md:text-[50px] uppercase tracking-tight mb-6 leading-none">ÉNERGIE</h3>
            <p class="text-gray-700 leading-relaxed text-[18px] md:text-[26px]">
              Solutions <strong class="font-heavy text-gray-800">d'autonomie énergétique</strong> pour vos installations.<br>
              Solaire C&I, systèmes hybrides, sites isolés.
            </p>
          </div>
          <div>
            <p class="text-gray-600 text-[22px] md:text-[26px] mt-2">Lancement <span class="font-black text-gray-800">2026</span></p>
          </div>
        </div>
        <img src="{{ asset('aiae-frontend/Images/solair.png') }}" class="rounded-[20px] w-full h-auto max-h-[300px] md:h-full md:max-h-none object-contain object-center order-first md:order-last">
      </div>

      <div class="border-t border-gray-300 my-8 md:my-16"></div>

      <!-- Ligne 3 - Sécurité -->
      <div class="grid md:grid-cols-[0.8fr_1.2fr] gap-6 md:gap-12 md:items-stretch">
        <img src="{{ asset('aiae-frontend/Images/coffre.png') }}" class="rounded-[20px] w-full h-auto max-h-[300px] md:h-full md:max-h-none object-contain object-center">
        <div class="flex flex-col justify-center h-full gap-5 py-4">
          <div>
            <h3 class="text-[#05482C] font-bold text-[25px] md:text-[50px] uppercase tracking-tight mb-6 leading-none">SÉCURITÉ</h3>
            <p class="text-gray-700 leading-relaxed text-[18px] md:text-[26px]">
              <strong class="font-heavy text-gray-800">Protection haute performance</strong> pour vos biens et vos personnes. Chambres fortes EN 1143-1, safe rooms, armureries, contrôle d'accès.
            </p>
          </div>
          <div>
            <p class="text-[#05482C] text-[22px] md:text-[26px] mt-2">Prochainement</p>
          </div>
        </div>
      </div>

      <div class="border-t border-gray-300 my-8 md:my-16"></div>

      <!-- Ligne 4 - Préfabrication -->
      <div class="grid md:grid-cols-[1.2fr_0.8fr] gap-6 md:gap-12 md:items-stretch">
        <div class="text-right flex flex-col justify-center h-full gap-5 order-2 md:order-1 py-4">
          <div>
            <h3 class="text-[#CC6A00] font-bold text-[25px] md:text-[50px] uppercase tracking-tight mb-6 leading-none">PRÉFABRICATION</h3>
            <p class="text-gray-700 leading-relaxed text-[18px] md:text-[26px]">
              <strong class="font-heavy text-gray-800">Production industrielle</strong> d'éléments de construction. BTC, béton précontraint, poutrelles. -15 à -25% sur les coûts.
            </p>
          </div>
          <div>
            <p class="text-[#CC6A00] text-[22px] md:text-[26px] mt-2">Prochainement</p>
          </div>
        </div>
        <img src="{{ asset('aiae-frontend/Images/Préfabrication.png') }}" class="rounded-[20px] w-full h-auto max-h-[300px] md:h-full md:max-h-none object-contain object-center order-first md:order-last">
      </div>

    </div>
  </section>

  <!-- ================= SECTION CTA ================= -->
  <section class="bg-[#e5e5e5] py-10 relative z-20">
    <div class="max-w-[900px] mx-auto text-left md:text-center px-6">
      <h2 class="text-black text-4xl md:text-[65px] lg:text-[70px] font-heavy mb-8">Prêt À Construire ?</h2>
      <p class="text-[16px] md:text-[24px] text-black leading-relaxed mb-10 font-light">
        Vous avez un projet ? Parlons-en. Premier échange<br class="hidden md:block">
        gratuit et sans engagement.
      </p>
      <div class="flex flex-col md:flex-row justify-center">
        <a href="{{ route('contact') }}" class="bg-secondary text-white px-10 py-5 text-center font-heavy">
          DEMANDER UN DEVIS GRATUIT
          <span class="block text-sm font-light text-white">Réponse sous 48h</span>
        </a>
        <a href="{{ route('contact') }}" class="bg-primary text-white px-10 py-5 text-center font-heavy">
          PRENDRE RENDEZ-VOUS
          <span class="block text-sm font-light text-white">En personne ou en visio</span>
        </a>
      </div>
    </div>
  </section>

@endsection
