@extends('admin.layouts.master')

@section('title', 'Gestion des Utilisateurs')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Utilisateurs</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item">Utilisateurs</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Nouvel Utilisateur</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Liste des Utilisateurs</h5>
                        <div class="card-header-action">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0"><i class="feather-search"></i></span>
                                <input type="text" id="userSearch" class="form-control border-start-0" placeholder="Rechercher...">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="userTable">
                                <thead>
                                    <tr>
                                        <th>Utilisateur</th>
                                        <th>Rôle</th>
                                        <th>Statut</th>
                                        <th>Date d'inscription</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="userTableBody">
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Chargement...</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div id="paginationInfo" class="text-muted small"></div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm mb-0" id="userPagination">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentPage = 1;
    const searchInput = document.getElementById('userSearch');
    
    // Load users
    function loadUsers(page = 1, search = '') {
        const tableBody = document.getElementById('userTableBody');
        const url = new URL("{{ route('admin.users.api.index') }}");
        url.searchParams.append('page', page);
        if (search) url.searchParams.append('search', search);

        fetch(url)
            .then(response => response.json())
            .then(res => {
                if (res.success) {
                    renderTable(res.data.data);
                    renderPagination(res.data);
                }
            })
            .catch(err => {
                console.error(err);
                tableBody.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Erreur lors du chargement des données.</td></tr>';
            });
    }

    function renderTable(users) {
        const tableBody = document.getElementById('userTableBody');
        if (users.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="5" class="text-center py-4">Aucun utilisateur trouvé.</td></tr>';
            return;
        }

        tableBody.innerHTML = users.map(user => `
            <tr>
                <td>
                    <div class="hstack gap-3">
                        <div class="avatar-text avatar-md bg-soft-primary text-primary">
                            ${user.name.substring(0, 1).toUpperCase()}
                        </div>
                        <div>
                            <span class="text-truncate-1-line fw-bold">${user.name}</span>
                            <small class="text-muted d-block">${user.email}</small>
                        </div>
                    </div>
                </td>
                <td><span class="badge bg-soft-secondary text-secondary text-uppercase">${user.role ?? 'User'}</span></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input toggle-status" type="checkbox" data-id="${user.id}" ${user.is_active ? 'checked' : ''}>
                        <label class="form-check-label">${user.is_active ? 'Actif' : 'Inactif'}</label>
                    </div>
                </td>
                <td>${new Date(user.created_at).toLocaleDateString('fr-FR')}</td>
                <td>
                    <div class="hstack gap-2 justify-content-end">
                        <a href="/admin/users/${user.id}/edit" class="avatar-text avatar-md" title="Modifier">
                            <i class="feather-edit-3"></i>
                        </a>
                        <button class="avatar-text avatar-md border-0 bg-transparent text-danger delete-user" data-id="${user.id}" title="Supprimer">
                            <i class="feather-trash-2"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');

        // Attach event listeners
        document.querySelectorAll('.toggle-status').forEach(btn => {
            btn.addEventListener('change', function() {
                toggleStatus(this.dataset.id);
            });
        });

        document.querySelectorAll('.delete-user').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                    deleteUser(this.dataset.id);
                }
            });
        });
    }

    function renderPagination(data) {
        const pagination = document.getElementById('userPagination');
        const info = document.getElementById('paginationInfo');
        
        info.innerText = `Affichage de ${data.from ?? 0} à ${data.to ?? 0} sur ${data.total} utilisateurs`;
        
        let html = '';
        if (data.last_page > 1) {
            // Previous
            html += `<li class="page-item ${data.current_page === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${data.current_page - 1}">Précédent</a>
            </li>`;

            // Max 5 page links
            let start = Math.max(1, data.current_page - 2);
            let end = Math.min(data.last_page, start + 4);
            if (end - start < 4) start = Math.max(1, end - 4);

            for (let i = start; i <= end; i++) {
                html += `<li class="page-item ${i === data.current_page ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
            }

            // Next
            html += `<li class="page-item ${data.current_page === data.last_page ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${data.current_page + 1}">Suivant</a>
            </li>`;
        }
        pagination.innerHTML = html;

        pagination.querySelectorAll('.page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = parseInt(this.dataset.page);
                if (!isNaN(page) && page !== data.current_page) {
                    currentPage = page;
                    loadUsers(page, searchInput.value);
                }
            });
        });
    }

    function toggleStatus(id) {
        fetch(\`/admin/users.api/\${id}/toggle-status\`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(res => {
            if (res.success) {
                loadUsers(currentPage, searchInput.value);
            }
        });
    }

    function deleteUser(id) {
        fetch(\`/admin/users.api/\${id}\`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(res => {
            if (res.success) {
                loadUsers(currentPage, searchInput.value);
            }
        });
    }

    // Search event
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            currentPage = 1;
            loadUsers(1, this.value);
        }, 500);
    });

    // Initial load
    loadUsers();
});
</script>
@endsection
