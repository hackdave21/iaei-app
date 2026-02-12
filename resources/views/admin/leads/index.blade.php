@extends('admin.layouts.master')

@section('title', 'Gestion des Leads')

@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Leads</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Leads</li>
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
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        <i class="feather-bar-chart"></i>
                    </a>
                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                            <i class="feather-filter"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <span class="wd-7 ht-7 bg-primary rounded-circle d-inline-block me-3"></span>
                                <span>Nouveau</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <span class="wd-7 ht-7 bg-warning rounded-circle d-inline-block me-3"></span>
                                <span>En cours</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <span class="wd-7 ht-7 bg-success rounded-circle d-inline-block me-3"></span>
                                <span>Qualifié</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <span class="wd-7 ht-7 bg-danger rounded-circle d-inline-block me-3"></span>
                                <span>Refusé</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <span class="wd-7 ht-7 bg-teal rounded-circle d-inline-block me-3"></span>
                                <span>Client</span>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('admin.leads.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Créer un Lead</span>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
        <div class="accordion-body pb-2">
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-xl rounded">
                                        <i class="feather-users"></i>
                                    </div>
                                    <div class="fw-bold d-block">
                                        <span class="d-block">Total Leads</span>
                                        <span class="fs-24 fw-bolder d-block">{{ $leads->total() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Other summary cards can be added here -->
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="leadList">
                                <thead>
                                    <tr>
                                        <th class="wd-30">
                                            <div class="btn-group mb-1">
                                                <div class="custom-control custom-checkbox ms-1">
                                                    <input type="checkbox" class="custom-control-input" id="checkAllLead">
                                                    <label class="custom-control-label" for="checkAllLead"></label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Prospect</th>
                                        <th>Email</th>
                                        <th>Source</th>
                                        <th>Téléphone</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $lead)
                                    <tr class="single-item">
                                        <td>
                                            <div class="item-checkbox ms-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkbox" id="checkBox_{{ $lead->id }}">
                                                    <label class="custom-control-label" for="checkBox_{{ $lead->id }}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.leads.show', $lead) }}" class="hstack gap-3">
                                                <div class="avatar-image avatar-md">
                                                    <div class="avatar-text avatar-md bg-soft-primary text-primary">{{ substr($lead->first_name, 0, 1) }}{{ substr($lead->last_name, 0, 1) }}</div>
                                                </div>
                                                <div>
                                                    <span class="text-truncate-1-line">{{ $lead->first_name }} {{ $lead->last_name }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td>
                                        <td>{{ $lead->source ?? 'N/A' }}</td>
                                        <td>{{ $lead->phone ?? 'N/A' }}</td>
                                        <td>{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
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
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.leads.show', $lead) }}" class="avatar-text avatar-md">
                                                    <i class="feather feather-eye"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                        <i class="feather feather-more-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.leads.edit', $lead) }}">
                                                                <i class="feather feather-edit-3 me-3"></i>
                                                                <span>Modifier</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item" onclick="return confirm('Êtes-vous sûr ?')">
                                                                    <i class="feather feather-trash-2 me-3"></i>
                                                                    <span>Supprimer</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer px-0 border-top-0">
                            {{ $leads->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection
