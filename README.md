# AIAE (Afrika Infrastructure, Automation & Energy) - Documentation Technique & Fonctionnelle

**Version:** 1.0.0  
**Statut:** Backend en cours de développement  
**Entreprise:** AIAE SARL (Togo – Afrique de l’Ouest)

---

## 1. Présentation Générale du Projet

### Vision AIAE
AIAE se positionne comme un leader innovant en Afrique de l'Ouest dans les domaines de la construction, de l'énergie et de la sécurité. L'objectif est de digitaliser et simplifier l'accès à des services d'infrastructure de haute qualité via une plateforme web unifiée.

### Positionnement Stratégique
Le projet vise à centraliser l'offre de quatre divisions stratégiques :
1.  **Construction** : Bâtiments résidentiels, tertiaires, industriels et agricoles.
2.  **Énergies Renouvelables** : Solutions solaires, éoliennes, biogaz et hybrides.
3.  **Sécurité Haute Performance** : Coffres-forts, panic rooms, sécurité bancaire.
4.  **Préfabrication** : Matériaux de construction innovants et écologiques.

### Rôle du Simulateur 4-en-1
Le cœur de l'application est un **simulateur de coûts multi-secteurs** intelligent. Il permet aux clients de configurer leurs projets (ex: dimensionnement solaire, construction d'entrepôt) et d'obtenir une estimation budgétaire précise, tout en générant des leads qualifiés pour l'équipe commerciale.

---

## 2. Architecture Globale de l’Application

L'application suit une architecture moderne **Headless (API-first)** pour garantir flexibilité, scalabilité et maintenabilité.

### Principes Clés
*   **Séparation Frontend / Backend** : Le Frontend (Site Public + Simulateurs) est découplé du Backend. Ils communiquent exclusivement via des API REST sécurisées.
*   **API-first** : Toute la logique métier réside dans l'API Laravel. Le Frontend n'est qu'une interface de consommation.
*   **Single Source of Truth** : La base de données MySQL est la source unique de vérité pour les prix, les configurations et les données clients.

### Diagramme Logique (Description)

```
[CLIENT / VISITEUR]      [ADMIN / STAFF]
       |                        |
[FRONTEND PUBLIC]        [BACKOFFICE ADMIN] (Intégré)
(Vue.js / React / etc.)  (Blade / Vue / Livewire)
       |                        |
       +-----------+------------+
                   |
            [API GATEWAY] (Routes API Laravel)
                   |
          [CONTROLLERS API] <---> [SERVICES MÉTIER] (Calculs, PDF, Mail)
                   |
             [MODELS ELOQUENT]
                   |
           [BASE DE DONNÉES MySQL]
```

---

## 3. Modules Fonctionnels

### 3.1 Gestion des Divisions & Secteurs
Administration centralisée des 4 divisions et de leurs sous-secteurs pour organiser les offres et les règles de calcul.

### 3.2 Simulateur de Coûts Multi-Secteurs
Moteur de calcul dynamique capable de gérer des règles de prix complexes :
*   Prix au m² / m³.
*   Coefficients de complexité.
*   Options additionnelles (finitions, matériaux).
*   Logique conditionnelle (si option A choisie, option B indisponible).

### 3.3 Calculateur Énergies Renouvelables & ROI
Module spécifique pour le dimensionnement solaire/éolien :
*   Calcul de consommation basé sur les appareils.
*   Dimensionnement batteries/panneaux.
*   Estimation du Retour sur Investissement (ROI).

### 3.4 Calculateur Agricole & Rentabilité
Estimation des coûts pour les hangars/serres et projection de rentabilité pour les projets agricoles.

### 3.5 Génération de Devis & PDF
Génération automatique de documents PDF professionnels basés sur les simulations, prêts à être envoyés par email.

### 3.6 Sauvegarde & Comparaison
Permet aux utilisateurs (avec compte) de sauvegarder leurs simulations pour les reprendre plus tard ou les comparer.

### 3.7 Leads & CRM
Transformation automatique des simulations terminées en "Leads" dans le backoffice pour suivi commercial (statut, relance, conversion).

