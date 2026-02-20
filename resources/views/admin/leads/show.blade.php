@extends('admin.layouts.master')

@section('title', 'Détails du Lead - ' . $lead->first_name . ' ' . $lead->last_name)

@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails du Lead</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.leads.index') }}">Leads</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Retour</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" onclick="window.print()">
                        <i class="feather-printer"></i>
                    </a>
                    <a href="{{ route('admin.leads.edit', $lead) }}" class="btn btn-icon btn-light-brand">
                        <i class="feather-edit"></i>
                    </a>
                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                            <i class="feather-more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">
                                    <i class="feather-trash-2 me-3"></i>
                                    <span>Supprimer le Lead</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-xxl-4 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="avatar-text avatar-xxl bg-soft-primary text-primary mb-3">
                                {{ substr($lead->first_name, 0, 1) }}{{ substr($lead->last_name, 0, 1) }}
                            </div>
                            <h4 class="mb-1">{{ $lead->first_name }} {{ $lead->last_name }}</h4>
                            <p class="text-muted">{{ $lead->company_name ?? 'Particulier' }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="fw-bold">Statut:</span>
                            @php
                                $statusClass = [
                                    'new' => 'bg-primary',
                                    'working' => 'bg-warning',
                                    'qualified' => 'bg-success',
                                    'declined' => 'bg-danger',
                                    'customer' => 'bg-teal',
                                    'contacted' => 'bg-indigo',
                                ][$lead->status] ?? 'bg-secondary';
                                
                                $statusLabel = [
                                    'new' => 'Nouveau',
                                    'working' => 'En cours',
                                    'qualified' => 'Qualifié',
                                    'declined' => 'Refusé',
                                    'customer' => 'Client',
                                    'contacted' => 'Contacté',
                                ][$lead->status] ?? $lead->status;
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="fw-bold">Source:</span>
                            <span>{{ $lead->source ?? 'Inconnue' }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="fw-bold">Assigné à:</span>
                            <span>{{ $lead->assignedTo ? $lead->assignedTo->name : 'Non assigné' }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <span class="fw-bold">Créé le:</span>
                            <span>{{ $lead->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Coordonnées</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <p><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Téléphone</label>
                            <p><a href="tel:{{ $lead->phone }}">{{ $lead->phone ?? 'N/A' }}</a></p>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fw-bold">Société</label>
                            <p>{{ $lead->company_name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-8 col-xl-7">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="leadDetailTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">Détails Projet V4</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="simulations-tab" data-bs-toggle="tab" data-bs-target="#simulations" type="button" role="tab">Simulations</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="quotations-tab" data-bs-toggle="tab" data-bs-target="#quotations" type="button" role="tab">Devis</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="appointments-tab" data-bs-toggle="tab" data-bs-target="#appointments" type="button" role="tab">Rendez-vous</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes" type="button" role="tab">Notes</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="leadDetailTabsContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Type de Projet</label>
                                        <div class="p-3 bg-soft-primary rounded">{{ $lead->type_projet ?? 'Non spécifié' }}</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Budget Estimé</label>
                                        <div class="p-3 bg-soft-success rounded">{{ $lead->budget_estime ? number_format($lead->budget_estime, 0, ',', ' ') . ' FCFA' : 'N/A' }}</div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label fw-bold">Description du Projet</label>
                                        <div class="p-3 border rounded">
                                            {!! nl2br(e($lead->description_projet ?? 'Aucune description fournie.')) !!}
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label fw-bold">Message du Client</label>
                                        <div class="p-3 border rounded bg-light">
                                            {!! nl2br(e($lead->message ?? 'Aucun message.')) !!}
                                        </div>
                                    </div>
                                    @if($lead->donnees_simulation_snapshot)
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-danger">Aperçu Configuration (Snapshot)</label>
                                        <pre class="bg-dark text-white p-3 rounded fs-10" style="max-height: 200px; overflow: auto;">{{ json_encode($lead->donnees_simulation_snapshot, JSON_PRETTY_PRINT) }}</pre>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="simulations" role="tabpanel">
                                @if($lead->simulations->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Résultat</th>
                                                    <th>Date</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lead->simulations as $simulation)
                                                <tr>
                                                    <td>{{ $simulation->type }}</td>
                                                    <td>{{ number_format($simulation->total_price, 0, ',', ' ') }} FCFA</td>
                                                    <td>{{ $simulation->created_at->format('d/m/Y') }}</td>
                                                    <td class="text-end">
                                                        <a href="{{ route('admin.simulations.show', $simulation) }}" class="btn btn-sm btn-light-brand">Voir</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center text-muted py-4">Aucune simulation trouvée.</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="quotations" role="tabpanel">
                                @if($lead->quotations->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Numéro</th>
                                                    <th>Montant</th>
                                                    <th>Statut</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lead->quotations as $quotation)
                                                <tr>
                                                    <td>{{ $quotation->quotation_number }}</td>
                                                    <td>{{ number_format($quotation->total_amount, 0, ',', ' ') }} FCFA</td>
                                                    <td><span class="badge bg-soft-info text-info">{{ $quotation->status }}</span></td>
                                                    <td class="text-end">
                                                        <a href="{{ route('admin.quotations.show', $quotation) }}" class="btn btn-sm btn-light-brand">Voir</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center text-muted py-4">Aucun devis trouvé.</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="appointments" role="tabpanel">
                                @if($lead->appointments->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lead->appointments as $appointment)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</td>
                                                    <td>{{ $appointment->type }}</td>
                                                    <td>{{ $appointment->status }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center text-muted py-4">Aucun rendez-vous trouvé.</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="notes" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Notes du Lead</label>
                                    <div class="p-3 bg-light rounded">
                                        {!! nl2br(e($lead->notes ?? 'Aucune note.')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection
