@extends('admin.layouts.master')

@section('title', 'Gestion des Options d\'Équipements')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Options d'Équipements (V5.0)</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Équipements</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.equipement-options.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Ajouter une Option</span>
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
                                <th>Catégorie</th>
                                <th>Désignation</th>
                                <th>Puissance/Taille</th>
                                <th>Prix Min</th>
                                <th>Prix Max</th>
                                <th>Unité</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($options as $option)
                            <tr>
                                <td><span class="badge bg-soft-primary text-primary text-uppercase">{{ $option->categorie }}</span></td>
                                <td class="fw-bold">{{ $option->designation }}</td>
                                <td>{{ $option->puissance ?? '-' }}</td>
                                <td class="text-primary fw-bold">{{ number_format($option->prix_min, 0, ',', ' ') }}</td>
                                <td class="text-danger fw-bold">{{ number_format($option->prix_max, 0, ',', ' ') }}</td>
                                <td>{{ $option->unite }}</td>
                                <td class="text-end">
                                    <div class="hstack gap-2 justify-content-end">
                                        <a href="{{ route('admin.equipement-options.edit', $option) }}" class="avatar-text avatar-md">
                                            <i class="feather feather-edit-3"></i>
                                        </a>
                                        <form action="{{ route('admin.equipement-options.destroy', $option) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Supprimer cette option ?')">
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