### 3.8 Prise de Rendez-vous
Système intégré ou connecteur (ex: Calendly API) pour planifier des consultations techniques après simulation.

---

## 4. Base de Données (Schéma Prévisionnel)

La base de données est relationnelle (MySQL). Voici les tables critiques.

### 4.1 Utilisateurs & Accès
*   **`users`** : `id`, `name`, `email`, `password`, `role_id`, `created_at`.
*   **`roles`** : `id`, `name` (admin, manager, sales, user), `slug`.
*   **`permissions`** : `id`, `name`, `slug` (ex: `view_leads`, `edit_prices`).
*   **`permission_role`** : Table pivot.

### 4.2 Structure de l'Offre
*   **`divisions`** : `id`, `name`, `slug`, `description`, `icon`. (Ex: Construction, Énergie).
*   **`sectors`** : `id`, `division_id`, `name`, `slug` (ex: Résidentiel, Solaire).
*   **`service_types`** : `id`, `sector_id`, `name` (ex: Villa R+1, Hangar).

### 4.3 Moteur de Prix (Pricing Engine)
*   **`base_prices`** : `id`, `service_type_id`, `unit_price`, `unit_type` (m2, kwh, unit).
*   **`coefficients`** : `id`, `name`, `value`, `condition_key` (ex: Coeff zone difficile = 1.2).
*   **`options`** : `id`, `service_type_id`, `name`, `price_modifier`, `type` (fixed, percentage).

### 4.4 Simulations & Leads
*   **`leads`** : `id`, `service_type_id`, `user_id` (nullable), `first_name`, `last_name`, `email`, `phone`, `status` (new, contacted, closed).
*   **`simulations`** : `id`, `lead_id`, `reference_code` (unique), `total_amount`, `details_json` (snapshot des données), `pdf_path`.
*   **`simulation_items`** : `id`, `simulation_id`, `description`, `quantity`, `unit_price`, `total`.

### 4.5 Énergie & ROI
*   **`energy_profiles`** : `id`, `simulation_id`, `consumption_daily_kwh`, `peak_power_kw`.
*   **`roi_calculations`** : `id`, `simulation_id`, `investment_cost`, `yearly_savings`, `payback_period_months`.

### 4.6 Rendez-vous
*   **`appointments`** : `id`, `lead_id`, `user_id` (agent), `scheduled_at`, `status`, `notes`.

### 4.7 Système
*   **`admin_settings`** : `key` (ex: global_tax_rate), `value`.
*   **`activity_logs`** : `id`, `user_id`, `action`, `target_model`, `details`.

---

## 5. Models Laravel

Chaque modèle correspond à une entité métier et gère ses relations.

*   `User` : Gère l'auth et les rôles (`hasOne Role`).
*   `Division` : `hasMany Sector`.
*   `Sector` : `belongsTo Division`, `hasMany ServiceType`.
*   `ServiceType` : `hasMany BasePrice`, `hasMany Option`.
*   `Simulation` : Cœur du métier. `belongsTo Lead`, `hasMany SimulationItem`, `hasOne EnergyProfile`.
*   `Lead` : `hasMany Simulation`, `hasMany Appointment`.
*   `BasePrice` : Gère les tarifs unitaires.
*   `Option` : Gère les extras configurables.

---

## 6. Controllers

### Commandes API (`Api/`)
*   `SimulationController` :
    *   `store(Request $request)` : Reçoit les data du frontend, calcule le devis, crée le Lead et la Simulation.
    *   `show($ref)` : Récupère une simulation par code.
*   `SectorController` : Renvoie la liste des divisions/secteurs pour alimenter le menu du frontend.
*   `ServiceController` : Renvoie les configurations possibles (options, inputs requis) pour un service donné.

### Commandes Admin (`Admin/`)
*   `DashboardController` : KPI (CA potentiel, nb leads, top services).
*   `PriceController` : CRUD pour mettre à jour les `BasePrice` et `Coefficients`.
*   `LeadController` : Gestion des prospects (changement statut, assignation).

---

