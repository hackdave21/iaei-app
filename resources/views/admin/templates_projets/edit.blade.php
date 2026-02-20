@extends('admin.layouts.master')

@section('title', 'Modifier le Modèle de Projet')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Modifier le Modèle: {{ $templateProjet->nom }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.templates-projets.index') }}">Templates</a></li>
                <li class="breadcrumb-item">Modifier</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <form action="{{ route('admin.templates-projets.update', $templateProjet) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.templates_projets.partials.form')
        </form>
    </div>
</div>
@endsection
