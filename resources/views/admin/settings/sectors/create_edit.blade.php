@extends('admin.layouts.master')

@php
    $isEdit = isset($sector);
    $title = $isEdit ? 'Modifier le Secteur' : 'Ajouter un Secteur';
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
                <li class="breadcrumb-item"><a href="{{ route('admin.sectors.index') }}">Secteurs</a></li>
                <li class="breadcrumb-item">{{ $isEdit ? 'Modifier' : 'Ajouter' }}</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ $isEdit ? route('admin.sectors.update', $sector) : route('admin.sectors.store') }}" method="POST">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif
                    
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Division <span class="text-danger">*</span></label>
                                    <select name="division_id" class="form-control @error('division_id') is-invalid @enderror" required>
                                        <option value="">Sélectionner une division</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}" {{ old('division_id', $sector->division_id ?? '') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $sector->name ?? '') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">URL de l'image (Illustrative)</label>
                                    <input type="url" name="image_url" class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url', $sector->image_url ?? '') }}" placeholder="https://example.com/image.jpg">
                                    @error('image_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.sectors.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Mettre à jour' : 'Créer' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