## 7. Routes (API & Web)

### API Publique (`routes/api.php`)
```php
GET  /divisions              // Liste des divisions
GET  /sectors/{division}     // Sous-secteurs
GET  /config/{serviceType}   // Formulaire dynamique (champs, options)
POST /simulate               // Soumission simulation -> Retourne Résultat + PDF
```

### API Sécurisée (User/Client)
```php
middleware(['auth:sanctum'])
GET  /my-simulations
GET  /profile
```

### Routes Admin (Backoffice - `routes/web.php` ou `routes/admin.php`)
```php
middleware(['auth', 'role:admin|manager'])
GET    /admin/dashboard
RESOURCE /admin/prices
RESOURCE /admin/leads
```

---

## 8. Admin Panel (Backoffice)

Le template backoffice existant doit être connecté aux contrôleurs Laravel.

### Fonctionnalités Clés
1.  **Gestionnaire de Tarifs** : Interface tableau pour éditer rapidement les prix au m2 sans toucher au code.
2.  **Pipeline CRM** : Vue kanban ou liste des Leads entrants.
3.  **Configuration Technique** : Activer/Désactiver des options ou des secteurs.
4.  **Dashboard Analytics** :
    *   Nombre de simulations par jour.
    *   Taux de conversion (Simulation -> Contact).
    *   Volume d'affaires estimé.

### Rôles
*   **Admin** : Accès total, configuration système.
*   **Commercial** : Accès Leads et Appointments uniquement.
*   **Analyste** : Accès Dashboards et Stats (Lecture seule).

---

## 9. Logique de Calcul du Simulateur

Le service de calcul (`PricingService`) doit suivre cette logique :

1.  **Montant Base** = `Quantité (m2/kW)` * `Prix Unitaire (BasePrice)`.
2.  **Ajustement Complexité** = `Montant Base` * `Coefficients` (ex: sol difficile, urgence).
3.  **Options** : Somme des `Options` choisies (fixes ou % du total).
4.  **Sous-Total Technique** = Base + Ajustements + Options.
5.  **Marge Commerciale** = Appliquée selon le secteur (config en DB).
6.  **Taxes** = Application TVA ou taxes spécifiques.
7.  **Total Client TTC**.

*Pour l'agricole/énergie, ajouter une étape "Projection ROI" basée sur les économies mensuelles estimées.*

---

## 10. Sécurité & Conformité

*   **Authentification** : Laravel Sanctum pour l'API (Token based).
*   **Protection API** : Rate Limiting (Throttle) pour éviter le spam de simulations.
*   **Validation** : `FormRequests` stricts pour toutes les entrées (éviter injection SQL/XSS).
*   **RGPD** : Checkbox obligatoire pour collecte de données + Politique de confidentialité. Cadenas HTTPS obligatoire en production.
*   **CORS** : Configurer pour n'accepter que les requêtes venant du domaine frontend officiel.

---

## 11. Installation & Configuration (Backend)

### Prérequis
*   PHP 8.1+
*   Composer
*   MySQL 8.0+
*   Node.js & NPM (pour compiler les assets du backoffice si nécessaire)

### Installation
1.  **Cloner le repo**
    ```bash
    git clone https://github.com/aiae-dev/backend.git
    cd backend
    ```
2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```
3.  **Environnement**
    ```bash
    cp .env.example .env
    # Configurer DB_DATABASE, DB_USERNAME, DB_PASSWORD
    php artisan key:generate
    ```
4.  **Base de données**
    ```bash
    php artisan migrate --seed
    # Le seeder créera l'admin par défaut et les divisions initiales
    ```
5.  **Lancer le serveur**
    ```bash
    php artisan serve
    ```

---

## 12. Évolutions Futures

*   **Connexion Frontend** : Intégration react/vue finale.
*   **IA de Recommandation** : Suggérer des options (ex: "Les clients avec ce type de terrain choisissent souvent cette fondation").
*   **Mobile App** : Déclinaison de l'espace client en app native.
*   **Multi-devises** : Gestion dynamique des taux de change (XOF, EUR, USD).


