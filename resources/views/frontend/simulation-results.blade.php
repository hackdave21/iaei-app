@extends('layouts.frontend')

@section('title', 'Résultats de Simulation - AIAE')

@section('content')

  <section class="pt-40 pb-20 bg-[#121a44] text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-6xl font-heavy mb-4 uppercase tracking-tighter">
        Résultats de votre <span class="text-[#FF8400]">Simulation</span>
      </h1>
      <p class="text-lg opacity-80 font-light max-w-2xl mx-auto">
        Retrouvez ci-dessous le récapitulatif de votre estimation budgétaire.
      </p>
    </div>
  </section>

  <section class="bg-[#f4f5f7] py-20">
    <div class="max-w-[900px] mx-auto px-6">

      <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 text-center">
        <div class="w-20 h-20 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-6">
          <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>

        <h2 class="text-2xl md:text-3xl font-heavy text-darkBlue mb-4">Simulation enregistrée avec succès</h2>

        <p class="text-gray-600 text-lg mb-8 leading-relaxed">
          Votre simulation a été sauvegardée. Vous pouvez la retrouver dans votre espace personnel
          et la consulter à tout moment.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="{{ route('profile') }}" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-[#043b24] transition-colors">
            Voir mes simulations
          </a>
          <a href="{{ route('simulator.index') }}" class="bg-secondary text-white px-8 py-3 rounded-xl font-bold hover:brightness-110 transition-all">
            Nouvelle simulation
          </a>
        </div>
      </div>

      <!-- CTA -->
      <div class="mt-12 text-center">
        <p class="text-gray-500 text-lg mb-4">
          Vous souhaitez aller plus loin ? Demandez un devis détaillé gratuit.
        </p>
        <a href="{{ route('contact') }}" class="inline-block bg-darkBlue text-white px-10 py-4 rounded-xl font-heavy hover:bg-[#0e1540] transition-colors">
          DEMANDER UN DEVIS GRATUIT
        </a>
      </div>

    </div>
  </section>

@endsection
