  <!-- ================= RÉSEAUX SOCIAUX ================= -->
  <section class="w-full">
    <!-- BARRE VERTE -->
    <div class="bg-[#0b4a2b] text-white py-6">
      <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-center gap-6">
        <!-- ICÔNES -->
        <div class="flex items-center gap-6">
          <!-- TikTok -->
          <a href="#" aria-label="TikTok">
            <img src="{{ asset('aiae-frontend/Images/TiktokLogo.svg') }}" alt="TikTok" class="h-16 w-16" />
          </a>

          <!-- Instagram -->
          <a href="#" aria-label="Instagram">
            <img src="{{ asset('aiae-frontend/Images/InstagramLogo.svg') }}" alt="Instagram" class="h-16 w-16" />
          </a>

          <!-- Facebook -->
          <a href="#" aria-label="Facebook">
            <img src="{{ asset('aiae-frontend/Images/FacebookLogo.svg') }}" alt="Facebook" class="h-16 w-16" />
          </a>

          <!-- YouTube -->
          <a href="#" aria-label="YouTube">
            <img src="{{ asset('aiae-frontend/Images/YoutubeLogo.svg') }}" alt="YouTube" class="h-16 w-16" />
          </a>
        </div>

        <!-- TEXTE DROIT -->
        <div class="flex flex-col items-start">
          <p class="text-4xl font-bold">@Afrika_AIAE</p>
          <p class="text-sm opacity-80">
            Suivez nous, <span class="font-bold">Abonnez vous</span> &
            <span class="font-bold">Likez nos post</span>
          </p>
        </div>
      </div>
    </div>

    <!-- BARRE CLAIRE -->
    <div class="bg-[#f4f5f7] py-6">
      <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-center gap-4 text-[#0b4a2b]">
        <!-- WhatsApp Icon -->
        <img src="{{ asset('aiae-frontend/Images/WhatsappLogo.svg') }}" alt="" class="h-12 w-12" />

        <p class="text-3xl">
          +228 <span class="font-bold">9X 8X 7X 6X</span>
        </p>

        <p class="text-sm">
          <span class="font-extrabold">Écrivez nous</span> pour toutes<br />
          <span class="font-extrabold">informations</span> supplémentaires
        </p>
      </div>
    </div>
  </section>

  <!-- ================= FOOTER ================= -->
  <footer class="bg-[#f3f3f3] pt-20">

    <div class="max-w-7xl mx-auto px-6">

      <div class="grid grid-cols-1 md:grid-cols-[1.6fr_1fr_1fr_1fr] gap-16">

        <!-- LOGO + DESCRIPTION -->
        <div>

          <img src="{{ asset('aiae-frontend/Images/logos/LOGO AIAE FINAL - Copie.png') }}" class="w-64 pb-5" alt="AIAE Logo">

          <p class="text-[#1a1f4d] text-[22px] leading-relaxed max-w-md">
            <strong>AIAE : Afrika Infrastructures And Equipments.</strong>
            De la conception à la réalisation.
          </p>

        </div>


        <!-- DIVISIONS -->
        <div>
          <h3 class="text-[22px] font-semibold mb-6 text-[#1a1f4d]">
            Nos divisions
          </h3>

          <ul class="space-y-2 text-gray-600 text-[16px]">

            <li>Construction</li>
            <li>Énergie</li>
            <li>Sécurité</li>
            <li>Préfabrication</li>

          </ul>
        </div>


        <!-- CONTACT -->
        <div>

          <h3 class="text-[22px] font-semibold mb-6 text-[#1a1f4d]">
            Contact
          </h3>

          <ul class="space-y-2 text-gray-600 text-[16px]">

            <li>Lomé, Togo</li>
            <li>Interventions sur tout le territoire</li>
            <li>+228 XX XX XX XX</li>
            <li>contact@aiae.services</li>

          </ul>

        </div>


        <!-- ACCEDER -->
        <div>

          <h3 class="text-[22px] font-semibold mb-6 text-[#1a1f4d]">
            Accéder à
          </h3>

          <ul class="space-y-2 text-gray-600 text-[16px]">

            <li>
              <a href="#" class="hover:text-[#1a1f4d] transition">
                Demander un devis
              </a>
            </li>

            <li>
              <a href="#" class="hover:text-[#1a1f4d] transition">
                Prendre rendez-vous
              </a>
            </li>

            <li>
              <a href="#" class="hover:text-[#1a1f4d] transition">
                FAQ
              </a>
            </li>

            <li>
              <a href="#" class="hover:text-[#1a1f4d] transition">
                Mentions légales
              </a>
            </li>

          </ul>

        </div>

      </div>

    </div>


    <!-- COPYRIGHT -->
    <div class="bg-[#1a1f4d] text-white text-center mt-20 py-2 text-sm">

      Copyright — © 2025-2026 AIAE SARL. Tous Droits Réservés.

    </div>

  </footer>
