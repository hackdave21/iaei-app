@extends('admin.layouts.master')

@section('title', 'Détails du Modèle de Projet')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails Modèle: {{ $templateProjet->nom }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.templates-projets.index') }}">Templates</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.templates-projets.edit', $templateProjet) }}" class="btn btn-primary">
                <i class="feather-edit me-2"></i>Modifier
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center py-5">
                        <div class="avatar-text avatar-xxl bg-soft-primary text-primary mx-auto mb-4" style="font-size: 4rem;">
                            {{ $templateProjet->icone ?? '🏠' }}
                        </div>
                        <h4 class="mb-1">{{ $templateProjet->nom }}</h4>
                        <span class="badge {{ $templateProjet->actif ? 'bg-success' : 'bg-danger' }}">
                            {{ $templateProjet->actif ? 'Actif' : 'Inactif' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase fs-12 mb-3">Informations de Configuration</h6>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="text-muted d-block small">Code</label>
                                <span class="fw-bold">{{ $templateProjet->code }}</span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-muted d-block small">Secteur</label>
                                <span class="fw-bold">{{ $templateProjet->secteur }}</span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-muted d-block small">Type Bâtiment</label>
                                <span class="fw-bold">{{ $templateProjet->type_batiment }}</span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-muted d-block small">Standing</label>
                                <span class="fw-bold">{{ $templateProjet->standing }}</span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-muted d-block small">Ordre d'affichage</label>
                                <span class="fw-bold">{{ $templateProjet->ordre_affichage }}</span>
                            </div>
                        </div>
                        <h6 class="text-muted text-uppercase fs-12 mt-4 mb-2">Description</h6>
                        <p class="mb-0">{{ $templateProjet->description ?? 'Aucune description' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
