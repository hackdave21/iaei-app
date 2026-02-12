@extends('admin.layouts.master')

@section('title', 'Gestion des Devis')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Gestion des Devis</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Devis</li>
            </ul>
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
                                        <th>Numéro</th>
                                        <th>Lead / Client</th>
                                        <th>Simulation</th>
                                        <th>Validité</th>
                                        <th>Statut</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotations as $quotation)
                                    <tr>
                                        <td><span class="fw-bold text-dark">{{ $quotation->quotation_number }}</span></td>
                                        <td>
                                            @if($quotation->lead)
                                                <div class="hstack gap-2">
                                                    <div class="avatar-text avatar-sm bg-soft-primary text-primary">{{ substr($quotation->lead->first_name, 0, 1) }}{{ substr($quotation->lead->last_name, 0, 1) }}</div>
                                                    <div>
                                                        <span class="d-block fw-semibold text-dark">{{ $quotation->lead->first_name }} {{ $quotation->lead->last_name }}</span>
                                                        <span class="fs-12 text-muted">{{ $quotation->lead->email }}</span>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted">Inconnu</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.simulations.show', $quotation->simulation_id) }}" class="badge bg-soft-info text-info">
                                                {{ $quotation->simulation->reference_id ?? 'SIM-' . $quotation->simulation_id }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="text-{{ $quotation->valid_until->isPast() ? 'danger' : 'muted' }}">
                                                {{ $quotation->valid_until->format('d/m/Y') }}
                                            </span>
                                        </td>
                                        <td>
                                            @php
                                                $statusClass = [
                                                    'pending' => 'bg-soft-warning text-warning',
                                                    'sent' => 'bg-soft-primary text-primary',
                                                    'accepted' => 'bg-soft-success text-success',
                                                    'rejected' => 'bg-soft-danger text-danger',
                                                    'expired' => 'bg-soft-secondary text-secondary',
                                                ][$quotation->status] ?? 'bg-soft-primary text-primary';
                                                
                                                $statusLabel = [
                                                    'pending' => 'En attente',
                                                    'sent' => 'Envoyé',
                                                    'accepted' => 'Accepté',
                                                    'rejected' => 'Refusé',
                                                    'expired' => 'Expiré',
                                                ][$quotation->status] ?? $quotation->status;
                                            @endphp
                                            <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.quotations.show', $quotation) }}" class="avatar-text avatar-md">
                                                    <i class="feather-eye"></i>
                                                </a>
                                                @if($quotation->pdf_path)
                                                    <a href="{{ asset($quotation->pdf_path) }}" class="avatar-text avatar-md" target="_blank">
                                                        <i class="feather-download"></i>
                                                    </a>
                                                @endif
                                                <form action="{{ route('admin.quotations.destroy', $quotation) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce devis ?')">
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
                            {{ $quotations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
