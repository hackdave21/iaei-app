@extends('admin.layouts.master')

@section('title', 'Détails du Rendez-vous')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails du Rendez-vous</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.appointments.index') }}">Rendez-vous</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-primary">
                        <i class="feather-edit me-2"></i>
                        <span>Modifier</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-xxl-4 col-lg-5">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="avatar-text avatar-xl bg-soft-primary text-primary mx-auto mb-3">
                                <i class="feather-calendar fs-1"></i>
                            </div>
                            <h4 class="mb-1">{{ $appointment->start_at->format('d/m/Y') }}</h4>
                            <p class="text-muted">{{ $appointment->start_at->format('H:i') }} - {{ $appointment->end_at->format('H:i') }}</p>
                            @php
                                $statusClass = [
                                    'scheduled' => 'bg-soft-primary text-primary',
                                    'completed' => 'bg-soft-success text-success',
                                    'cancelled' => 'bg-soft-danger text-danger',
                                    'no_show' => 'bg-soft-warning text-warning',
                                ][$appointment->status] ?? 'bg-soft-info text-info';
                                
                                $statusLabel = [
                                    'scheduled' => 'Planifié',
                                    'completed' => 'Terminé',
                                    'cancelled' => 'Annulé',
                                    'no_show' => 'Absent',
                                ][$appointment->status] ?? $appointment->status;
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Type</span>
                                <span class="fw-bold text-dark">{{ ucfirst($appointment->type) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Conseiller</span>
                                <span class="fw-bold text-dark">{{ $appointment->user->name ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Créé le</span>
                                <span class="text-dark">{{ $appointment->created_at->format('d/m/Y H:i') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xxl-8 col-lg-7">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Informations du Client / Lead</h5>
                    </div>
                    <div class="card-body">
                        @if($appointment->lead)
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h6 class="text-muted fs-12 text-uppercase mb-2">Nom Complet</h6>
                                    <p class="fw-bold text-dark mb-0">{{ $appointment->lead->first_name }} {{ $appointment->lead->last_name }}</p>
                                </div>
                                <div class="col-md-6 mb-4 text-md-end">
                                    <h6 class="text-muted fs-12 text-uppercase mb-2">Statut Lead</h6>
                                    <span class="badge bg-soft-primary text-primary">{{ $appointment->lead->status }}</span>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="text-muted fs-12 text-uppercase mb-2">Email</h6>
                                    <p class="text-dark mb-0">{{ $appointment->lead->email }}</p>
                                </div>
                                <div class="col-md-6 mb-4 text-md-end">
                                    <h6 class="text-muted fs-12 text-uppercase mb-2">Téléphone</h6>
                                    <p class="text-dark mb-0">{{ $appointment->lead->phone }}</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.leads.show', $appointment->lead) }}" class="btn btn-light-brand btn-sm">
                                    Voir le dossier complet <i class="feather-arrow-right ms-2"></i>
                                </a>
                            </div>
                        @else
                            <p class="text-muted">Aucun lead associé.</p>
                        @endif
                    </div>
                </div>

                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Notes & Commentaires</h5>
                    </div>
                    <div class="card-body">
                        <div class="bg-light p-4 rounded">
                            {!! nl2br(e($appointment->notes ?? 'Aucune note pour ce rendez-vous.')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
