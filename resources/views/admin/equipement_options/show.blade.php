@extends('admin.layouts.master')

@section('title', 'Détails de l\'Option d\'Équipement')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails Option: {{ $equipementOption->designation }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.equipement-options.index') }}">Équipements</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.equipement-options.edit', $equipementOption) }}" class="btn btn-primary">
                <i class="feather-edit me-2"></i>Modifier
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Code</h6>
                        <p class="fw-bold fs-16">{{ $equipementOption->code }}</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Catégorie</h6>
                        <p class="fw-bold fs-16 text-primary">{{ $equipementOption->categorie }}</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Statut</h6>
                        <span class="badge {{ $equipementOption->actif ? 'bg-success' : 'bg-danger' }}">
                            {{ $equipementOption->actif ? 'Actif' : 'Inactif' }}
                        </span>
                    </div>
                    <div class="col-md-12 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Désignation</h6>
                        <p class="fw-bold fs-18">{{ $equipementOption->designation }}</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Prix Min</h6>
                        <p class="fw-bold fs-16">{{ number_format($equipementOption->prix_min, 0, ',', ' ') }} XOF</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Prix Max</h6>
                        <p class="fw-bold fs-16">{{ number_format($equipementOption->prix_max, 0, ',', ' ') }} XOF</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Unité</h6>
                        <p class="fw-bold fs-16">{{ $equipementOption->unite }}</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Puissance / Taille</h6>
                        <p class="fw-bold fs-16">{{ $equipementOption->puissance ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Ordre d'affichage</h6>
                        <p class="fw-bold fs-16">{{ $equipementOption->ordre_affichage }}</p>
                    </div>
                    <div class="col-md-12 mb-0">
                        <h6 class="text-muted text-uppercase fs-12">Description</h6>
                        <p>{{ $equipementOption->description ?? 'Aucune description' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
