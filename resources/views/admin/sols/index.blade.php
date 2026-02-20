@extends('admin.layouts.master')

@section('title', 'Gestion des Types de Sols')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Types de Sols (Géotechnique)</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Sols</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.sols.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Ajouter un Type de Sol</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Coefficient</th>
                                <th>Prix Fondation (m²)</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sols as $sol)
                            <tr>
                                <td><span class="badge bg-soft-warning text-warning">{{ $sol->code }}</span></td>
                                <td class="fw-bold">{{ $sol->nom }}</td>
                                <td>{{ $sol->coefficient }}</td>
                                <td>{{ number_format($sol->prix_fondation_m2, 0, ',', ' ') }} FCFA</td>
                                <td class="text-end">
                                    <div class="hstack gap-2 justify-content-end">
                                        <a href="{{ route('admin.sols.edit', $sol) }}" class="avatar-text avatar-md">
                                            <i class="feather feather-edit-3"></i>
                                        </a>
                                        <form action="{{ route('admin.sols.destroy', $sol) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Supprimer ce type de sol ?')">
                                                <i class="feather feather-trash-2"></i>
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
@endsection
