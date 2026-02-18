@extends('admin.layouts.master')

@section('title', 'Détails du Devis - ' . $quotation->quotation_number)

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails Devis: {{ $quotation->quotation_number }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.quotations.index') }}">Devis</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <!-- Quotation Info -->
            <div class="col-xxl-4 col-lg-5">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <div class="avatar-text avatar-xl bg-soft-info text-info mx-auto mb-3">
                                <i class="feather-file-text fs-1"></i>
                            </div>
                            <h4 class="mb-1">{{ $quotation->quotation_number }}</h4>
                            <span class="badge bg-soft-primary text-primary">{{ $quotation->status }}</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Lead / Client</span>
                                <span class="fw-medium text-dark">
                                    @if($quotation->lead)
                                        <a href="{{ route('admin.leads.show', $quotation->lead) }}">{{ $quotation->lead->first_name }} {{ $quotation->lead->last_name }}</a>
                                    @else
                                        Inconnu
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Simulation</span>
                                <span class="fw-medium text-dark">
                                    <a href="{{ route('admin.simulations.show', $quotation->simulation_id) }}">
                                        {{ $quotation->simulation->reference_id ?? 'SIM-' . $quotation->simulation_id }}
                                    </a>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Date d'émission</span>
                                <span class="fw-medium text-dark">{{ $quotation->created_at->format('d/m/Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Date de validité</span>
                                <span class="fw-medium text-{{ $quotation->valid_until->isPast() ? 'danger' : 'dark' }}">
                                    {{ $quotation->valid_until->format('d/m/Y') }}
                                </span>
                            </li>
                        </ul>
                        <div class="mt-4 d-grid gap-2">
                            @if($quotation->status != 'accepted')
                                <form action="{{ route('admin.quotations.accept', $quotation) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="feather-check-circle me-2"></i>Accepter le Devis
                                    </button>
                                </form>
                            @endif
                            @if($quotation->status != 'rejected')
                                <form action="{{ route('admin.quotations.reject', $quotation) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="feather-x-circle me-2"></i>Refuser le Devis
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('admin.quotations.send', $quotation) }}" method="POST" class="d-grid">
                                @csrf
                                <button type="submit" class="btn btn-info">
                                    <i class="feather-mail me-2"></i>Envoyer par e-mail
                                </button>
                            </form>
                            
                            @if($quotation->pdf_path)
                                <a href="{{ asset($quotation->pdf_path) }}" class="btn btn-primary" target="_blank">
                                    <i class="feather-download me-2"></i>Télécharger le PDF
                                </a>
                            @else
                                <button class="btn btn-light disabled">
                                    <i class="feather-slash me-2"></i>PDF non disponible
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Linked Simulation Detailed Results -->
            <div class="col-xxl-8 col-lg-7">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Résumé de la Simulation Associée</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="text-muted fs-12 text-uppercase mb-2">Type de Secteur</h6>
                                <p class="fw-bold text-dark mb-0">{{ $quotation->simulation->sectorType->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <h6 class="text-muted fs-12 text-uppercase mb-2">Montant Total TTC</h6>
                                <h4 class="text-primary mb-0">{{ number_format($quotation->simulation->total_amount_ttc, 0, ',', ' ') }} XOF</h4>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th>Description</th>
                                        <th class="text-end">Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Prix de Base ({{ $quotation->simulation->input_quantity }} @if($quotation->simulation->sectorType && $quotation->simulation->sectorType->base_price_mode == 'area') m² @else unités @endif)</td>
                                        <td class="text-end">{{ number_format($quotation->simulation->base_amount, 0, ',', ' ') }} XOF</td>
                                    </tr>
                                    <tr>
                                        <td>Options Sélectionnées</td>
                                        <td class="text-end">{{ number_format($quotation->simulation->options_amount, 0, ',', ' ') }} XOF</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td>Total HT</td>
                                        <td class="text-end">{{ number_format($quotation->simulation->total_amount_ht, 0, ',', ' ') }} XOF</td>
                                    </tr>
                                    <tr>
                                        <td>TVA / Taxes</td>
                                        <td class="text-end">{{ number_format($quotation->simulation->tax_amount, 0, ',', ' ') }} XOF</td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-dark text-white">
                                    <tr class="fw-bold">
                                        <td class="text-white">TOTAL TTC</td>
                                        <td class="text-end text-white text-primary">{{ number_format($quotation->simulation->total_amount_ttc, 0, ',', ' ') }} XOF</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="text-end">
                    <a href="{{ route('admin.simulations.show', $quotation->simulation_id) }}" class="btn btn-light-brand">
                        Voir la simulation complète <i class="feather-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
