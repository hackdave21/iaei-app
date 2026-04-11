@extends('layouts.frontend')

@section('title', 'Diaspora - Construire au Togo depuis l\'étranger - AIAE')

@section('styles')
<style>
  strong { font-weight: 600; color: #1d1d1b; }
</style>
@endsection

@section('content')

  <!-- ================= HERO DIASPORA ================= -->
  <section class="pt-24 md:pt-32 pb-5 bg-[#e6e6e6]">
    <div class="max-w-[99%] mx-auto px-2">
      <div class="relative rounded-[25px] overflow-hidden shadow-3xl">
        <img src="{{ asset('aiae-frontend/Images/home.png') }}" class="w-full h-[600px] sm:h-[500px] md:h-[400px] object-cover">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="absolute inset-0 flex flex-col justify-center p-10 md:p-20 text-white">

          <h1 class="leading-[0.85] mb-4 md:mb-8">
            <span class="block text-[30px] sm:text-[40px] md:text-[85px] font-light tracking-tight">CONSTRUIRE AU TOGO</span>
            <span class="block text-[32px] sm:text-[45px] md:text-[115px] font-bold tracking-tighter">DEPUIS L'ÉTRANGER</span>
          </h1>

          <div class="max-w-[1000px] text-[15px] sm:text-[18px] md:text-[22px] leading-[1.4]">
            <p class="mb-4"><strong class="text-white font-heavy">Et c'est serein avec AIAE.</strong></p>
            <p class="mt-4 md:mt-6">
              Vous vivez en France, au Canada, aux États-Unis, en Allemagne ou ailleurs ?<br class="hidden md:block">
              Vous rêvez de <strong class="text-white font-heavy">construire votre maison, votre résidence secondaire</strong><br class="hidden md:block">
              ou un <strong class="text-white font-heavy">investissement locatif au Togo ?</strong> AIAE vous accompagne à<br class="hidden md:block">
              chaque étape, <strong class="text-white font-heavy">de la première visioconférence à la remise de vos clés.</strong>
            </p>
          </div>

          <!-- BOUTONS (Desktop) -->
          <div class="hidden md:flex absolute bottom-6 right-6 flex-col gap-4">
            <a href="{{ route('contact') }}" class="bg-primary hover:bg-[#043b24] text-white px-8 py-3 rounded-full flex flex-col items-center text-center transition-all hover:scale-105 shadow-xl font-bold">
              <p class="text-[17px] tracking-wide font-light whitespace-nowrap">Prendre rdv en visio <span class="text-[12px] font-light opacity-80">(fuseau adapté)</span></p>
            </a>
            <a href="{{ route('contact') }}" class="bg-primary hover:bg-[#043b24] text-white px-8 py-3 rounded-full flex items-center justify-between gap-4 transition-all hover:scale-105 shadow-xl min-w-[280px] font-bold">
              <p class="text-[17px] text-left font-light leading-tight tracking-wide whitespace-nowrap">Prendre rendez-vous maintenant</p>
              <img src="{{ asset('aiae-frontend/Images/envoiblanc.png') }}" alt="icon" class="w-6 h-6 object-contain" />
            </a>
          </div>

          <!-- BOUTONS MOBILE -->
          <div class="md:hidden flex flex-col gap-3 mt-8">
            <a href="{{ route('contact') }}" class="bg-primary text-white px-4 py-3 rounded-full flex flex-col items-center text-center font-bold shadow-lg">
              <p class="text-[14px] tracking-wide font-light">Prendre rdv en visio</p>
            </a>
            <a href="{{ route('contact') }}" class="bg-primary text-white px-4 py-3 rounded-full flex items-center justify-center gap-3 font-bold shadow-lg">
              <p class="text-[14px] font-light">Prendre rendez-vous maintenant</p>
              <img src="{{ asset('aiae-frontend/Images/envoiblanc.png') }}" alt="icon" class="w-5 h-5 object-contain" />
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ================= CE QUI VOUS INQUIÈTE ================= -->
  <section class="bg-[#e6e6e6] py-5">
    <div class="max-w-[1000px] mx-auto px-6 text-center">
      <h2 class="leading-[0.9] uppercase">
        <span class="block text-[32px] sm:text-[45px] font-bold md:text-[95px] text-[#121a44]">ON SAIT CE QUI</span>
        <span class="block text-[32px] sm:text-[45px] font-bold md:text-[95px] text-primary">VOUS INQUIÈTE</span>
      </h2>
      <p class="mt-6 text-[15px] sm:text-[18px] md:text-[20px] text-black uppercase tracking-[1px] leading-[1.7]">
        CONSTRUIRE AU TOGO DEPUIS L'ÉTRANGER : <strong class="font-heavy text-black">VOICI NOS RÉPONSES</strong>
      </p>
    </div>
  </section>

  <!-- ================= FAQ SECTION ================= -->
  <section class="bg-[#f3f3f3] py-10">
    <div class="max-w-[1100px] mx-auto px-6 space-y-4">

      <details open class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">01</span>
            <p class="font-heavy text-3xl text-darkBlue">Mon argent sera-t-il bien utilisé ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-darkBlue font-book text-xl border-t border-darkBlue pt-6">
          Chaque franc est tracé. Vous recevez un devis ligne par ligne basé sur notre Bordereau des Prix Unitaires (BPU). Le paiement se fait par étapes, uniquement sur constat d'avancement validé par photos et vidéos.
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">02</span>
            <p class="font-heavy text-3xl text-darkBlue">Comment suivre mon chantier à 10 000 km ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-darkBlue font-book text-xl border-t border-darkBlue pt-6">
          Rapports photos et vidéos hebdomadaires envoyés par WhatsApp ou email. Visioconférences de suivi bimensuelles adaptées à votre fuseau horaire. Un chef de projet dédié, joignable par téléphone et WhatsApp.
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">03</span>
            <p class="font-heavy text-3xl text-darkBlue">Comment payer en toute sécurité depuis l'étranger ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-darkBlue font-book text-xl border-t border-darkBlue pt-6">
          Virement international vers un compte bancaire togolais vérifié, au nom de l'entreprise AIAE SARL. Échéancier clair. Reçu émis pour chaque versement.
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">04</span>
            <p class="font-heavy text-3xl text-darkBlue">Et les démarches administratives au Togo ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-darkBlue font-book text-xl border-t border-darkBlue pt-6">
          Nous gérons tout pour vous : permis de construire, raccordements (eau, électricité, télécom), formalités foncières si nécessaire.
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">05</span>
            <p class="font-heavy text-3xl text-darkBlue">Quelle garantie ai-je que le travail sera bien fait ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-darkBlue font-book text-xl border-t border-darkBlue pt-6">
          Garantie décennale contractuelle sur la structure (10 ans). Garantie de parfait achèvement (1 an). Contrat détaillé signable devant notaire.
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">06</span>
            <p class="font-heavy text-3xl text-darkBlue">Je n'ai pas encore de terrain, pouvez-vous m'aider ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-darkBlue font-book text-xl border-t border-darkBlue pt-6">
          Nous pouvons vous conseiller sur le choix du terrain en fonction de votre projet (zone, type de sol, accessibilité).
        </div>
      </details>

    </div>
  </section>

  <!-- ================= VOTRE PARCOURS AVEC AIAE ================= -->
  <section class="pt-5 pb-5 bg-primary">
    <div class="text-center">
      <h2 class="text-[40px] md:text-[55px] font-heavy uppercase mb-4 tracking-tight">
        <span class="text-white">VOTRE</span> <span class="text-secondary">PARCOURS</span> <span class="text-white">AVEC AIAE</span>
      </h2>
      <p class="text-white text-[18px] md:text-[26px] font-light opacity-90 italic">
        De votre <strong class="font-heavy text-white">premier appel</strong> à la <strong class="font-heavy text-white">remise des clés</strong>
      </p>
    </div>
  </section>

  <section class="bg-[#f2f3f5] py-20 w-full relative overflow-hidden">
    <div class="max-w-[1200px] mx-auto px-6 relative z-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-16">

        @php
        $steps = [
          ['01', 'PREMIER CONTACT VISIOCONFÉRENCE GRATUITE', 'Échange en visioconférence adapté à votre fuseau horaire. Nous écoutons votre projet, vos besoins, votre budget. Gratuit et sans engagement. Durée : 30 à 45 minutes.'],
          ['02', 'ÉTUDE ET DEVIS À DISTANCE', 'Nous réalisons les études préliminaires : faisabilité technique, esquisse architecturale, devis détaillé basé sur le BPU. Tout est transmis par email. Délai : 2 à 4 semaines.'],
          ['03', 'CONTRAT + ÉCHÉANCIER DE PAIEMENT', 'Contrat détaillé envoyé par email. Signature électronique à distance ou devant notaire au Togo. Échéancier de paiement clair, lié à des jalons d\'avancement vérifiables.'],
          ['04', 'CONSTRUCTION + SUIVI EN TEMPS RÉEL', 'Rapports photos et vidéos hebdomadaires, visioconférences de suivi bimensuelles. Votre chef de projet est joignable par téléphone et WhatsApp.'],
          ['05', 'RÉCEPTION ET REMISE DES CLÉS', 'Procès-verbal de réception établi lors de votre visite ou par visioconférence détaillée. Réserves notées et corrigées. Remise des clés et de la documentation technique complète.'],
          ['06', 'SUIVI POST-LIVRAISON', 'Garantie de parfait achèvement pendant 1 an : tout défaut constaté est réparé gratuitement. Garantie décennale sur la structure. Votre interlocuteur AIAE reste disponible.'],
        ];
        @endphp

        @foreach($steps as $step)
        <div class="flex gap-6 items-start">
          <div class="flex-shrink-0 w-12 h-12 md:w-16 md:h-16 rounded-full bg-primary flex items-center justify-center text-white text-[20px] md:text-[28px] font-heavy shadow-lg">{{ $step[0] }}</div>
          <div>
            <h3 class="text-[18px] text-primary md:text-[22px] font-bold uppercase mb-3 leading-tight tracking-wide">{!! nl2br(e($step[1])) !!}</h3>
            <p class="text-[#4a4a4a] text-[20px] md:text-[22px] leading-relaxed">{{ $step[2] }}</p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- ================= SECTION CTA ================= -->
  <section class="bg-[#e6e6e6] py-10 w-full">
    <div class="max-w-[900px] mx-auto text-left md:text-center px-6">
      <h2 class="text-black text-4xl md:text-[55px] font-heavy mb-6 leading-tight">Prêt à Lancer Votre Projet ?</h2>
      <p class="text-gray-600 leading-relaxed mb-10 text-[16px] md:text-[27px]">
        Premier échange gratuit et sans engagement.<br class="hidden md:block"> Adapté à votre fuseau horaire.
      </p>
      <div class="flex flex-col md:flex-row justify-center">
        <a href="{{ route('contact') }}" class="bg-secondary text-white px-10 py-5 text-center font-heavy uppercase tracking-wider">
          DEMANDER UN DEVIS GRATUIT
          <span class="block text-sm font-light text-white normal-case">Réponse sous 48h</span>
        </a>
        <a href="{{ route('contact') }}" class="bg-primary text-white px-10 py-5 text-center font-heavy uppercase tracking-wider">
          PRENDRE RDV EN VISIO
          <span class="block text-sm font-light text-white normal-case">Soirées et week-ends disponibles</span>
        </a>
      </div>
    </div>
  </section>

@endsection
