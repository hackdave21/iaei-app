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
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Rendez-vous</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.appointments.index') }}">Calendrier / Liste</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.appointments.create') }}">Nouveau RDV</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-activity"></i></span>
                        <span class="nxl-mtext">Simulations</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.simulations.index') }}">Toutes les simulations</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Analyses</a></li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-file-text"></i></span>
                        <span class="nxl-mtext">Devis</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.quotations.index') }}">Tous les devis</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Paramètres devis</a></li>
                    </ul>
                </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-alert-circle"></i></span>
                            <span class="nxl-mtext">Leads</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.leads.index') }}">Liste des Leads</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.leads.create') }}">Nouveau Lead</a></li>
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
