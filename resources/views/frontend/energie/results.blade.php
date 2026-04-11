@extends('layouts.frontend')

@section('title', 'Résultat Estimation Énergie - AIAE')

@section('content')

  <section class="pt-40 pb-10 bg-[#121a44] text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-6xl font-heavy mb-4 uppercase tracking-tighter">
        Votre Estimation <span class="text-[#FF8400]">Énergie</span>
      </h1>
      <p class="text-lg opacity-80 font-light max-w-2xl mx-auto">
        Code de référence : <strong class="text-white font-heavy">{{ $estimation->code_estimation }}</strong>
      </p>
    </div>
  </section>

  <section class="bg-[#f4f5f7] py-16">
    <div class="max-w-[1000px] mx-auto px-6">

      @php
        $resultats = json_decode($estimation->resultats ?? '{}', true);
        $details = json_decode($estimation->details_techniques ?? '{}', true);
      @endphp

      <!-- RÉCAPITULATIF -->
      <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 mb-8">
        <h2 class="text-2xl font-heavy text-darkBlue mb-6 flex items-center gap-3">
          <span class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white text-lg">⚡</span>
          Récapitulatif de l'estimation
        </h2>

        <div class="grid md:grid-cols-2 gap-6">
          <div class="space-y-4">
            @if($estimation->nom)
            <div class="flex justify-between border-b border-gray-100 pb-3">
              <span class="text-gray-500">Nom</span>
              <span class="font-heavy text-darkBlue">{{ $estimation->nom }}</span>
            </div>
            @endif
            <div class="flex justify-between border-b border-gray-100 pb-3">
              <span class="text-gray-500">Email</span>
              <span class="font-heavy text-darkBlue">{{ $estimation->email }}</span>
            </div>
            @if($estimation->telephone)
            <div class="flex justify-between border-b border-gray-100 pb-3">
              <span class="text-gray-500">Téléphone</span>
              <span class="font-heavy text-darkBlue">{{ $estimation->telephone }}</span>
            </div>
            @endif
            <div class="flex justify-between border-b border-gray-100 pb-3">
              <span class="text-gray-500">Date</span>
              <span class="font-heavy text-darkBlue">{{ \Carbon\Carbon::parse($estimation->created_at)->format('d/m/Y à H:i') }}</span>
            </div>
          </div>

          <div class="bg-primary/5 rounded-xl p-6">
            <h3 class="font-heavy text-primary text-lg mb-4">Résultats</h3>
            @if(is_array($resultats))
              @foreach($resultats as $key => $value)
                <div class="flex justify-between py-2 border-b border-primary/10 last:border-0">
                  <span class="text-gray-600 text-sm">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
                  <span class="font-heavy text-darkBlue">
                    @if(is_numeric($value))
                      {{ number_format($value, 0, ',', ' ') }}
                    @else
                      {{ $value }}
                    @endif
                  </span>
                </div>
              @endforeach
            @else
              <p class="text-gray-500">Aucun résultat disponible.</p>
            @endif
          </div>
        </div>
      </div>

      <!-- DÉTAILS TECHNIQUES -->
      @if(!empty($details) && is_array($details))
      <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 mb-8">
        <h2 class="text-2xl font-heavy text-darkBlue mb-6 flex items-center gap-3">
          <span class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white text-lg">📋</span>
          Détails techniques
        </h2>
        <div class="space-y-3">
          @foreach($details as $key => $value)
            <div class="flex justify-between py-2 border-b border-gray-100 last:border-0">
              <span class="text-gray-500">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
              <span class="font-heavy text-darkBlue">
                @if(is_numeric($value))
                  {{ number_format($value, 0, ',', ' ') }}
                @elseif(is_array($value))
                  {{ implode(', ', $value) }}
                @else
                  {{ $value }}
                @endif
              </span>
            </div>
          @endforeach
        </div>
      </div>
      @endif

      <!-- CTA -->
      <div class="text-center mt-12">
        <p class="text-gray-500 text-lg mb-6">
          Intéressé par cette solution ? Contactez-nous pour un accompagnement personnalisé.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="{{ route('contact') }}" class="bg-primary text-white px-8 py-4 rounded-xl font-heavy hover:bg-[#043b24] transition-colors">
            DEMANDER UN DEVIS
          </a>
          <a href="{{ url('/energie/calculateur') }}" class="bg-secondary text-white px-8 py-4 rounded-xl font-heavy hover:brightness-110 transition-all">
            NOUVELLE ESTIMATION
          </a>
        </div>
      </div>

    </div>
  </section>

@endsection
