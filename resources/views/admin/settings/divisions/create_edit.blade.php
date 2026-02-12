@extends('admin.layouts.master')

@php
    $isEdit = isset($division);
    $title = $isEdit ? 'Modifier la Division' : 'Ajouter une Division';
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
                <li class="breadcrumb-item"><a href="{{ route('admin.divisions.index') }}">Divisions</a></li>
                <li class="breadcrumb-item">{{ $isEdit ? 'Modifier' : 'Ajouter' }}</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ $isEdit ? route('admin.divisions.update', $division) : route('admin.divisions.store') }}" method="POST">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif
                    
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $division->name ?? '') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Icône (Feather icon class)</label>
                                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $division->icon ?? 'feather-grid') }}" placeholder="feather-grid">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $division->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $division->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Division active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.divisions.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Mettre à jour' : 'Créer' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
