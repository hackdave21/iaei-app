@extends('layouts.frontend')

@section('title', 'AIAE - Page en construction')

@section('content')
  <section class="min-h-screen pt-40 pb-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h1 class="text-4xl font-bold text-gray-800 mb-6">Page en construction</h1>
      <p class="text-xl text-gray-600 mb-10">
        Nous travaillons actuellement sur cette page. Elle sera bientôt disponible.
      </p>
      <a href="{{ route('home') }}" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold">
        Retour à l'accueil
      </a>
    </div>
  </section>
@endsection
