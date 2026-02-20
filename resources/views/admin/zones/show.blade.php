@extends('admin.layouts.master')

@section('title', 'Détails de la Zone')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails Zone: {{ $zone->nom }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.zones.index') }}">Zones</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.zones.edit', $zone) }}" class="btn btn-primary">
                <i class="feather-edit me-2"></i>Modifier
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Code</h6>
                        <p class="fw-bold fs-16">{{ $zone->code }}</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Nom</h6>
                        <p class="fw-bold fs-16">{{ $zone->nom }}</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Coefficient</h6>
                        <p class="fw-bold fs-16">{{ number_format($zone->coefficient, 2) }}</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Profondeur Forage</h6>
                        <p class="fw-bold fs-16">{{ $zone->profondeur_forage }} m</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Prix Foncier (m²)</h6>
                        <p class="fw-bold fs-16">{{ number_format($zone->prix_foncier_m2, 0, ',', ' ') }} XOF</p>
                    </div>
                    <div class="col-md-12 mb-0">
                        <h6 class="text-muted text-uppercase fs-12">Description</h6>
                        <p>{{ $zone->description ?? 'Aucune description' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
