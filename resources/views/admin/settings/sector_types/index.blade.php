@extends('admin.layouts.master')

@section('title', 'Gestion des Types de Secteur')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Gestion des Types de Secteur</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Paramètres</li>
                <li class="breadcrumb-item">Types de Secteur</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.sector-types.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Ajouter un Type</span>
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
                                        <th>Secteur / Division</th>
                                        <th>Mode de Prix</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sectorTypes as $type)
                                    <tr>
                                        <td>
                                            <div class="hstack gap-3">
                                                <div class="avatar-text avatar-md bg-soft-primary text-primary">
                                                    <i class="feather-layers"></i>
                                                </div>
                                                <div>
                                                    <span class="d-block fw-semibold text-dark">{{ $type->name }}</span>
                                                    <code class="fs-11 text-muted">{{ $type->slug }}</code>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="d-block fw-medium text-dark">{{ $type->sector->name }}</span>
                                            <span class="fs-12 text-muted">{{ $type->sector->division->name }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-info text-info">
                                                @if($type->base_price_mode == 'fixed') Fixé @elseif($type->base_price_mode == 'area') Par Surface @else Par Unité @endif
                                            </span>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.sector-types.show', $type) }}" class="avatar-text avatar-md" title="Gérer les prix">
                                                    <i class="feather-dollar-sign"></i>
                                                </a>
                                                <a href="{{ route('admin.sector-types.edit', $type) }}" class="avatar-text avatar-md">
                                                    <i class="feather-edit-3"></i>
                                                </a>
                                                <form action="{{ route('admin.sector-types.destroy', $type) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Êtes-vous sûr ? Cela ne fonctionnera pas si le type est utilisé dans des simulations.')">
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
