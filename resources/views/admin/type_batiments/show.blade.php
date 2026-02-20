@extends('admin.layouts.master')

@section('title', 'Détails du Bâtiment')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails Bâtiment: {{ $typeBatiment->nom }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.type-batiments.index') }}">Bâtiments</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.type-batiments.edit', $typeBatiment) }}" class="btn btn-primary">
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
                        <p class="fw-bold fs-16">{{ $typeBatiment->code }}</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Nom</h6>
                        <p class="fw-bold fs-16">{{ $typeBatiment->nom }}</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase fs-12">Coefficient</h6>
                        <p class="fw-bold fs-16">{{ number_format($typeBatiment->coefficient, 2) }}</p>
                    </div>
                    <div class="col-md-12 mb-0">
                        <h6 class="text-muted text-uppercase fs-12">Description</h6>
                        <p>{{ $typeBatiment->description ?? 'Aucune description' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
