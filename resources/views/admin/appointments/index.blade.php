@extends('admin.layouts.master')

@section('title', 'Gestion des Rendez-vous')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Gestion des Rendez-vous</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Rendez-vous</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Nouveau RDV</span>
                    </a>
                </div>
            </div>
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
                                        <th>Date & Heure</th>
                                        <th>Lead / Client</th>
                                        <th>Conseiller</th>
                                        <th>Type</th>
                                        <th>Statut</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                    <tr>
                                        <td>
                                            <div class="hstack gap-3">
                                                <div class="avatar-text avatar-md bg-soft-primary text-primary">
                                                    <i class="feather-calendar"></i>
                                                </div>
                                                <div>
                                                    <span class="d-block fw-bold text-dark">{{ $appointment->start_at->format('d/m/Y') }}</span>
                                                    <span class="fs-12 text-muted">{{ $appointment->start_at->format('H:i') }} - {{ $appointment->end_at->format('H:i') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($appointment->lead)
                                                <div class="hstack gap-2">
                                                    <div class="avatar-text avatar-sm bg-soft-info text-info">{{ substr($appointment->lead->first_name, 0, 1) }}{{ substr($appointment->lead->last_name, 0, 1) }}</div>
                                                    <div>
                                                        <span class="d-block fw-semibold text-dark">{{ $appointment->lead->first_name }} {{ $appointment->lead->last_name }}</span>
                                                        <span class="fs-12 text-muted">{{ $appointment->lead->phone }}</span>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-medium text-dark">{{ $appointment->user->name ?? 'Non assigné' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-secondary text-secondary">{{ ucfirst($appointment->type) }}</span>
                                        </td>
                                        <td>
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
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.appointments.show', $appointment) }}" class="avatar-text avatar-md">
                                                    <i class="feather-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.appointments.edit', $appointment) }}" class="avatar-text avatar-md">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')">
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
                        <div class="p-3">
                            {{ $appointments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
