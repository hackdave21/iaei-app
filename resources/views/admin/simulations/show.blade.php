@extends('admin.layouts.master')

@section('title', 'Détails de la Simulation - ' . ($simulation->reference_id ?? $simulation->id))

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Détails Simulation: {{ $simulation->reference_id ?? 'SIM-' . $simulation->id }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.simulations.index') }}">Simulations</a></li>
                <li class="breadcrumb-item">Détails</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <!-- Simulation Overview -->
            <div class="col-xxl-4 col-lg-5">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <div class="avatar-text avatar-xl bg-soft-primary text-primary mx-auto mb-3">
                                <i class="feather-activity fs-1"></i>
                            </div>
                            <h4 class="mb-1">{{ $simulation->reference_id ?? 'SIM-' . $simulation->id }}</h4>
                            <span class="badge bg-soft-success text-success">{{ $simulation->status }}</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Client / Lead</span>
                                <span class="fw-medium text-dark">
                                    @if($simulation->lead)
                                        <a href="{{ route('admin.leads.show', $simulation->lead) }}">{{ $simulation->lead->first_name }} {{ $simulation->lead->last_name }}</a>
                                    @elseif($simulation->user)
                                        {{ $simulation->user->name }}
                                    @else
                                        Anonyme
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Type de Secteur</span>
                                <span class="fw-medium text-dark">{{ $simulation->sectorType->name ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Quantité/Surface</span>
                                <span class="fw-medium text-dark">{{ $simulation->input_quantity }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Date de création</span>
                                <span class="fw-medium text-dark">{{ $simulation->created_at->format('d/m/Y H:i') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Financial Summary -->
                <div class="card stretch stretch-full text-white bg-dark">
                    <div class="card-body">
                        <h5 class="card-title text-white mb-4">Résumé Financier</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Montant de Base</span>
                            <span class="fw-bold">{{ number_format($simulation->base_amount, 0, ',', ' ') }} XOF</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Options</span>
                            <span class="fw-bold">+ {{ number_format($simulation->options_amount, 0, ',', ' ') }} XOF</span>
                        </div>
                        <hr class="bg-white op-20">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total HT</span>
                            <span class="fw-bold">{{ number_format($simulation->total_amount_ht, 0, ',', ' ') }} XOF</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span>TVA</span>
                            <span>{{ number_format($simulation->tax_amount, 0, ',', ' ') }} XOF</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-white mb-0">TOTAL TTC</h4>
                            <h3 class="text-primary mb-0">{{ number_format($simulation->total_amount_ttc, 0, ',', ' ') }} XOF</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Configuration Data & Options -->
            <div class="col-xxl-8 col-lg-7">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Données de Configuration</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($simulation->configuration_data && (is_array($simulation->configuration_data) || is_object($simulation->configuration_data)))
                                @foreach($simulation->configuration_data as $key => $value)
                                    <div class="col-sm-6 mb-3">
                                        <div class="p-3 border rounded">
                                            <span class="text-muted d-block fs-12 mb-1 text-uppercase">{{ str_replace('_', ' ', $key) }}</span>
                                            <span class="fw-bold text-dark">{{ is_array($value) ? json_encode($value) : $value }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">Aucune donnée de configuration spécifique.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Options Sélectionnées</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Option</th>
                                        <th>Prix Unitaire</th>
                                        <th>Quantité</th>
                                        <th class="text-end">Sous-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($simulation->simulationOptions as $option)
                                    <tr>
                                        <td>{{ $option->option->name ?? 'Option #' . $option->id }}</td>
                                        <td>{{ number_format($option->unit_price, 0, ',', ' ') }} XOF</td>
                                        <td>{{ $option->quantity }}</td>
                                        <td class="text-end fw-bold">{{ number_format($option->subtotal, 0, ',', ' ') }} XOF</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Aucune option sélectionnée.</td>
                                    </tr>
                                    @endforelse
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
