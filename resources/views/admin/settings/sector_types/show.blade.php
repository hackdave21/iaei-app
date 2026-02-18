@extends('admin.layouts.master')

@section('title', 'Gestion des Prix - ' . $sectorType->name)

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Gestion des Prix: {{ $sectorType->name }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sector-types.index') }}">Types de Secteur</a></li>
                <li class="breadcrumb-item">Détails & Prix</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <!-- Sidebar Info -->
            <div class="col-xxl-4 col-lg-5">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <div class="avatar-text avatar-xl bg-soft-primary text-primary mx-auto mb-3">
                                <i class="feather-layers fs-1"></i>
                            </div>
                            <h4 class="mb-1">{{ $sectorType->name }}</h4>
                            <span class="badge bg-soft-info text-info">
                                @if($sectorType->base_price_mode == 'fixed') Forfait @elseif($sectorType->base_price_mode == 'area') Par Surface @else Par Unité @endif
                            </span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Division</span>
                                <span class="fw-medium text-dark">{{ $sectorType->sector->division->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Secteur</span>
                                <span class="fw-medium text-dark">{{ $sectorType->sector->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted">Slug</span>
                                <code class="fs-11">{{ $sectorType->slug }}</code>
                            </li>
                        </ul>
                        <div class="mt-4">
                            <h6>Description</h6>
                            <p class="text-muted fs-13 mb-0">{{ $sectorType->description ?? 'Aucune description' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-xxl-8 col-lg-7">
                <!-- Pricing Rules -->
                <div class="card stretch stretch-full">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Règles de Prix de Base</h5>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addPricingRuleModal">
                            <i class="feather-plus me-2"></i>Ajouter
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Prix de Base</th>
                                        <th>Devise</th>
                                        <th>Validité</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sectorType->pricingRules as $rule)
                                    <tr>
                                        <td class="fw-bold text-dark">{{ number_format($rule->base_unit_price, 2) }}</td>
                                        <td>{{ $rule->currency_code }}</td>
                                        <td>
                                            @if($rule->valid_from)
                                                <span class="fs-12">Du {{ $rule->valid_from->format('d/m/Y') }}</span>
                                            @endif
                                            @if($rule->valid_until)
                                                <span class="fs-12">Au {{ $rule->valid_until->format('d/m/Y') }}</span>
                                            @endif
                                            @if(!$rule->valid_from && !$rule->valid_until)
                                                <span class="badge bg-soft-success text-success">Permanent</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="text-danger"><i class="feather-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Aucune règle de prix définie.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pricing Coefficients -->
                <div class="card stretch stretch-full">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Coefficients de Calcul</h5>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCoefficientModal">
                            <i class="feather-plus me-2"></i>Ajouter
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Valeur</th>
                                        <th>Portée</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sectorType->pricingCoefficients as $coeff)
                                    <tr>
                                        <td>{{ $coeff->name }}</td>
                                        <td class="fw-bold text-dark">{{ $coeff->value }}</td>
                                        <td>
                                            @if($coeff->is_global)
                                                <span class="badge bg-soft-warning text-warning">Global</span>
                                            @else
                                                <span class="badge bg-soft-info text-info">Local</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="text-danger"><i class="feather-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Aucun coefficient défini.</td>
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

@push('modals')
<!-- Modal Pricing Rule -->
<div class="modal fade" id="addPricingRuleModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.sector-types.pricing-rules.store', $sectorType) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une Règle de Prix</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Prix de Base ({{ $sectorType->base_price_mode }})</label>
                        <input type="number" step="0.01" name="base_unit_price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Devise</label>
                        <input type="text" name="currency_code" class="form-control" value="XOF" required max="3">
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Valide du</label>
                            <input type="date" name="valid_from" class="form-control">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Valide au</label>
                            <input type="date" name="valid_until" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Pricing Coefficient -->
<div class="modal fade" id="addCoefficientModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.sector-types.pricing-coefficients.store', $sectorType) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un Coefficient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom du Coefficient</label>
                        <input type="text" name="name" class="form-control" required placeholder="ex: Frais de dossier">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valeur</label>
                        <input type="number" step="0.0001" name="value" class="form-control" required placeholder="ex: 1.2">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_global" id="coeff_global">
                            <label class="form-check-label" for="coeff_global">Coefficient global</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endpush
@endsection
