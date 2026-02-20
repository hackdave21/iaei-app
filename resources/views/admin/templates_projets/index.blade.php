@extends('admin.layouts.master')

@section('title', 'Gestion des Modèles Premium')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Modèles de Projets (Templates)</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Templates</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <a href="{{ route('admin.templates-projets.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Ajouter un Modèle</span>
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
                                <th>Ordre</th>
                                <th>Nom</th>
                                <th>Secteur</th>
                                <th>Type</th>
                                <th>Standing</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($templates as $template)
                            <tr>
                                <td>{{ $template->ordre_affichage }}</td>
                                <td class="fw-bold">{{ $template->nom }}</td>
                                <td>{{ $template->secteur }}</td>
                                <td><span class="badge bg-soft-info text-info">{{ $template->type_batiment }}</span></td>
                                <td>{{ $template->standing }}</td>
                                <td class="text-end">
                                    <div class="hstack gap-2 justify-content-end">
                                        <a href="{{ route('admin.templates-projets.edit', $template) }}" class="avatar-text avatar-md">
                                            <i class="feather feather-edit-3"></i>
                                        </a>
                                        <form action="{{ route('admin.templates-projets.destroy', $template) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Supprimer ce modèle ?')">
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
