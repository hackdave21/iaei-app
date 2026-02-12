@extends('admin.layouts.master')

@section('title', 'Centre d\'aide & Documentation')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Centre d'aide AIAE</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Documentation</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush" id="help-nav">
                            <a href="#overview" class="list-group-item list-group-item-action active">
                                <i class="feather-info me-2"></i> Vue d'ensemble
                            </a>
                            <a href="#crm" class="list-group-item list-group-item-action">
                                <i class="feather-users me-2"></i> Gestion des Prospects (CRM)
                            </a>
                            <a href="#appointments" class="list-group-item list-group-item-action">
                                <i class="feather-calendar me-2"></i> Prise de Rendez-vous
                            </a>
                            <a href="#simulations" class="list-group-item list-group-item-action">
                                <i class="feather-activity me-2"></i> Simulations & Devis
                            </a>
                            <a href="#config" class="list-group-item list-group-item-action">
                                <i class="feather-settings me-2"></i> Configuration du Système
                            </a>
                            <a href="#profile" class="list-group-item list-group-item-action">
                                <i class="feather-user me-2"></i> Mon Profil & Paramètres
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9 col-lg-8">
                <div class="card stretch stretch-full">
                    <div class="card-body help-content">
                        <!-- Overview -->
                        <div id="overview" class="doc-section">
                            <h3 class="mb-4">Bienvenue sur le Support AIAE</h3>
                            <p class="lead">Ce guide complet a été conçu pour vous aider à naviguer et à utiliser efficacement toutes les fonctionnalités de votre backoffice AIAE.</p>
                            <div class="alert alert-soft-primary border-primary">
                                <div class="d-flex">
                                    <i class="feather-help-circle fs-4 me-3"></i>
                                    <div>
                                        <strong>Besoin d'aide rapide ?</strong> Utilisez le menu à gauche pour accéder directement à la section qui vous intéresse.
                                    </div>
                                </div>
                            </div>
                            <p>Le backoffice AIAE est votre centre de commande pour gérer les interactions clients, planifier des rendez-vous agricoles et configurer les moteurs de calcul pour les simulations de projets.</p>
                        </div>

                        <hr class="my-5">

                        <!-- CRM -->
                        <div id="crm" class="doc-section">
                            <h4 class="mb-3"><i class="feather-users text-primary me-2"></i> Gestion des Prospects (CRM)</h4>
                            <p>Le module **Leads** est le point d'entrée de votre tunnel de vente.</p>
                            <ul>
                                <li><strong>Créer un Prospect :</strong> Allez dans <em>Leads > Nouveau Lead</em>. Remplissez les informations de contact. Le statut par défaut est "Nouveau".</li>
                                <li><strong>Suivi :</strong> Changez le statut d'un prospect (Nouveau, En cours, Contacté, Qualifié) pour suivre son progression.</li>
                                <li><strong>Assignation :</strong> Vous pouvez assigner un prospect à un conseiller spécifique pour un suivi personnalisé.</li>
                                <li><strong>Notes :</strong> Utilisez le champ "Notes" pour garder une trace de tous les échanges.</li>
                            </ul>
                        </div>

                        <hr class="my-5">

                        <!-- Appointments -->
                        <div id="appointments" class="doc-section">
                            <h4 class="mb-3"><i class="feather-calendar text-primary me-2"></i> Prise de Rendez-vous</h4>
                            <p>Planifiez vos rencontres avec les agriculteurs ou les partenaires directement depuis l'interface.</p>
                            <ul>
                                <li><strong>Planifier :</strong> Cliquez sur <em>Nouveau RDV</em>. Sélectionnez le prospect concerné, le conseiller, la date et le type de réunion (Téléphone, Visite, En ligne).</li>
                                <li><strong>États :</strong> Un rendez-vous peut être <em>Planifié</em>, <em>Terminé</em> ou <em>Annulé</em>.</li>
                                <li><strong>Rappels :</strong> Le système envoie automatiquement des notifications basées sur les détails enregistrés.</li>
                            </ul>
                        </div>

                        <hr class="my-5">

                        <!-- Simulations -->
                        <div id="simulations" class="doc-section">
                            <h4 class="mb-3"><i class="feather-activity text-primary me-2"></i> Simulations & Devis</h4>
                            <p>C'est ici que réside l'intelligence métier de l'application AIAE.</p>
                            <ul>
                                <li><strong>Simulations :</strong> Elles sont générées depuis le site public ou créées par les conseillers. Elles calculent les coûts basés sur les types de secteurs et les surfaces.</li>
                                <li><strong>Devis :</strong> Un devis est généré à partir d'une simulation validée. Il a une date de validité et peut être téléchargé en format PDF.</li>
                                <li><strong>Gestion :</strong> Vous pouvez consulter le détail complet de chaque calcul pour expliquer les coûts au client.</li>
                            </ul>
                        </div>

                        <hr class="my-5">

                        <!-- Config -->
                        <div id="config" class="doc-section">
                            <h4 class="mb-3"><i class="feather-settings text-primary me-2"></i> Configuration du Système</h4>
                            <p>Paramétrez les bases de calcul pour les simulations agricoles.</p>
                            <ul>
                                <li><strong>Divisions :</strong> Catégories de haut niveau (ex: Agriculture, Élevage).</li>
                                <li><strong>Secteurs :</strong> Sous-catégories spécifiques (ex: Maraîchage, Aviculture).</li>
                                <li><strong>Types de Secteur :</strong> C'est ici que vous définissez les <strong>Prix de Base</strong> et les <strong>Coefficients</strong> (frais de dossier, taxes, etc.).</li>
                            </ul>
                            <div class="alert alert-soft-warning border-warning mt-3">
                                <i class="feather-alert-triangle me-2"></i> **Attention :** Toute modification des prix impactera les futures simulations en temps réel.
                            </div>
                        </div>

                        <hr class="my-5">

                        <!-- Profile -->
                        <div id="profile" class="doc-section">
                            <h4 class="mb-3"><i class="feather-user text-primary me-2"></i> Mon Profil & Paramètres</h4>
                            <p>Gérez vos informations personnelles dans le menu profil en haut à droite.</p>
                            <ul>
                                <li><strong>Thème :</strong> Basculez entre le mode Clair ou Sombre selon votre préférence.</li>
                                <li><strong>Déconnexion :</strong> Pensez à vous déconnecter en fin de session pour garantir la sécurité des données.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('style')
<style>
    .doc-section {
        scroll-margin-top: 100px;
    }
    .help-content h4 {
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
        margin-top: 20px;
    }
    .help-content ul li {
        margin-bottom: 10px;
    }
</style>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('#help-nav .list-group-item');
        
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                window.scrollTo({
                    top: targetElement.offsetTop - 90,
                    behavior: 'smooth'
                });
                
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>
@endpush
@endsection
