@extends('admin.layouts.master')

@section('title', isset($appointment) ? 'Modifier le Rendez-vous' : 'Nouveau Rendez-vous')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ isset($appointment) ? 'Modifier' : 'Nouveau' }} Rendez-vous</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.appointments.index') }}">Rendez-vous</a></li>
                <li class="breadcrumb-item">{{ isset($appointment) ? 'Modifier' : 'Nouveau' }}</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <form action="{{ isset($appointment) ? route('admin.appointments.update', $appointment) : route('admin.appointments.store') }}" method="POST">
                            @csrf
                            @if(isset($appointment))
                                @method('PUT')
                            @endif

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Lead / Client <span class="text-danger">*</span></label>
                                    <select name="lead_id" class="form-control select-search" required>
                                        <option value="">Sélectionner un lead</option>
                                        @foreach($leads as $lead)
                                            <option value="{{ $lead->id }}" {{ (old('lead_id', $appointment->lead_id ?? '') == $lead->id) ? 'selected' : '' }}>
                                                {{ $lead->first_name }} {{ $lead->last_name }} ({{ $lead->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lead_id') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Conseiller / Assigné à <span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control select-search" required>
                                        <option value="">Sélectionner un utilisateur</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ (old('user_id', $appointment->user_id ?? auth()->id()) == $user->id) ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date & Heure de début <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="start_at" class="form-control" value="{{ old('start_at', isset($appointment) ? $appointment->start_at->format('Y-m-d\TH:i') : '') }}" required>
                                    @error('start_at') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Durée (minutes) <span class="text-danger">*</span></label>
                                    <input type="number" name="duration" class="form-control" value="{{ old('duration', isset($appointment) ? $appointment->start_at->diffInMinutes($appointment->end_at) : 60) }}" required>
                                    @error('duration') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Type de RDV <span class="text-danger">*</span></label>
                                    <select name="type" class="form-control" required>
                                        <option value="call" {{ (old('type', $appointment->type ?? '') == 'call') ? 'selected' : '' }}>Appel téléphonique</option>
                                        <option value="visit" {{ (old('type', $appointment->type ?? '') == 'visit') ? 'selected' : '' }}>Visite physique</option>
                                        <option value="online" {{ (old('type', $appointment->type ?? '') == 'online') ? 'selected' : '' }}>Réunion en ligne</option>
                                    </select>
                                    @error('type') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Statut <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="scheduled" {{ (old('status', $appointment->status ?? '') == 'scheduled') ? 'selected' : '' }}>Planifié</option>
                                        <option value="completed" {{ (old('status', $appointment->status ?? '') == 'completed') ? 'selected' : '' }}>Terminé</option>
                                        <option value="cancelled" {{ (old('status', $appointment->status ?? '') == 'cancelled') ? 'selected' : '' }}>Annulé</option>
                                        <option value="no_show" {{ (old('status', $appointment->status ?? '') == 'no_show') ? 'selected' : '' }}>Absent</option>
                                    </select>
                                    @error('status') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Notes / Commentaires</label>
                                    <textarea name="notes" class="form-control" rows="4">{{ old('notes', $appointment->notes ?? '') }}</textarea>
                                    @error('notes') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather-save me-2"></i> {{ isset($appointment) ? 'Mettre à jour' : 'Enregistrer' }}
                                </button>
                                <a href="{{ route('admin.appointments.index') }}" class="btn btn-light ms-2">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <h5>Aide</h5>
                        <p class="text-muted fs-13">Assurez-vous de vérifier la disponibilité du conseiller avant de planifier un rendez-vous.</p>
                        <hr>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2 d-flex align-items-center">
                                <i class="feather-info text-primary me-2"></i>
                                <span class="fs-13">Les rappels seront envoyés aux clients.</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="feather-alert-circle text-warning me-2"></i>
                                <span class="fs-13">Seul un RDV actif peut être complété.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
