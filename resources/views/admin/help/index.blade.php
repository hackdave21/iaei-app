@extends('admin.layouts.master')

@section('title', 'Centre d\'aide & Documentation complète')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Guide d'utilisation AIAE Backoffice</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
                <li class="breadcrumb-item">Centre d'aide</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <!-- Navigation latérale -->
            <div class="col-xxl-3 col-lg-4">
                <div class="card stretch stretch-full sticky-top" style="top: 100px;">
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush shadow-sm" id="help-nav">
                            <a href="#intro" class="list-group-item list-group-item-action active py-3">
                                <i class="feather-info me-2"></i> Bienvenue & Visions
                            </a>
                            <a href="#crm" class="list-group-item list-group-item-action py-3">
                                <i class="feather-users me-2"></i> CRM : Prospects & RDV
                            </a>
                            <a href="#simu" class="list-group-item list-group-item-action py-3">
                                <i class="feather-activity me-2"></i> Simulations & Devis
                            </a>
                            <a href="#data" class="list-group-item list-group-item-action py-3">
                                <i class="feather-database me-2"></i> Données de Référence
                            </a>
                            <a href="#config" class="list-group-item list-group-item-action py-3">
                                <i class="feather-settings me-2"></i> Configuration Financière
                            </a>
                            <a href="#admin" class="list-group-item list-group-item-action py-3">
                                <i class="feather-shield me-2"></i> Gestion Administrateurs
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenu de la documentation -->
            <div class="col-xxl-9 col-lg-8">
                <div class="card stretch stretch-full">
                    <div class="card-body p-5 help-content">
                        
                        <!-- Introduction -->
                        <section id="intro" class="doc-section mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-soft-primary p-3 rounded-circle me-3">
                                    <i class="feather-award fs-3 text-primary"></i>
                                </div>
                                <h3 class="mb-0">Bienvenue sur le Support AIAE</h3>
                            </div>
                            <p class="lead text-gray-600">Le backoffice AIAE est conçu pour automatiser et sécuriser l'intégralité du tunnel de vente, de la simulation publique à la signature du contrat.</p>
                            
                            <div class="row g-4 mt-2">
                                <div class="col-md-6">
                                    <div class="p-3 border rounded-lg bg-light">
                                        <h6 class="fw-bold"><i class="feather-home me-2"></i> Construction</h6>
                                        <p class="small text-muted mb-0">Gestion de projet résidentiel, tertiaire, industriel et agricole.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border rounded-lg bg-light">
                                        <h6 class="fw-bold"><i class="feather-zap me-2"></i> Énergie</h6>
                                        <p class="small text-muted mb-0">Dimensionnement solaire et autonomie énergétique.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <hr class="opacity-25 my-5">

                        <!-- CRM -->
                        <section id="crm" class="doc-section mb-5">
                            <h4 class="fw-bold mb-4 border-start border-4 border-primary ps-3">CRM : Gestion des Prospects</h4>
                            
                            <div class="mb-4">
                                <h6><i class="feather-user-plus me-2 text-primary"></i> Les Leads (Prospects)</h6>
                                <p>Toutes les demandes issues des formulaires "Devis" ou "Contact" arrivent ici.</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><span class="badge bg-soft-info text-info me-2">Nouveau</span> Demande fraîche, à qualifier rapidement (sous 48h).</li>
                                    <li class="mb-2"><span class="badge bg-soft-warning text-warning me-2">En cours</span> Un agent a pris contact et étudie le dossier.</li>
                                    <li class="mb-2"><span class="badge bg-soft-success text-success me-2">Qualifié</span> Le client est prêt pour une proposition formelle.</li>
                                </ul>
                            </div>

                            <div class="alert alert-soft-secondary p-4">
                                <h6><i class="feather-calendar me-2"></i> Prise de Rendez-vous</h6>
                                <p class="mb-0 small">Vous pouvez planifier des RDV directement liés à un Lead. Les types supportés sont <strong>Appel</strong>, <strong>Visio (Zoom/Meet)</strong> ou <strong>Au siège (Lomé)</strong>. Le système permet de garder un historique des échanges.</p>
                            </div>
                        </section>

                        <hr class="opacity-25 my-5">

                        <!-- Simulations -->
                        <section id="simu" class="doc-section mb-5">
                            <h4 class="fw-bold mb-4 border-start border-4 border-primary ps-3">Simulations & Devis</h4>
                            <p>C'est ici que l'expertise d'AIAE est automatisée.</p>
                            
                            <div class="card bg-dark text-white p-4 mb-4">
                                <h6 class="text-white">Le Processus "Expert"</h6>
                                <ol class="small mb-0 mt-3">
                                    <li class="mb-2">Le client fait une simulation sur le site (Step 1 à 5).</li>
                                    <li class="mb-2">Le Lead est créé avec un <strong>Snapshot</strong> de ses choix (Surface, Standing, Sol, Zone).</li>
                                    <li class="mb-2">Vous revoyez la simulation dans <em>Simulations > Détails</em>.</li>
                                    <li class="mb-2">Vous générez un <strong>Devis formel</strong> (Quotation) au format PDF à envoyer au client.</li>
                                </ol>
                            </div>

                            <div class="bg-soft-warning p-3 rounded border-warning">
                                <small><strong>Note Technique :</strong> Le simulateur utilise des coefficients géographiques (Zone) et géotechniques (Sols) pour ajuster le prix au m² en temps réel.</small>
                            </div>
                        </section>

                        <hr class="opacity-25 my-5">

                        <!-- Reference Data -->
                        <section id="data" class="doc-section mb-5">
                            <h4 class="fw-bold mb-4 border-start border-4 border-primary ps-3">Données de Référence</h4>
                            <p>N'ajoutez de nouvelles données ici que si nécessaire pour le moteur de calcul.</p>
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="border p-3 rounded">
                                        <h6 class="small fw-bold">Zones</h6>
                                        <p class="x-small text-muted">Définit le coût logistique (ex: Lomé vs Savanes).</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border p-3 rounded">
                                        <h6 class="small fw-bold">Sols</h6>
                                        <p class="x-small text-muted">Ajuste le coût des fondations (ex: Sableux vs Rocheux).</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border p-3 rounded">
                                        <h6 class="small fw-bold">Standings</h6>
                                        <p class="x-small text-muted">Définit la qualité des finitions et le prix de base.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <hr class="opacity-25 my-5">

                        <!-- Configuration -->
                        <section id="config" class="doc-section mb-5">
                            <h4 class="fw-bold mb-4 border-start border-4 border-primary ps-3">Configuration Financière</h4>
                            <div class="card border-danger p-4">
                                <h6 class="text-danger"><i class="feather-alert-octagon me-2"></i> Modification des Prix de Base</h6>
                                <p class="small">Les prix de base sont définis par <strong>Type de Secteur</strong> (ex: Résidenciel Standard). </p>
                                <ul class="small">
                                    <li><strong>Base Price Mode :</strong> 'Unit' (par m²) ou 'Fixed' (forfaitaire).</li>
                                    <li><strong>Coefficients :</strong> Frais de dossier, taxes, marges de sécurité.</li>
                                </ul>
                                <p class="mb-0 text-muted small italic">Toute modification s'applique instantanément aux nouvelles simulations client.</p>
                            </div>
                        </section>

                        <hr class="opacity-25 my-5">

                        <!-- Admin -->
                        <section id="admin" class="doc-section">
                            <h4 class="fw-bold mb-4 border-start border-4 border-primary ps-3">Gestion Administrateurs</h4>
                            <p>Dans <em>Paramètres > Utilisateurs</em>, vous pouvez gérer les accès.</p>
                            <table class="table table-sm table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="small py-2">Rôle</th>
                                        <th class="small py-2">Droits</th>
                                    </tr>
                                </thead>
                                <tbody class="small">
                                    <tr>
                                        <td class="fw-bold">Super Admin</td>
                                        <td>Accès total, modification des prix et suppression de données.</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Agent / Conseiller</td>
                                        <td>Gestion des Leads, RDV et Devis. Pas d'accès à la config prix.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('style')
<style>
    .doc-section {
        scroll-margin-top: 110px;
    }
    .help-content h4 {
        margin-top: 40px;
        color: #0E1540;
    }
    .help-content h6 {
        color: #0E1540;
        margin-top: 15px;
    }
    .list-group-item.active {
        background-color: #0E1540;
        border-color: #0E1540;
    }
    .list-group-item:not(.active):hover {
        background-color: #f8f9fa;
        color: #0E1540;
    }
    .x-small { font-size: 0.75rem; }
</style>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('#help-nav .list-group-item');
        
        // Gestion du scroll fluide
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });

        // Highlight du menu au scroll
        window.addEventListener('scroll', function() {
            let current = '';
            const sections = document.querySelectorAll('.doc-section');
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= sectionTop - 120) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('active');
                }
            });
        });
    });
</script>
@endpush
@endsection
