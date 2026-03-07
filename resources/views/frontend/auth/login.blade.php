@extends('layouts.frontend', ['hideHeaderFooter' => true])

@section('title', 'Connexion - AIAE')

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
    <div class="max-w-md w-full bg-white rounded-3xl p-8 sm:p-12 auth-card my-10">
        <div class="text-center mb-10">
            <img src="{{ asset('aiae-frontend/Images/logos/LOGO AIAE FINAL.png') }}" alt="AIAE Logo" class="h-16 mx-auto mb-6">
            <h1 class="text-3xl font-bold text-[#162064] mb-2 font-FuturaStdMedium">Heureux de vous revoir</h1>
            <p class="text-gray-500">Connectez-vous pour accéder à vos simulations</p>
            
            @if(session('success'))
                <div class="mt-6 p-4 bg-green-50 text-green-700 rounded-xl text-sm font-medium border border-green-100">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('message'))
                <div class="mt-6 p-4 bg-blue-50 text-blue-700 rounded-xl text-sm font-medium border border-blue-100">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Adresse Email</label>
                <input type="email" name="email" id="email" 
                    value="{{ old('email') }}"
                    class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-[#162064] focus:ring-2 focus:ring-[#162064]/20 outline-none transition-all"
                    placeholder="votre@email.com" required>
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Mot de passe</label>
                    <a href="#" class="text-sm font-medium text-[#ff8400] hover:underline">Oublié ?</a>
                </div>
                <input type="password" name="password" id="password" 
                    class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-[#162064] focus:ring-2 focus:ring-[#162064]/20 outline-none transition-all"
                    placeholder="••••••••" required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-[#162064] border-gray-300 rounded focus:ring-[#162064]">
                <label for="remember" class="ml-2 text-sm text-gray-600">Se souvenir de moi</label>
            </div>

            <button type="submit" class="w-full py-4 rounded-xl btn-auth font-bold uppercase tracking-wider">
                Se Connecter
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-gray-500 text-sm">
                Vous n'avez pas encore de compte ? 
                <a href="{{ route('register') }}" class="font-bold text-[#162064] hover:text-[#ff8400] transition-colors">Inscrivez-vous</a>
            </p>
        </div>
    </div>
</div>
@endsection
