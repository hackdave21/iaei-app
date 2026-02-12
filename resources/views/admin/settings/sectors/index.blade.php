@extends('admin.layouts.master')

@section('title', 'Gestion des Secteurs')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Gestion des Secteurs</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Paramètres</li>
                <li class="breadcrumb-item">Secteurs</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.sectors.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Ajouter un Secteur</span>
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
                                        <th>Secteur</th>
                                        <th>Division</th>
                                        <th>Types de Secteur</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sectors as $sector)
                                    <tr>
                                        <td>
                                            <div class="hstack gap-3">
                                                @if($sector->image_url)
                                                    <div class="avatar-image avatar-md">
                                                        <img src="{{ $sector->image_url }}" alt="" class="img-fluid">
                                                    </div>
                                                @else
                                                    <div class="avatar-text avatar-md bg-soft-primary text-primary">
                                                        <i class="feather-map"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <span class="d-block fw-semibold text-dark">{{ $sector->name }}</span>
                                                    <code class="fs-11 text-muted">{{ $sector->slug }}</code>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-gray-200 text-dark">
                                                <i class="{{ $sector->division->icon ?? 'feather-grid' }} me-1"></i>
                                                {{ $sector->division->name }}
                                            </span>
                                        </td>
                                        <td><span class="badge bg-soft-info text-info">{{ $sector->sector_types_count }} types</span></td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.sectors.edit', $sector) }}" class="avatar-text avatar-md">
                                                    <i class="feather-edit-3"></i>
                                                </a>
                                                <form action="{{ route('admin.sectors.destroy', $sector) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Êtes-vous sûr ? Cela ne fonctionnera pas si le secteur contient des types de secteur.')">
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
