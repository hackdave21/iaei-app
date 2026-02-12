@extends('admin.layouts.master')

@section('title', 'Gestion des Simulations')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Gestion des Simulations</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Simulations</li>
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
                                        <th>Référence</th>
                                        <th>Client / Lead</th>
                                        <th>Type de Secteur</th>
                                        <th>Montant Total</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($simulations as $simulation)
                                    <tr>
                                        <td><span class="fw-bold text-dark">{{ $simulation->reference_id ?? 'SIM-' . $simulation->id }}</span></td>
                                        <td>
                                            @if($simulation->lead)
                                                <div class="hstack gap-2">
                                                    <div class="avatar-text avatar-sm bg-soft-primary text-primary">{{ substr($simulation->lead->first_name, 0, 1) }}{{ substr($simulation->lead->last_name, 0, 1) }}</div>
                                                    <div>
                                                        <span class="d-block fw-semibold text-dark">{{ $simulation->lead->first_name }} {{ $simulation->lead->last_name }}</span>
                                                        <span class="fs-12 text-muted">{{ $simulation->lead->email }}</span>
                                                    </div>
                                                </div>
                                            @elseif($simulation->user)
                                                <div class="hstack gap-2">
                                                    <div class="avatar-text avatar-sm bg-soft-info text-info">{{ substr($simulation->user->name, 0, 1) }}</div>
                                                    <div>
                                                        <span class="d-block fw-semibold text-dark">{{ $simulation->user->name }}</span>
                                                        <span class="fs-12 text-muted">{{ $simulation->user->email }}</span>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted">Anonyme</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-secondary text-secondary">{{ $simulation->sectorType->name ?? 'N/A' }}</span>
                                        </td>
                                        <td><span class="fw-bold text-dark">{{ number_format($simulation->total_amount_ttc, 0, ',', ' ') }} XOF</span></td>
                                        <td>
                                            @php
                                                $statusClass = [
                                                    'draft' => 'bg-soft-warning text-warning',
                                                    'completed' => 'bg-soft-success text-success',
                                                    'cancelled' => 'bg-soft-danger text-danger',
                                                ][$simulation->status] ?? 'bg-soft-primary text-primary';
                                                
                                                $statusLabel = [
                                                    'draft' => 'Brouillon',
                                                    'completed' => 'Terminée',
                                                    'cancelled' => 'Annulée',
                                                ][$simulation->status] ?? $simulation->status;
                                            @endphp
                                            <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                        </td>
                                        <td>{{ $simulation->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.simulations.show', $simulation) }}" class="avatar-text avatar-md">
                                                    <i class="feather-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.simulations.destroy', $simulation) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="avatar-text avatar-md border-0 bg-transparent text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette simulation ?')">
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
                            {{ $simulations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
