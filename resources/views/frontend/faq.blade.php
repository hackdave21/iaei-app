@extends('layouts.frontend')

@section('title', 'Foire Aux Questions - AIAE')

@section('styles')
<style>
  strong { font-weight: 600; color: #1d1d1b; }
</style>
@endsection

@section('content')

  <!-- ================= SECTION TITRE HERO ================= -->
  <section class="bg-[#161c42] pt-40 pb-10 w-full text-center">
    <h1 class="text-white text-[45px] md:text-[65px] font-heavy tracking-wide uppercase">
      Construction & Prix
    </h1>
  </section>

  <!-- ================= SECTION FAQ CONSTRUCTION ================= -->
  <section class="bg-[#f2f3f5] py-10 pb-20 w-full">
    <div class="max-w-[1100px] mx-auto px-6 space-y-4">

      <!-- Q01 -->
      <details open class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">01</span>
            <p class="font-heavy text-3xl text-darkBlue">Combien coûte la construction d'une maison au Togo ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p class="mb-6">Le coût dépend du standing choisi et de la surface. Nos fourchettes de prix de base au mètre carré sont :</p>
          <ul class="space-y-1 mb-6">
            <li><strong class="font-heavy text-[#343434]">Standard : </strong> 180 000 - 250 000 FCFA</li>
            <li><strong class="font-heavy text-[#343434]">Confort : </strong> 280 000 - 380 000 FCFA</li>
            <li><strong class="font-heavy text-[#343434]">Premium : </strong> 420 000 - 550 000 FCFA</li>
            <li><strong class="font-heavy text-[#343434]">Prestige : </strong> 600 000 - 900 000 FCFA</li>
          </ul>
          <p class="text-[18px] italic text-gray-500 mb-6 font-book">* Prix de base hors coefficients géographiques, géotechniques et hors frais d'études.</p>
          <p><strong class="font-heavy text-[#343434]">Ces prix couvrent le bâtiment</strong> (gros œuvre + finitions). <strong class="font-heavy text-[#343434]">Les équipements</strong> (solaire, forage, piscine, etc.) <strong class="font-heavy text-[#343434]">sont chiffrés séparément</strong>.</p>
        </div>
      </details>

      <!-- Q02 -->
      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">02</span>
            <p class="font-heavy text-3xl text-darkBlue">Quels sont les délais de construction ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p class="mb-4">Les délais dépendent de la surface et du standing :</p>
          <ul class="list-disc pl-5 space-y-1 mb-4">
            <li><strong class="font-heavy text-[#343434]">Villa Standard 100-150 m² :</strong> 8-12 mois.</li>
            <li><strong class="font-heavy text-[#343434]">Villa Confort/Premium 200-400 m² :</strong> 12-18 mois.</li>
            <li><strong class="font-heavy text-[#343434]">Villa Prestige 400 m²+ :</strong> 16-22 mois.</li>
          </ul>
          <p>Les délais sont contractuels et inscrits au contrat.</p>
        </div>
      </details>

      <!-- Q03 -->
      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">03</span>
            <p class="font-heavy text-3xl text-darkBlue">Intervenez-vous en dehors de Lomé ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Oui. Nous intervenons sur tout le territoire togolais : Grand Lomé, Maritime, Plateaux, Centrale, Kara et Savanes. Un coefficient géographique est appliqué pour refléter les coûts logistiques spécifiques à chaque zone.</p>
        </div>
      </details>

      <!-- Q04 -->
      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">04</span>
            <p class="font-heavy text-3xl text-darkBlue">Quelle est la différence entre les standings ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <ul class="space-y-3">
            <li><strong class="font-heavy text-[#343434]">Standard :</strong> fonctionnel et solide. Carrelage local, menuiseries alu standard, peinture vinylique.</li>
            <li><strong class="font-heavy text-[#343434]">Confort :</strong> qualité supérieure. Carrelage grès cérame, menuiseries alu renforcées, peinture acrylique.</li>
            <li><strong class="font-heavy text-[#343434]">Premium :</strong> haut de gamme. Faïence importée, baies vitrées, domotique partielle, hauteur sous plafond 3m.</li>
            <li><strong class="font-heavy text-[#343434]">Prestige :</strong> sur-mesure, matériaux nobles. Architecture personnalisée, domotique complète.</li>
          </ul>
        </div>
      </details>

      <!-- Q05 -->
      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">05</span>
            <p class="font-heavy text-3xl text-darkBlue">Proposez-vous des facilités de paiement ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Oui. Le paiement se fait par étapes, au fur et à mesure de l'avancement des travaux. L'échéancier est défini ensemble avant le démarrage.</p>
        </div>
      </details>

      <!-- Q06 -->
      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">06</span>
            <p class="font-heavy text-3xl text-darkBlue">Quelles garanties offrez-vous ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Garantie décennale (10 ans) sur la structure portante, garantie de parfait achèvement (1 an), assurance responsabilité civile professionnelle.</p>
        </div>
      </details>

      <!-- Q07 -->
      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">07</span>
            <p class="font-heavy text-3xl text-darkBlue">Le terrain est-il inclus dans le prix ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Non. Nos prix au mètre carré concernent la construction uniquement (hors terrain).</p>
        </div>
      </details>

      <!-- Q08 -->
      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">08</span>
            <p class="font-heavy text-3xl text-darkBlue">Construisez-vous aussi des bâtiments commerciaux ou industriels ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Oui. AIAE intervient dans 4 secteurs : résidentiel, tertiaire, industriel et agricole.</p>
        </div>
      </details>

    </div>
  </section>

  <!-- ================= DIASPORA ================= -->
  <section class="bg-secondary py-6 md:py-8 w-full text-center">
    <h2 class="text-white text-[50px] md:text-[60px] font-heavy tracking-wide uppercase">Diaspora</h2>
  </section>

  <section class="bg-[#f2f3f5] py-10 pb-20 w-full">
    <div class="max-w-[1100px] mx-auto px-6 space-y-4">

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">01</span>
            <p class="font-heavy text-3xl text-secondary">Puis-je lancer un projet sans être au Togo ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Oui, absolument. Tout le processus est conçu pour être géré à distance.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">02</span>
            <p class="font-heavy text-3xl text-secondary">Comment suivre mon chantier depuis l'étranger ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Rapports photos/vidéos hebdomadaires, visioconférences de suivi selon vos disponibilités. Un chef de projet dédié est votre interlocuteur unique.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">03</span>
            <p class="font-heavy text-3xl text-secondary">Quel budget minimum pour un projet diaspora ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Pour une villa Standard de 100 m² en Grand Lomé, comptez à partir de 25 millions FCFA (environ 38 000 €) pour la construction seule.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">04</span>
            <p class="font-heavy text-3xl text-secondary">Les paiements sont-ils sécurisés ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Oui. Virements internationaux vers le compte bancaire vérifié de AIAE SARL. Contrat signable devant notaire.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">05</span>
            <p class="font-heavy text-3xl text-secondary">Puis-je combiner construction et énergie solaire ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Oui, c'est l'un de nos atouts majeurs. Notre Division Énergie intègre une installation solaire dès la conception.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">06</span>
            <p class="font-heavy text-3xl text-secondary">Avez-vous un bureau en France / Europe ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Nous n'avons pas de bureau physique en Europe. La visioconférence reste notre mode principal, adaptée à votre fuseau horaire.</p>
        </div>
      </details>

    </div>
  </section>

  <!-- ================= SIMULATEUR EN LIGNE ================= -->
  <section class="bg-[#084c2e] py-10 w-full text-center">
    <h2 class="text-white text-[50px] md:text-[60px] font-heavy tracking-wide uppercase">SIMULATEUR EN LIGNE</h2>
  </section>

  <section class="bg-[#f2f3f5] py-10 pb-20 w-full">
    <div class="max-w-[1100px] mx-auto px-6 space-y-4">

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">01</span>
            <p class="font-heavy text-3xl text-primary">Le résultat du simulateur est-il un devis ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>Non. Le simulateur fournit une estimation budgétaire indicative sous forme de fourchette.</p>
        </div>
      </details>

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">02</span>
            <p class="font-heavy text-3xl text-primary">Comment est calculée l'estimation ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>L'estimation est basée sur nos prix de référence au m² par standing, ajustés par des coefficients géographiques et géotechniques.</p>
        </div>
      </details>

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">03</span>
            <p class="font-heavy text-3xl text-primary">Puis-je sauvegarder ma simulation ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>Oui. En créant un compte gratuit, vous pouvez sauvegarder vos simulations, les comparer et les reprendre plus tard.</p>
        </div>
      </details>

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">04</span>
            <p class="font-heavy text-3xl text-primary">Pourquoi le résultat est-il une fourchette ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>Parce que le coût réel dépend de choix de matériaux, de la complexité architecturale et des conditions du marché.</p>
        </div>
      </details>

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">05</span>
            <p class="font-heavy text-3xl text-primary">Le simulateur couvre-t-il les bâtiments non résidentiels ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>Oui. Le simulateur propose 4 secteurs : résidentiel, tertiaire, industriel et agricole.</p>
        </div>
      </details>

    </div>
  </section>

  <!-- ================= ÉNERGIE & ÉQUIPEMENTS ================= -->
  <section class="bg-darkBlue py-10 w-full text-center">
    <h2 class="text-white text-[50px] md:text-[60px] font-heavy tracking-wide uppercase">ÉNERGIE & ÉQUIPEMENTS</h2>
  </section>

  <section class="bg-[#f2f3f5] py-10 pb-20 w-full">
    <div class="max-w-[1100px] mx-auto px-6 space-y-4">

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">01</span>
            <p class="font-heavy text-3xl text-darkBlue">Proposez-vous des installations solaires ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Oui. Notre Division Énergie (opérationnelle en 2026) propose des kits solaires hybrides de 3 kWc à 50 kWc.</p>
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">02</span>
            <p class="font-heavy text-3xl text-darkBlue">Pouvez-vous installer un forage ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Oui. Nous proposons des forages de 30 à 120 mètres selon la profondeur de la nappe dans votre zone.</p>
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">03</span>
            <p class="font-heavy text-3xl text-darkBlue">Quels équipements optionnels proposez-vous ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Énergie (solaire, groupes électrogènes), sécurité (alarme, vidéosurveillance), extérieurs (clôture, portail, forage, piscine), confort (domotique, volets roulants).</p>
        </div>
      </details>

      <details class="group border border-darkBlue rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-darkBlue text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">04</span>
            <p class="font-heavy text-3xl text-darkBlue">Les équipements sont-ils inclus dans le prix au m² ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaq.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-darkBlue pt-6">
          <p>Non. Le prix au m² couvre la construction du bâtiment (gros œuvre + second œuvre + finitions). Les équipements sont des options chiffrées séparément.</p>
        </div>
      </details>

    </div>
  </section>

  <!-- ================= PROCESSUS & CONTRAT ================= -->
  <section class="bg-secondary py-6 md:py-8 w-full text-center">
    <h2 class="text-white text-[50px] md:text-[60px] font-heavy tracking-wide uppercase">PROCESSUS & CONTRAT</h2>
  </section>

  <section class="bg-[#f2f3f5] py-10 pb-20 w-full">
    <div class="max-w-[1100px] mx-auto px-6 space-y-4">

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">01</span>
            <p class="font-heavy text-3xl text-secondary">Comment se déroule un projet avec AIAE ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>6 étapes : (1) Premier contact. (2) Étude technique et devis. (3) Signature contrat. (4) Construction avec suivi. (5) Réception et remise des clés. (6) Suivi post-livraison.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">02</span>
            <p class="font-heavy text-3xl text-secondary">Fournissez-vous les plans architecturaux ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Oui. Le devis inclut la conception architecturale et les études techniques nécessaires.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">03</span>
            <p class="font-heavy text-3xl text-secondary">Le contrat peut-il être signé devant notaire ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Oui. Pour une sécurité juridique maximale, le contrat peut être signé devant un notaire togolais.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">04</span>
            <p class="font-heavy text-3xl text-secondary">Que se passe-t-il en cas de retard ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Les délais sont contractuels. En cas de retard imputable à AIAE, des pénalités sont prévues au contrat.</p>
        </div>
      </details>

      <details class="group border border-secondary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-secondary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">05</span>
            <p class="font-heavy text-3xl text-secondary">AIAE est-elle assurée ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqorange.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-secondary pt-6">
          <p>Oui. AIAE SARL dispose d'une assurance responsabilité civile professionnelle et d'une garantie décennale couvrant la structure pendant 10 ans.</p>
        </div>
      </details>

    </div>
  </section>

  <!-- ================= À PROPOS D'AIAE ================= -->
  <section class="bg-[#084c2e] py-10 w-full text-center">
    <h2 class="text-white text-[50px] md:text-[60px] font-heavy tracking-wide uppercase">À PROPOS D'AIAE</h2>
  </section>

  <section class="bg-[#f2f3f5] py-10 pb-20 w-full">
    <div class="max-w-[1100px] mx-auto px-6 space-y-4">

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">01</span>
            <p class="font-heavy text-3xl text-primary">Comment AIAE se compare-t-elle aux grandes entreprises étrangères ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>Nous offrons une expertise technique de niveau international avec un ancrage local fort et des prix justes.</p>
        </div>
      </details>

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">02</span>
            <p class="font-heavy text-3xl text-primary">AIAE est-elle une entreprise récente ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>AIAE SARL a été créée en 2025, mais l'expertise de son fondateur remonte à 2007. Plus de 18 ans d'expérience.</p>
        </div>
      </details>

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">03</span>
            <p class="font-heavy text-3xl text-primary">Quelles sont vos valeurs ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>Cinq valeurs non négociables : qualité primordiale, parole sacrée, honnêteté, respect des équipes, respect des délais et coûts.</p>
        </div>
      </details>

      <details class="group border border-primary rounded-lg bg-white overflow-hidden">
        <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
          <div class="flex items-center gap-4">
            <span class="bg-primary text-white flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold">04</span>
            <p class="font-heavy text-3xl text-primary">Quelles sont les divisions de AIAE ?</p>
          </div>
          <img src="{{ asset('aiae-frontend/Images/bfaqvert.png') }}" alt="icon" class="w-9 h-9 transition-transform duration-300 group-open:rotate-180" />
        </summary>
        <div class="px-16 pb-6 text-[#343434] font-book text-2xl border-t border-primary pt-6">
          <p>Construction (opérationnelle), Énergie (2026), Sécurité (2027), Préfabrication (2027-2028).</p>
        </div>
      </details>

    </div>
  </section>

  <!-- ================= SECTION CTA FINAL ================= -->
  <section class="bg-[#e6e6e6] py-10 w-full font-FuturaStdLight">
    <div class="max-w-[1100px] mx-auto text-left md:text-center px-6">
      <h2 class="text-[#1d1d1b] text-4xl md:text-[55px] font-heavy mb-6 leading-tight">
        Vous ne trouvez pas la réponse à<br class="hidden md:block"> votre question ?
      </h2>
      <p class="text-gray-600 leading-relaxed mb-10 text-[16px] md:text-[27px] max-w-[800px] md:mx-auto">
        Notre équipe est à votre écoute. Contactez-nous<br class="hidden md:block"> directement ou demandez un devis gratuit.
      </p>
      <div class="flex flex-col md:flex-row justify-center">
        <a href="{{ route('contact') }}" class="bg-secondary text-white px-10 py-5 text-center font-heavy uppercase tracking-wider">
          Demander un devis gratuit
          <span class="block text-sm font-light text-white normal-case">Réponse sous 48h</span>
        </a>
        <a href="{{ route('contact') }}" class="bg-primary text-white px-10 py-5 text-center font-heavy uppercase tracking-wider">
          Prendre rendez-vous
          <span class="block text-sm font-light text-white normal-case">En personne ou en visio</span>
        </a>
      </div>
    </div>
  </section>

@endsection
