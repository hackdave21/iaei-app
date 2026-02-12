@extends('admin.layouts.master')

@php
    $isEdit = isset($sectorType);
    $title = $isEdit ? 'Modifier le Type de Secteur' : 'Ajouter un Type de Secteur';
@endphp

@section('title', $title)

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ $title }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sector-types.index') }}">Types de Secteur</a></li>
                <li class="breadcrumb-item">{{ $isEdit ? 'Modifier' : 'Ajouter' }}</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ $isEdit ? route('admin.sector-types.update', $sectorType) : route('admin.sector-types.store') }}" method="POST">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif
                    
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Secteur <span class="text-danger">*</span></label>
                                    <select name="sector_id" class="form-control @error('sector_id') is-invalid @enderror" required>
                                        <option value="">Sélectionner un secteur</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}" {{ old('sector_id', $sectorType->sector_id ?? '') == $sector->id ? 'selected' : '' }}>
                                                {{ $sector->division->name }} > {{ $sector->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sector_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $sectorType->name ?? '') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Mode de Calcul du Prix de Base <span class="text-danger">*</span></label>
                                    <select name="base_price_mode" class="form-control @error('base_price_mode') is-invalid @enderror" required>
                                        <option value="fixed" {{ old('base_price_mode', $sectorType->base_price_mode ?? '') == 'fixed' ? 'selected' : '' }}>Fixe (Forfait)</option>
                                        <option value="area" {{ old('base_price_mode', $sectorType->base_price_mode ?? '') == 'area' ? 'selected' : '' }}>Par Surface (m²)</option>
                                        <option value="unit" {{ old('base_price_mode', $sectorType->base_price_mode ?? '') == 'unit' ? 'selected' : '' }}>Par Unité</option>
                                    </select>
                                    @error('base_price_mode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-0">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $sectorType->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.sector-types.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Mettre à jour' : 'Créer' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
