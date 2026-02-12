 @extends('admin.layouts.master')

@section('title','Tableau de bord AIAE')
@section('content')

 <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Tableau de bord</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item">Tableau de bord</li>
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
                            <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                                <span class="reportrange-picker-field"></span>
                            </div>
                            <div class="dropdown filter-dropdown">
                                <a class="btn btn-md btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter me-2"></i>
                                    <span>Filtrer</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Role" checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Role">Rôle</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Team" checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Team">Équipe</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Email" checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Email">E-mail</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Member" checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Member">Membre</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Recommendation" checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Recommendation">Recommandation</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-plus me-3"></i>
                                        <span>Créer nouveau</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-filter me-3"></i>
                                        <span>Gérer les filtres</span>
                                    </a>
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
                    <!-- [Invoices Awaiting Payment] start -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <i class="feather-dollar-sign"></i>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">{{ number_format($chiffreAffairesTotal, 0, ',', ' ') }}</span>FCFA</div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Chiffre d'Affaires Total</h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Factures en attente </a>
                                        <div class="w-100 text-end">
                                            <span class="fs-12 text-dark">{{ number_format(5569, 0, ',', ' ') }} FCFA</span>
                                            <span class="fs-11 text-muted">(56%)</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Invoices Awaiting Payment] end -->
                    <!-- [Converted Leads] start -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <i class="feather-cast"></i>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $totalLeads }}</span></div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Leads</h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('admin.leads.index') }}" class="fs-12 fw-medium text-muted text-truncate-1-line">Leads convertis </a>
                                        <div class="w-100 text-end">
                                            <span class="fs-12 text-dark">52 Terminés</span>
                                            <span class="fs-11 text-muted">(63%)</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 63%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Converted Leads] end -->
                    <!-- [Projects In Progress] start -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <i class="feather-briefcase"></i>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $totalSimulations }}</span></div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Simulations</h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Projets en cours </a>
                                        <div class="w-100 text-end">
                                            <span class="fs-12 text-dark">16 Terminés</span>
                                            <span class="fs-11 text-muted">(78%)</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Projects In Progress] end -->
                    <!-- [Conversion Rate] start -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <i class="feather-activity"></i>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $totalQuotations }}</span></div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Devis</h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line"> Taux de conversion </a>
                                        <div class="w-100 text-end">
                                            <span class="fs-12 text-dark">{{ number_format(2254, 0, ',', ' ') }} FCFA</span>
                                            <span class="fs-11 text-muted">(46%)</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 46%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Conversion Rate] end -->
                    <!-- [Payment Records] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Registre des paiements</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Supprimer">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Actualiser">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Agrandir/Réduire">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>Nouveau</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Événement</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Mis en veille</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Supprimé</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Paramètres</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Conseils & Astuces</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div id="payment-records-chart"></div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-4">
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">En attente</div>
                                            <h6 class="fw-bold text-dark">{{ number_format(5486, 0, ',', ' ') }} FCFA</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 81%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">Terminé</div>
                                            <h6 class="fw-bold text-dark">{{ number_format(9275, 0, ',', ' ') }} FCFA</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 82%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">Rejeté</div>
                                            <h6 class="fw-bold text-dark">{{ number_format(3868, 0, ',', ' ') }} FCFA</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 68%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">Revenu</div>
                                            <h6 class="fw-bold text-dark">{{ number_format(50668, 0, ',', ' ') }} FCFA</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 75%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Payment Records] end -->
                    <!-- [Mini] start -->
                    <div class="col-lg-4">
                        <div class="card mb-4 stretch stretch-full">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="avatar-text">
                                        <i class="feather feather-star"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">Tâches terminées</div>
                                        <div class="fs-12 text-muted">22/35 terminées</div>
                                    </div>
                                </div>
                                <div class="fs-4 fw-bold text-dark">22/35</div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between gap-4">
                                <div id="task-completed-area-chart"></div>
                                <div class="fs-12 text-muted text-nowrap">
                                    <span class="fw-semibold text-primary">28% de plus</span><br />
                                    <span>depuis la semaine dernière</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-4 stretch stretch-full">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="avatar-text">
                                        <i class="feather feather-file-text"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">Nouvelles tâches</div>
                                        <div class="fs-12 text-muted">0/20 tâches</div>
                                    </div>
                                </div>
                                <div class="fs-4 fw-bold text-dark">5/20</div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between gap-4">
                                <div id="new-tasks-area-chart"></div>
                                <div class="fs-12 text-muted text-nowrap">
                                    <span class="fw-semibold text-success">34% de plus</span><br />
                                    <span>depuis la semaine dernière</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-4 stretch stretch-full">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="avatar-text">
                                        <i class="feather feather-airplay"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">Projets terminés</div>
                                        <div class="fs-12 text-muted">20/30 projets</div>
                                    </div>
                                </div>
                                <div class="fs-4 fw-bold text-dark">20/30</div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between gap-4">
                                <div id="project-done-area-chart"></div>
                                <div class="fs-12 text-muted text-nowrap">
                                    <span class="fw-semibold text-danger">42% de plus</span><br />
                                    <span>depuis la semaine dernière</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Mini] end !-->
                    <!-- [Leads Overview] start -->
                    <div class="col-xxl-4">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Aperçu des leads</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Supprimer">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Actualiser">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Agrandir/Réduire">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>Nouveau</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Événement</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Mis en veille</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Supprimé</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Paramètres</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Conseils & Astuces</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div id="leads-overview-donut"></div>
                                <div class="row g-2">
                                    <div class="col-4">
                                        <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                            <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #3454d1"></span>
                                            <span>Nouveau</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                            <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #0d519e"></span>
                                            <span>Qualifié</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                            <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #1976d2"></span>
                                            <span>Proposition</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                            <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #1e88e5"></span>
                                            <span>Client</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                            <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #2196f3"></span>
                                            <span>Perdu</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Leads Overview] end -->
                    <!-- [Latest Leads] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Derniers leads</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Supprimer">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Actualiser">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Agrandir/Réduire">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>Nouveau</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Événement</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Mis en veille</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Supprimé</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Paramètres</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Conseils & Astuces</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="border-b">
                                                <th scope="row">Utilisateurs</th>
                                                <th>Proposition</th>
                                                <th>Date</th>
                                                <th>Statut</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leadsRecents as $lead)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar-text avatar-md bg-soft-primary text-primary">
                                                            {{ strtoupper(substr($lead->first_name, 0, 1)) }}
                                                        </div>
                                                        <a href="{{ route('admin.leads.show', $lead) }}">
                                                            <span class="d-block">{{ $lead->first_name }} {{ $lead->last_name }}</span>
                                                            <span class="fs-12 d-block fw-normal text-muted">{{ $lead->email }}</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-gray-200 text-dark">{{ $lead->source ?? 'Direct' }}</span>
                                                </td>
                                                <td>{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <span class="badge bg-soft-primary text-primary">{{ ucfirst($lead->status) }}</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ route('admin.leads.show', $lead) }}"><i class="feather-eye"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                                    <li>
                                        <a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);" class="active">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="bi bi-dot"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);">8</a></li>
                                    <li><a href="javascript:void(0);">9</a></li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- [Latest Leads] end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>

@endsection

