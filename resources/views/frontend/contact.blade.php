@extends('layouts.frontend')

@section('title', 'Contact - Demander Un Devis - AIAE')

@section('styles')
<style>
  /* Animations */
  @keyframes fadeInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
  .animate-fade-up { animation: fadeInUp 0.8s ease-out forwards; }

  strong { font-weight: 600; color: #1d1d1b; }

  /* Country Select Dropdown Styles */
  .country-dropdown { position: absolute; top: 100%; left: 0; right: 0; background: white; border: 1px solid #d1d5db; border-top: none; border-radius: 0 0 0.75rem 0.75rem; z-index: 50; max-height: 300px; overflow-y: auto; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); display: none; }
  .country-dropdown.active { display: block; }
  .country-item { display: flex; align-items: center; padding: 0.75rem 1rem; cursor: pointer; transition: background 0.2s; }
  .country-item:hover { background: #f3f4f6; }
  .country-flag { width: 24px; height: 16px; margin-right: 12px; object-fit: cover; border-radius: 2px; box-shadow: 0 1px 2px rgba(0,0,0,0.1); }
  .country-dropdown::-webkit-scrollbar { width: 8px; }
  .country-dropdown::-webkit-scrollbar-track { background: #f1f1f1; }
  .country-dropdown::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }

  /* Toast notification */
  .toast { position: fixed; top: 20px; right: 20px; padding: 16px 24px; border-radius: 12px; color: white; font-weight: 600; z-index: 9999; transform: translateX(120%); transition: transform 0.4s ease; }
  .toast.show { transform: translateX(0); }
  .toast-success { background: #059669; }
  .toast-error { background: #DC2626; }
</style>
@endsection

@section('content')

  <!-- ================= PETITE SECTION BLANCHE ================= -->
  <section class="w-full bg-[#f4f5f7] pt-24 md:pt-36 pb-4"></section>

  <!-- ================= SECTION HERO ================= -->
  <section class="bg-[#e6e6e6] pt-10 pb-10">
    <div class="max-w-[1000px] mx-auto text-left md:text-center px-6">
      <h1 class="text-[34px] sm:text-[45px] md:text-[70px] font-extrabold text-darkBlue mb-4 leading-tight whitespace-nowrap">
        Demandez <span class="text-secondary">Un Devis</span> Gratuit
      </h1>
      <p class="text-[18px] sm:text-[22px] md:text-[40px] text-[#4a4a4a] font-light leading-snug">
        Réponse <strong class="text-darkBlue">personnalisée</strong> sous <strong class="text-darkBlue">48h</strong> ouvrées.
      </p>
    </div>
  </section>

  <!-- ================= SECTION FORMULAIRE ================= -->
  <section class="bg-[#f4f5f7] py-5 w-full">
    <div class="max-w-[950px] mx-auto px-6">
      <form id="contactForm" class="space-y-6">
        @csrf

        <!-- Notification -->
        <div id="formAlert" class="hidden p-4 rounded-xl text-sm font-medium border mb-4"></div>

        <!-- Nom & Prénom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Prénom <span class="text-red-500">*</span></label>
            <input type="text" name="first_name" id="first_name" placeholder="Votre prénom" required
              class="w-full bg-transparent border border-gray-400 rounded-xl px-5 py-3 outline-none focus:border-secondary text-gray-700 placeholder-gray-400">
          </div>
          <div>
            <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Nom <span class="text-red-500">*</span></label>
            <input type="text" name="last_name" id="last_name" placeholder="Votre nom" required
              class="w-full bg-transparent border border-gray-400 rounded-xl px-5 py-3 outline-none focus:border-secondary text-gray-700 placeholder-gray-400">
          </div>
        </div>

        <!-- Adresse e-mail -->
        <div>
          <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Adresse e-mail <span class="text-red-500">*</span></label>
          <input type="email" name="email" id="email" placeholder="nomprenom@gmail.com" required
            class="w-full bg-transparent border border-gray-400 rounded-xl px-5 py-3 outline-none focus:border-secondary text-gray-700 placeholder-gray-400">
        </div>

        <!-- Téléphone -->
        <div class="relative" id="phoneContainer">
          <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Téléphone</label>
          <div class="flex items-center w-full border border-gray-400 rounded-xl px-4 py-3 bg-transparent focus-within:border-secondary overflow-hidden">
            <div id="selectedCountry" class="flex items-center gap-2 pr-3 cursor-pointer border-r border-[#d4d4d4] shrink-0">
              <img id="currentFlag" src="https://flagcdn.com/w20/tg.png" alt="TG" class="w-6 h-4 object-contain shadow-sm rounded-sm">
              <span id="dialCodeText" class="text-gray-700 font-medium">+228</span>
              <svg class="w-4 h-4 text-[#4a4a4a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
            <input type="tel" name="phone" id="phoneInput" placeholder="XX XX XX XX"
              class="bg-transparent pl-4 w-full outline-none text-gray-700 placeholder-gray-400">
          </div>

          <!-- Country Dropdown -->
          <div id="countryDropdown" class="country-dropdown">
            <div class="p-2 sticky top-0 bg-white border-b">
              <input type="text" id="countrySearch" placeholder="Rechercher un pays..."
                class="w-full px-3 py-2 text-sm border rounded-lg focus:outline-none focus:border-secondary">
            </div>
            <div id="countryList"></div>
          </div>
        </div>

        <!-- Type de projet -->
        <div>
          <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Type de projet</label>
          <div class="relative">
            <select name="type_projet" id="projectTypeSelect"
              class="w-full bg-transparent border border-gray-400 rounded-xl px-5 py-4 outline-none focus:border-secondary text-gray-700 appearance-none cursor-pointer">
              <option value="" disabled selected>Sélectionnez le type de projet</option>
              <option value="residentiel">Résidentiel (Villas, immeubles)</option>
              <option value="tertiaire">Tertiaire (Bureaux, hôtels)</option>
              <option value="industriel">Industriel (Usines, entrepôts)</option>
              <option value="agricole">Agricole (Élevage, stockage)</option>
              <option value="energie">Énergie (Solaire, hybride)</option>
              <option value="securite">Sécurité (Coffre-fort, safe room)</option>
            </select>
            <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500 font-light text-2xl">+</div>
          </div>
        </div>

        <!-- Votre projet -->
        <div>
          <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Votre projet</label>
          <textarea name="description_projet" id="description_projet" rows="4" placeholder="Décrivez brièvement votre projet..."
            class="w-full bg-transparent border border-gray-400 rounded-xl px-5 py-4 outline-none focus:border-secondary text-gray-700 placeholder-gray-400 resize-none"></textarea>
        </div>

        <!-- Budget estimé -->
        <div>
          <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Budget estimé</label>
          <input type="text" name="budget_estime" id="budget_estime" placeholder="Quel budget envisagez-vous ?"
            class="w-full bg-transparent border border-gray-400 rounded-xl px-5 py-4 outline-none focus:border-secondary text-gray-700 placeholder-gray-400">
        </div>

        <!-- Comment avez-vous connu AIAE ? -->
        <div>
          <label class="block text-[20px] font-heavy text-[#4a4a4a] mb-2">Comment avez-vous connu AIAE ?</label>
          <div class="relative">
            <select name="source" id="source"
              class="w-full bg-transparent border border-gray-400 rounded-xl px-5 py-4 outline-none focus:border-secondary text-gray-700 appearance-none cursor-pointer">
              <option value="" disabled selected>Par quel moyen avez vous entendu parler de nous ?</option>
              <option value="reseaux_sociaux">Réseaux Sociaux</option>
              <option value="recherche_google">Recherche Google</option>
              <option value="bouche_a_oreille">Bouche à oreille</option>
              <option value="autre">Autre</option>
            </select>
            <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500 font-light text-2xl">+</div>
          </div>
        </div>

        <!-- Checkbox acceptation -->
        <div class="flex items-start gap-4 mt-8 pb-6">
          <div class="relative flex items-center justify-center shrink-0 w-[24px] h-[24px] rounded bg-white border-2 border-[#3a3939] overflow-hidden mt-1 cursor-pointer">
            <input type="checkbox" id="consent" class="absolute inset-0 opacity-0 cursor-pointer peer" required checked>
            <svg class="w-4 h-4 text-[#3a3939] opacity-0 peer-checked:opacity-100 pointer-events-none" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <p class="text-[20px] md:text-[22px] text-black font-heavy leading-snug">
            J'accepte que mes données soient traitées par AIAE SARL<br class="hidden md:block">
            dans le cadre de ma demande (voir <a href="{{ route('mentions-legales') }}" class="underline text-secondary">politique de<br class="hidden md:block">
            confidentialité</a>).
          </p>
        </div>

        <!-- Bouton Envoyer -->
        <div class="pt-4 pb-12">
          <button type="submit" id="submitBtn"
            class="block w-full bg-[#111736] text-white py-5 rounded-xl font-bold text-[18px] md:text-[20px] tracking-wide hover:bg-darkBlue transition-colors outline-none cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
            ENVOYER MA DEMANDE
          </button>
        </div>

      </form>
    </div>
  </section>

  <!-- ================= SECTION COORDONNÉES ================= -->
  <section class="bg-white py-20 w-full">
    <div class="max-w-[1150px] mx-auto px-6 relative">

      <!-- Badge Titre -->
      <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-full bg-[#FF8400] text-white px-10 py-2 rounded-xl text-[22px] md:text-[26px] font-heavy border-2 border-primary z-10 text-center uppercase tracking-wider mb-2">
        Nos Coordonnées
      </div>

      <!-- Encadré vert -->
      <div class="bg-[#0e4e32] rounded-[24px] pt-12 md:pt-16 pb-12 px-6 sm:px-16 text-white text-[18px] sm:text-[22px] md:text-[26px] shadow-2xl relative">

        <div class="grid md:grid-cols-2 gap-8 md:gap-4 mb-10 text-left">
          <div class="flex flex-col gap-5 md:pl-10">
            <div class="flex items-start gap-3">
              <img src="{{ asset('aiae-frontend/Images/localisation.png') }}" alt="Localisation" class="w-6 h-8 shrink-0 object-contain mt-1" />
              <p><strong class="font-heavy text-white">Siège social :</strong> Quartier Kléme Zanguéra Rue Agoe Nyive - Lomé Togo</p>
            </div>
            <div class="flex items-start gap-3">
              <img src="{{ asset('aiae-frontend/Images/mail.png') }}" alt="Email" class="w-7 h-5 shrink-0 object-contain mt-1.5" />
              <p><strong class="font-heavy text-white">Email :</strong> contact@aiae.services</p>
            </div>
          </div>

          <div class="flex flex-col gap-5 md:pl-10">
            <div class="flex items-start gap-3">
              <img src="{{ asset('aiae-frontend/Images/telephone.png') }}" alt="Téléphone" class="w-6 h-6 shrink-0 object-contain mt-1" />
              <p><strong class="font-heavy text-white">Téléphone :</strong> +228 90 03 54 16</p>
            </div>
            <div class="flex items-start gap-3">
              <img src="{{ asset('aiae-frontend/Images/Whatsapp.png') }}" alt="WhatsApp" class="w-7 h-7 shrink-0 object-contain mt-1" />
              <p><strong class="font-heavy text-white">WhatsApp :</strong> +228 90 03 54 16</p>
            </div>
          </div>
        </div>

        <!-- Horaires -->
        <div class="text-left md:text-center font-light leading-[1.8] border-t border-white/20 pt-10">
          <div class="flex items-center justify-start md:justify-center gap-4 mb-6">
            <img src="{{ asset('aiae-frontend/Images/heure.png') }}" alt="Horaires" class="w-7 h-7 object-contain" />
            <h3 class="font-heavy text-[22px] md:text-[24px] tracking-wide">Horaires :</h3>
          </div>
          <div class="space-y-2">
            <p><strong class="font-heavy tracking-wide text-white">Lundi à Vendredi :</strong> 8h00 — 18h00 (GMT+0)</p>
            <p><strong class="font-heavy tracking-wide text-white">Samedi :</strong> 8h00 — 13h00</p>
            <p><strong class="font-heavy tracking-wide text-white">Dimanche :</strong> Fermé (urgences par téléphone uniquement)</p>
            <p class="pt-2"><strong class="font-heavy tracking-wide text-white">Diaspora :</strong> RDV en soirée et week-end sur demande (visioconférence)</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= SECTION CARTE ================= -->
  <section class="bg-white pb-20 w-full">
    <div class="max-w-[1250px] mx-auto px-6">
      <div class="w-full bg-[#f4f5f7] p-3 md:p-4 rounded-[28px]">
        <div class="w-full h-[350px] md:h-[450px] rounded-2xl overflow-hidden">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3966.2622704545247!2d1.1308490749904325!3d6.229112993759031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMTMnNDQuOCJOIDHCsDA4JzAwLjMiRQ!5e0!3m2!1sfr!2stg!4v1775841080183!5m2!1sfr!2stg"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SECTION CTA (Prenez Rendez-Vous) ================= -->
  <section class="bg-[#e6e6e6] py-10 w-full font-FuturaStdLight">
    <div class="max-w-[900px] mx-auto text-left md:text-center px-6">
      <h2 class="text-black text-4xl md:text-[55px] font-heavy mb-6 leading-tight">Prenez Rendez-Vous</h2>
      <p class="text-gray-600 leading-relaxed font-light mb-10 text-[16px] md:text-[27px] max-w-[700px] md:mx-auto">
        Deux modalités proposées au visiteur
      </p>
      <div class="flex flex-col md:flex-row justify-center w-full max-w-[950px] mx-auto shadow-2xl overflow-hidden rounded-sm">
        <a href="tel:+22890035416" class="flex-1 bg-secondary text-white px-10 py-5 text-center transition-all duration-300 hover:brightness-110 group">
          <span class="block text-[22px] md:text-[28px] font-heavy tracking-wide mb-3 uppercase">RENDEZ-VOUS SUR PLACE</span>
          <span class="block text-[11px] md:text-[15px] text-white/90 leading-relaxed max-w-[320px] mx-auto">
            Visitez notre siège à Lomé pour discuter de votre projet.
          </span>
        </a>
        <a href="{{ route('contact') }}" class="flex-1 bg-primary text-white px-10 py-5 text-center transition-all duration-300 hover:brightness-110 group">
          <span class="block text-[22px] md:text-[28px] font-heavy tracking-wide mb-3 uppercase">RENDEZ-VOUS EN LIGNE</span>
          <span class="block text-[11px] md:text-[15px] text-white/90 leading-relaxed max-w-[350px] mx-auto">
            Pour la diaspora ou contraintes de temps, nous<br> proposons des visioconférences.
          </span>
        </a>
      </div>
    </div>
  </section>

@endsection

@section('scripts')
<script>
  // ===== Toast notification =====
  function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.classList.add('show'), 100);
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => toast.remove(), 400);
    }, 4000);
  }

  // ===== Country selector =====
  const selectedCountry = document.getElementById('selectedCountry');
  const countryDropdown = document.getElementById('countryDropdown');
  const countrySearch = document.getElementById('countrySearch');
  const countryList = document.getElementById('countryList');
  let countries = [];

  selectedCountry?.addEventListener('click', () => {
    countryDropdown.classList.toggle('active');
  });

  document.addEventListener('click', (e) => {
    if (!document.getElementById('phoneContainer')?.contains(e.target)) {
      countryDropdown?.classList.remove('active');
    }
  });

  async function loadCountries() {
    try {
      const response = await fetch('https://restcountries.com/v3.1/all?fields=name,cca2,idd,flags');
      countries = await response.json();
      countries.sort((a, b) => a.name.common.localeCompare(b.name.common));
      renderCountries(countries);
    } catch (error) {
      console.error('Erreur chargement pays:', error);
    }
  }

  function renderCountries(list) {
    if (!countryList) return;
    countryList.innerHTML = list.map(c => {
      const code = c.idd?.root ? c.idd.root + (c.idd.suffixes?.[0] || '') : '';
      return `<div class="country-item" data-code="${code}" data-flag="${c.flags?.png || ''}">
        <img src="${c.flags?.png || ''}" class="country-flag" alt="${c.cca2}">
        <span>${c.name.common}</span>
        <span class="ml-auto text-gray-400 text-sm">${code}</span>
      </div>`;
    }).join('');

    countryList.querySelectorAll('.country-item').forEach(item => {
      item.addEventListener('click', () => {
        document.getElementById('currentFlag').src = item.dataset.flag;
        document.getElementById('dialCodeText').textContent = item.dataset.code;
        countryDropdown.classList.remove('active');
      });
    });
  }

  countrySearch?.addEventListener('input', (e) => {
    const q = e.target.value.toLowerCase();
    renderCountries(countries.filter(c => c.name.common.toLowerCase().includes(q)));
  });

  loadCountries();

  // ===== Form submission via API =====
  document.getElementById('contactForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    const originalText = btn.textContent;
    btn.disabled = true;
    btn.textContent = 'Envoi en cours...';

    const dialCode = document.getElementById('dialCodeText')?.textContent || '+228';
    const phoneNumber = document.getElementById('phoneInput')?.value || '';
    const fullPhone = phoneNumber ? `${dialCode} ${phoneNumber}` : '';

    // Build notes with extra info that backend doesn't have dedicated fields for
    let notes = '';
    const typeProjet = document.getElementById('projectTypeSelect')?.value;
    const budget = document.getElementById('budget_estime')?.value;
    const description = document.getElementById('description_projet')?.value;

    if (typeProjet) notes += `Type de projet: ${typeProjet}\n`;
    if (budget) notes += `Budget estimé: ${budget}\n`;
    if (description) notes += `Description: ${description}\n`;

    const payload = {
      first_name: document.getElementById('first_name').value,
      last_name: document.getElementById('last_name').value,
      email: document.getElementById('email').value,
      phone: fullPhone,
      source: document.getElementById('source')?.value || null,
      notes: notes || null,
    };

    try {
      const res = await fetch('/api/site/leads', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value
        },
        body: JSON.stringify(payload)
      });

      const data = await res.json();

      if (res.ok) {
        showToast('✅ Votre demande a été envoyée avec succès ! Nous vous recontacterons sous 48h.', 'success');
        this.reset();
      } else if (res.status === 422) {
        const errors = data.errors || {};
        const firstError = Object.values(errors)[0]?.[0] || 'Veuillez vérifier les champs du formulaire.';
        showToast('❌ ' + firstError, 'error');
      } else {
        showToast('❌ Une erreur est survenue. Veuillez réessayer.', 'error');
      }
    } catch (error) {
      console.error('Erreur:', error);
      showToast('❌ Erreur de connexion. Vérifiez votre connexion internet.', 'error');
    } finally {
      btn.disabled = false;
      btn.textContent = originalText;
    }
  });
</script>
@endsection
