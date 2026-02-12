@extends('admin.layouts.master')

@section('title', 'Gestion des Divisions')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Gestion des Divisions</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Paramètres</li>
                <li class="breadcrumb-item">Divisions</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.divisions.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Ajouter une Division</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Slug</th>
                                        <th>Secteurs</th>
                                        <th>Statut</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($divisions as $division)
                                    <tr>
                                        <td>
                                            <div class="hstack gap-3">
                                                <div class="avatar-text avatar-md bg-soft-primary text-primary">
                                                    <i class="{{ $division->icon ?? 'feather-grid' }}"></i>
                                                </div>
                                                <div>
                                                    <span class="d-block fw-semibold text-dark">{{ $division->name }}</span>
                                                    <span class="fs-12 text-muted text-truncate-1-line">{{ $division->description }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><code>{{ $division->slug }}</code></td>
                                        <td><span class="badge bg-soft-info text-info">{{ $division->sectors_count }} secteurs</span></td>
                                        <td>
                                            @if($division->is_active)
                                                <span class="badge bg-soft-success text-success">Actif</span>
                                            @else
                                                <span class="badge bg-soft-danger text-danger">Inactif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.divisions.edit', $division) }}" class="avatar-text avatar-md">
                                                    <i class="feather-edit-3"></i>
                                                </a>
                                                <form action="{{ route('admin.divisions.destroy', $division) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Êtes-vous sûr ? Cela ne fonctionnera pas si la division contient des secteurs.')">
                                                        <i class="feather-trash-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
