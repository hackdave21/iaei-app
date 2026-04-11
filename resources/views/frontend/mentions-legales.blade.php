@extends('layouts.frontend')

@section('title', 'Mentions Légales - AIAE')

@section('styles')
<style>
  html { scroll-behavior: smooth; }
  .legal-card { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 2.5rem; margin-bottom: 2rem; }
  .legal-title { color: #121a44; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 12px; }
  .legal-title::before { content: ""; display: block; width: 4px; height: 24px; background: #05482C; border-radius: 2px; }
  .legal-section-anchor { scroll-margin-top: 100px; }
  .toc-link { transition: all 0.3s ease; border-left: 2px solid transparent; padding-left: 1rem; display: block; }
  .toc-link:hover { border-left-color: #CC6A00; color: #CC6A00; transform: translateX(5px); }
</style>
@endsection

@section('content')

  <!-- HERO -->
  <section class="pt-40 pb-20 bg-[#121a44] text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h2 class="text-4xl md:text-6xl font-heavy mb-4 uppercase tracking-tighter">
        Mentions <span class="text-[#FF8400]">Légales</span>
      </h2>
      <p class="text-lg opacity-80 font-light max-w-2xl mx-auto">
        Transparence, conformité et protection de vos données. Retrouvez ici l'ensemble de nos informations juridiques.
      </p>
    </div>
  </section>

  <main class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-12">

    <!-- SOMMAIRE (SIDEBAR) -->
    <aside class="hidden lg:block">
      <div class="sticky top-28 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="font-bold text-[#121a44] mb-6 text-xl uppercase tracking-wider">Sommaire</h2>
        <nav class="flex flex-col gap-4 text-sm font-medium text-gray-500">
          <a href="#mentions" class="toc-link">1. Mentions Légales</a>
          <a href="#cgu" class="toc-link">2. CGU</a>
          <a href="#confidentialite" class="toc-link">3. Confidentialité</a>
          <a href="#cookies" class="toc-link">4. Cookies</a>
        </nav>
      </div>
    </aside>

    <div class="space-y-12">

      <!-- SOMMAIRE (MOBILE) -->
      <div class="lg:hidden bg-white p-6 rounded-2xl shadow-sm mb-8">
        <h2 class="font-bold text-[#121a44] mb-4 text-lg">Sommaire</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm font-medium">
          <a href="#mentions" class="text-primary hover:underline">1. Mentions Légales</a>
          <a href="#cgu" class="text-primary hover:underline">2. CGU</a>
          <a href="#confidentialite" class="text-primary hover:underline">3. Confidentialité</a>
          <a href="#cookies" class="text-primary hover:underline">4. Cookies</a>
        </div>
      </div>

      <!-- SECTION 1: MENTIONS LÉGALES -->
      <div id="mentions" class="legal-section-anchor">
        <div class="legal-card">
          <h2 class="legal-title text-2xl">1. Éditeur du site</h2>
          <div class="space-y-6 text-gray-600 leading-relaxed font-light">
            <p><strong class="text-[#121a44] font-bold">Raison sociale :</strong> Afrika Infrastructures And Equipment (AIAE SARL)</p>
            <p><strong class="text-[#121a44] font-bold">Forme juridique :</strong> Société à Responsabilité Limitée (SARL), de droit togolais, régie par l'Acte Uniforme OHADA relatif au droit des sociétés commerciales et du groupement d'intérêt économique.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <p><strong class="text-[#121a44] font-bold">Capital social :</strong> 5 000 000 FCFA</p>
              <p><strong class="text-[#121a44] font-bold">RCCM :</strong> TG-LFW-01-2025-B12-00590</p>
              <p><strong class="text-[#121a44] font-bold">NIF :</strong> 1002039587</p>
            </div>
            <p><strong class="text-[#121a44] font-bold">Siège social :</strong> Quartier Kléme Zanguéra Rue Agoe Nyive - Lomé Togo</p>
            <p>
              <strong class="text-[#121a44] font-bold">Représentant légal :</strong> Mme METILABE Tchable, Gérante<br>
              <strong class="text-[#121a44] font-bold">Directeur de la publication :</strong> M. AMEGAN Kokou Alexandre, Directeur Général
            </p>
            <div class="pt-4 border-t border-gray-100 flex flex-col md:flex-row gap-6">
              <p><strong class="text-[#121a44] font-bold">Téléphone :</strong> +228 90 03 54 16</p>
              <p><strong class="text-[#121a44] font-bold">Email :</strong> contact@aiae.services</p>
            </div>
          </div>
        </div>

        <div class="legal-card">
          <h2 class="legal-title text-2xl">2. Hébergeur</h2>
          <div class="bg-gray-50 border-l-4 border-primary p-6 rounded-r-lg">
            <p class="text-gray-500 italic mb-2">Note : En attente de confirmation finale</p>
            <p class="text-gray-700 font-medium">Hostinger International Ltd.</p>
            <p class="text-gray-600 font-light">61 Lordou Vironos St., 6023 Larnaca, Chypre</p>
            <a href="https://www.hostinger.com" class="text-primary hover:underline text-sm mt-2 block" target="_blank" rel="noopener">www.hostinger.com</a>
          </div>
        </div>

        <div class="legal-card">
          <h2 class="legal-title text-2xl">3. Conception et développement</h2>
          <p class="text-gray-600 font-light">
            <strong class="text-[#121a44] font-medium">Conception et développement web :</strong> M. ADZINDA Jean<br>
            <strong class="text-[#121a44] font-medium">Identité visuelle et charte graphique :</strong> M. ADZINDA Jean
          </p>
        </div>

        <div class="legal-card">
          <h2 class="legal-title text-2xl">4. Propriété intellectuelle</h2>
          <div class="text-gray-600 font-light space-y-4">
            <p>L'ensemble du contenu du site <strong class="text-primary">www.aiae.tg</strong> (textes, images, graphismes, logo, icônes, vidéos, sons, logiciels, bases de données, algorithmes du simulateur) est la propriété exclusive de AIAE SARL ou de ses partenaires et est protégé par les lois togolaises et internationales relatives à la propriété intellectuelle, notamment l'Accord de Bangui révisé (OAPI).</p>
            <p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site est interdite sans autorisation écrite préalable de AIAE SARL.</p>
            <p class="bg-[#CC6A00]/5 p-4 rounded-xl border border-[#CC6A00]/20 text-[#CC6A00] font-medium">
              Le simulateur de coût de construction, ses algorithmes, ses bases de données de prix et coefficients constituent un système propriétaire protégé. L'extraction systématique, le scraping ou le reverse engineering sont strictement interdits.
            </p>
          </div>
        </div>

        <div class="legal-card">
          <h2 class="legal-title text-2xl">5. Crédits visuels</h2>
          <p class="text-gray-600 font-light">
            Les photographies et illustrations proviennent de banques d'images sous licence (Unsplash, Pexels, Adobe Stock) ou sont la propriété d'AIAE SARL.
          </p>
        </div>
      </div>

      <!-- SECTION 2: CGU -->
      <div id="cgu" class="legal-section-anchor">
        <div class="legal-card">
          <h2 class="legal-title text-2xl">2. CGU</h2>
          <div class="text-gray-700 space-y-4">
            <p>Les présentes Conditions Générales d'Utilisation (CGU) régissent l'accès et l'utilisation du site www.aiae.services. En naviguant sur ce site, l'utilisateur reconnaît avoir pris connaissance des présentes conditions et les accepter sans réserve.</p>
            <p>AIAE SARL se réserve le droit de modifier à tout moment le contenu du site ainsi que les présentes mentions légales pour se conformer aux évolutions législatives ou aux besoins de ses services.</p>
          </div>
        </div>
      </div>

      <!-- SECTION 3: CONFIDENTIALITÉ -->
      <div id="confidentialite" class="legal-section-anchor">
        <div class="legal-card">
          <h2 class="legal-title text-2xl">3. Confidentialité</h2>
          <div class="text-gray-700 space-y-4">
            <p>La protection de vos données personnelles est une priorité pour AIAE SARL. Nous collectons uniquement les informations nécessaires au traitement de vos demandes de services et de devis.</p>
            <p>Conformément à la réglementation en vigueur, vous disposez d'un droit d'accès, de rectification et de suppression de vos données. Pour toute demande, veuillez nous contacter à l'adresse : contact@aiae.services.</p>
          </div>
        </div>
      </div>

      <!-- SECTION 4: COOKIES -->
      <div id="cookies" class="legal-section-anchor">
        <div class="legal-card">
          <h2 class="legal-title text-2xl">4. Cookies</h2>
          <div class="text-gray-700 space-y-4">
            <p>Notre site utilise des cookies techniques nécessaires au bon fonctionnement de la navigation et à l'amélioration de l'expérience utilisateur. Ces cookies ne permettent pas l'identification personnelle de l'utilisateur.</p>
            <p>Vous pouvez à tout moment configurer votre navigateur pour refuser l'installation de ces cookies, bien que cela puisse limiter l'accès à certaines fonctionnalités du site.</p>
          </div>
        </div>
      </div>

    </div>
  </main>

@endsection
