@extends('layouts.frontend')

@section('title', 'AIAE - Nos Clients & Partenaires')

@section('content')
  <!-- ================= HERO ================= -->
  <section class="relative px-1 sm:px-1 pt-1">
    <div class="relative max-w-[1600px] mx-auto rounded-[15px] overflow-hidden shadow-2xl">
      <img src="{{ asset('aiae-frontend/Images/institutions.png') }}" class="w-full h-[60vh] md:h-[70vh] object-cover" />

      <!-- overlay -->
      <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>

      <!-- contenu -->
      <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 px-10 md:px-16 max-w-7xl text-white">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[56px] font-bold mb-6">
          Nos Clients & Partenaires
        </h1>
        <p class="text-sm sm:text-base md:text-lg leading-relaxed mb-8 max-w-2xl">
          La confiance est le fondement de chacune de nos collaborations. 
          AIAE accompagne les institutions publiques, les entreprises privées et les familles de la diaspora dans leurs projets les plus ambitieux.
        </p>
      </div>
    </div>
  </section>

  <!-- ================= NOS PARTENAIRES ================= -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h2 class="text-2xl md:text-4xl font-bold text-darkBlue mb-16">Ils nous font confiance</h2>
      
      <div class="grid grid-cols-2 md:grid-cols-4 gap-12 items-center opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
        <!-- Logotypes génériques pour démonstration -->
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #1</span>
        </div>
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #2</span>
        </div>
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #3</span>
        </div>
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #4</span>
        </div>
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #5</span>
        </div>
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #6</span>
        </div>
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #7</span>
        </div>
        <div class="flex items-center justify-center p-6 bg-gray-50 rounded-xl h-32">
          <span class="text-xl font-bold text-gray-400">PARTENAIRE #8</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= TÉMOIGNAGES ================= -->
  <section class="py-20 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-2xl md:text-4xl font-bold text-darkBlue">Ce que disent nos clients</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Témoignage 1 -->
        <div class="bg-white p-10 rounded-3xl shadow-sm relative">
          <div class="text-primary text-6xl font-serif absolute top-6 right-10 opacity-10">“</div>
          <p class="text-gray-600 text-lg italic mb-8 relative z-10">
            « AIAE a su comprendre les contraintes spécifiques de notre site industriel. 
            Leur réactivité et la qualité de la structure métallique préfabriquée ont dépassé nos attentes. 
            Un partenaire fiable pour l'industrie togolaise. »
          </p>
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gray-200 rounded-full"></div>
            <div>
              <h4 class="font-bold text-darkBlue">M. Koffi Adjamagbo</h4>
              <p class="text-sm text-gray-400">Directeur Technique, Usine de Tsévié</p>
            </div>
          </div>
        </div>

        <!-- Témoignage 2 -->
        <div class="bg-white p-10 rounded-3xl shadow-sm relative">
          <div class="text-primary text-6xl font-serif absolute top-6 right-10 opacity-10">“</div>
          <p class="text-gray-600 text-lg italic mb-8 relative z-10">
            « En tant que membre de la diaspora, il est difficile de faire confiance à distance. 
            AIAE a été mes yeux et mes mains au pays. La transparence totale et les suivis hebdomadaires 
            m'ont permis de réaliser ma villa en toute sérénité. »
          </p>
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gray-200 rounded-full"></div>
            <div>
              <h4 class="font-bold text-darkBlue">Mme. Sarah Lawson</h4>
              <p class="text-sm text-gray-400">Investisseuse (Paris-Lomé)</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= NOS ENGAGEMENTS ================= -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex flex-col lg:flex-row items-center gap-16">
        <div class="lg:w-1/2">
          <img src="{{ asset('aiae-frontend/Images/engagement.png') }}" class="rounded-3xl shadow-2xl" />
        </div>
        <div class="lg:w-1/2">
          <h2 class="text-3xl md:text-4xl font-bold text-darkBlue mb-8">Un engagement sans faille</h2>
          <div class="space-y-6">
            <div class="flex gap-4">
              <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                <span class="text-primary font-bold">01</span>
              </div>
              <div>
                <h4 class="font-bold text-darkBlue text-xl">Transparence Totale</h4>
                <p class="text-gray-600">Devis détaillés sans frais cachés et reporting régulier de l'avancement.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                <span class="text-primary font-bold">02</span>
              </div>
              <div>
                <h4 class="font-bold text-darkBlue text-xl">Qualité Certifiée</h4>
                <p class="text-gray-600">Utilisation de matériaux normés et équipes hautement qualifiées.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                <span class="text-primary font-bold">03</span>
              </div>
              <div>
                <h4 class="font-bold text-darkBlue text-xl">Respect des Délais</h4>
                <p class="text-gray-600">Une organisation rigoureuse pour garantir une livraison à la date convenue.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= FINAL CTA ================= -->
  <section class="py-20 bg-primary text-white text-center">
    <div class="max-w-4xl mx-auto px-6">
      <h2 class="text-3xl md:text-5xl font-bold mb-8">Rejoignez la communauté AIAE</h2>
      <p class="text-lg opacity-80 mb-10">Faites partie de ceux qui transforment l'Afrique avec nous.</p>
      <a href="{{ route('contact') }}" class="bg-white text-primary px-12 py-4 rounded-xl font-bold text-xl hover:bg-gray-100 transition inline-block">
        Lancez votre projet maintenant
      </a>
    </div>
  </section>
@endsection
