@extends('admin.layouts.master')

@section('title', 'Créer un Utilisateur')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Créer un Utilisateur</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
                <li class="breadcrumb-item">Créer</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Informations de l'utilisateur</h5>
                    </div>
                    <div class="card-body">
                        <form id="createUserForm">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="name">Nom complet</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Ex: Jean Kouassi" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="exemple@aiae.tg" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="password">Mot de passe</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 8 caractères" required minlength="8">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="role">Rôle</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="user">Utilisateur / Client</option>
                                        <option value="admin">Administrateur</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-check form-switch mt-4">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                        <label class="form-check-label" for="is_active">Utilisateur actif</label>
                                    </div>
                                </div>
                            </div>

                            <div id="formAlert" class="alert d-none mb-4"></div>

                            <div class="d-flex justify-content-end gap-3 mt-4">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-light-brand">Annuler</a>
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span class="spinner-border spinner-border-sm d-none me-2" role="status"></span>
                                    Créer l'utilisateur
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('createUserForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const spinner = submitBtn.querySelector('.spinner-border');
    const alert = document.getElementById('formAlert');
    
    // Reset state
    alert.classList.add('d-none');
    alert.classList.remove('alert-success', 'alert-danger');
    submitBtn.disabled = true;
    spinner.classList.remove('d-none');
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());
    data.is_active = document.getElementById('is_active').checked;

    fetch("{{ route('admin.users.api.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
    })
    .then(async response => {
        const res = await response.json();
        if (response.ok) {
            alert.innerText = "Utilisateur créé avec succès ! Redirection...";
            alert.classList.remove('d-none');
            alert.classList.add('alert-success');
            setTimeout(() => {
                window.location.href = "{{ route('admin.users.index') }}";
            }, 1500);
        } else {
            throw res;
        }
    })
    .catch(err => {
        console.error(err);
        let msg = "Erreur lors de la création.";
        if (err.errors) {
            msg = Object.values(err.errors).flat().join('<br>');
        } else if (err.message) {
            msg = err.message;
        }
        alert.innerHTML = msg;
        alert.classList.remove('d-none');
        alert.classList.add('alert-danger');
        submitBtn.disabled = false;
        spinner.classList.add('d-none');
    });
});
</script>
@endsection
