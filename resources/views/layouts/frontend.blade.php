<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'AIAE')</title>
  <link rel="icon" type="image/png" href="{{ asset('aiae-frontend/Images/logos/Symbole AIAE FINAL.png') }}">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            futura: ["Futura", "sans-serif"],
            futuraCondensed: ["Futura Condensed", "sans-serif"],
          },
          colors: {
            primary: "#0b5b3a",
            secondary: "#d97706",
            glass: "rgba(255,255,255,0.55)",
            glassDark: "rgba(255,255,255,0.35)",
          },
        },
      },
    };
  </script>

  <!-- ================= FONTS ================= -->
  <style>
    @font-face {
      font-family: "Futura";
      src: url("{{ asset('aiae-frontend/fonts/FuturaStdLight.otf') }}");
      font-weight: 300;
    }

    @font-face {
      font-family: "Futura";
      src: url("{{ asset('aiae-frontend/fonts/FuturaStdMedium.otf') }}");
      font-weight: 500;
    }

    @font-face {
      font-family: "Futura";
      src: url("{{ asset('aiae-frontend/fonts/FuturaStdBold.otf') }}");
      font-weight: 700;
    }

    @font-face {
      font-family: "Futura";
      src: url("{{ asset('aiae-frontend/fonts/FuturaStdHeavy.otf') }}");
      font-weight: 800;
    }

    /* Condensed */
    @font-face {
      font-family: "Futura Condensed";
      src: url("{{ asset('aiae-frontend/fonts/FuturaStdCondensed.otf') }}");
      font-weight: 500;
    }

    @font-face {
      font-family: "Futura Condensed";
      src: url("{{ asset('aiae-frontend/fonts/FuturaStdCondensedBold.otf') }}");
      font-weight: 700;
    }

    @media (max-width: 640px) {

      body,
      html {
        overflow-x: hidden !important;
      }

      section,
      div,
      img {
        max-width: 100% !important;
      }
    }

    .nav-scrolled {
      backdrop-filter: blur(18px);
      background: rgba(22, 32, 100, 0.2);
    }
  </style>
  @yield('styles')
</head>

<body class="font-futura bg-gray-100 overflow-x-hidden">
  @include('frontend.partials.navbar')

  @yield('content')

  @include('frontend.partials.footer')

  <!-- ================= JS ================= -->
  <script>
    // Menu burger en mobile
    const burger = document.getElementById("burger");
    const mobileMenu = document.getElementById("mobileMenu");
    const closeMobile = document.getElementById("closeMobile");

    if (burger) {
        burger.addEventListener("click", () => {
          mobileMenu.classList.toggle("hidden");
        });
    }

    if (closeMobile) {
        closeMobile.addEventListener("click", () => {
          mobileMenu.classList.add("hidden");
        });
    }

    const navBar = document.getElementById("navBar");

    window.addEventListener("scroll", () => {
      if (window.scrollY > 30) {
        navBar?.classList.add("nav-scrolled");
      } else {
        navBar?.classList.remove("nav-scrolled");
      }
    });

    function togglePanel(button, panel) {
      panel.classList.toggle("hidden");
      const arrow = button.querySelector(".arrow");
      arrow?.classList.toggle("rotate-180");
    }
  </script>
  @yield('scripts')
</body>

</html>
