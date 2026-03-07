@extends('layouts.frontend', ['hideHeaderFooter' => true])

@section('title', 'Inscription - AIAE')

@section('styles')
<style>
    .auth-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 50px -12px rgba(22, 32, 100, 0.25);
    }
    .btn-auth {
        background: #162064;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-auth:hover {
        background: #ff8400;
        transform: translateY(-2px);
    }
    #navBar {
        background-color: #162064 !important;
        backdrop-filter: none !important;
    }
</style>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 bg-auth-pattern">
    <div class="max-w-xl w-full bg-white rounded-3xl p-8 sm:p-12 auth-card my-10">
        <div class="text-center mb-10">
            <img src="{{ asset('aiae-frontend/Images/logos/LOGO AIAE FINAL.png') }}" alt="AIAE Logo" class="h-16 mx-auto mb-6">
            <h1 class="text-3xl font-bold text-[#162064] mb-2 font-FuturaStdMedium">Créer un compte</h1>
            <p class="text-gray-500">Rejoignez AIAE pour sauvegarder vos estimations</p>
        </div>

        <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nom Complet</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-[#162064] focus:ring-2 focus:ring-[#162064]/20 outline-none transition-all"
                        placeholder="John Doe" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Téléphone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-[#162064] focus:ring-2 focus:ring-[#162064]/20 outline-none transition-all"
                        placeholder="+228 00 00 00 00">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Adresse Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-[#162064] focus:ring-2 focus:ring-[#162064]/20 outline-none transition-all"
                    placeholder="votre@email.com" required>
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Mot de passe</label>
                    <input type="password" name="password" id="password" 
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-[#162064] focus:ring-2 focus:ring-[#162064]/20 outline-none transition-all"
                        placeholder="••••••••" required>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-[#162064] focus:ring-2 focus:ring-[#162064]/20 outline-none transition-all"
                        placeholder="••••••••" required>
                </div>
            </div>

            <div class="flex items-start">
                <input type="checkbox" name="terms" id="terms" class="mt-1 w-4 h-4 text-[#162064] border-gray-300 rounded focus:ring-[#162064]" required>
                <label for="terms" class="ml-2 text-sm text-gray-600">J'accepte les <a href="#" class="text-[#ff8400] underline">conditions d'utilisation</a> et la politique de confidentialité d'AIAE.</label>
            </div>

            <button type="submit" class="w-full py-4 rounded-xl btn-auth font-bold uppercase tracking-wider">
                S'inscrire
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-gray-500 text-sm">
                Vous avez déjà un compte ? 
                <a href="{{ route('login') }}" class="font-bold text-[#162064] hover:text-[#ff8400] transition-colors">Connectez-vous</a>
            </p>
        </div>
    </div>
</div>
@endsection
