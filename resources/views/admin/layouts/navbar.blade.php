<nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('admin.dashboard') }}" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{ asset('admin-assets/assets/images/logo-full.png') }}" alt="" class="logo logo-lg" />
                    <img src="{{ asset('admin-assets/assets/images/logo-abbr.png') }}" alt="" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Tableaux de bord</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.dashboard') }}">CRM</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Analytics</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-cast"></i></span>
                            <span class="nxl-mtext">Rapports</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Rapport de Ventes</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Rapport de Leads</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-at-sign"></i></span>
                            <span class="nxl-mtext">Propositions</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Proposition</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Voir Proposition</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Modifier Proposition</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Créer Proposition</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                            <span class="nxl-mtext">Paiements</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Paiement</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Voir Facture</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Créer Facture</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Clients</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Clients</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Voir Clients</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Créer Clients</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-alert-circle"></i></span>
                            <span class="nxl-mtext">Leads</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.leads.index') }}">Leads</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.leads.index') }}">Voir Leads</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.leads.create') }}">Créer Leads</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">Configuration</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.divisions.index') }}">Divisions</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.sectors.index') }}">Secteurs</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.sector-types.index') }}">Types de Secteur</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Paramètres Généraux</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-life-buoy"></i></span>
                            <span class="nxl-mtext">Centre d'aide</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                             <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Assistance</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Base de connaissances</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Documentation</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
