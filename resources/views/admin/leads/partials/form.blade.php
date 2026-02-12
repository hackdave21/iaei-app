<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Prénom <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $lead->first_name ?? '') }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $lead->last_name ?? '') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $lead->email ?? '') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $lead->phone ?? '') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Société</label>
                        <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $lead->company_name ?? '') }}">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Statut <span class="text-danger">*</span></label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            @php
                                $statuses = [
                                    'new' => 'Nouveau',
                                    'working' => 'En cours',
                                    'qualified' => 'Qualifié',
                                    'declined' => 'Refusé',
                                    'customer' => 'Client',
                                    'contacted' => 'Contacté',
                                ];
                            @endphp
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ old('status', $lead->status ?? 'new') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Source</label>
                        <select name="source" class="form-control @error('source') is-invalid @enderror">
                            <option value="">Sélectionner une source</option>
                            <option value="Facebook" {{ old('source', $lead->source ?? '') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                            <option value="Google" {{ old('source', $lead->source ?? '') == 'Google' ? 'selected' : '' }}>Google</option>
                            <option value="LinkedIn" {{ old('source', $lead->source ?? '') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                            <option value="Site Web" {{ old('source', $lead->source ?? '') == 'Site Web' ? 'selected' : '' }}>Site Web</option>
                            <option value="Autre" {{ old('source', $lead->source ?? '') == 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('source')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Assigné à</label>
                        <select name="assigned_to_user_id" class="form-control @error('assigned_to_user_id') is-invalid @enderror">
                            <option value="">Non assigné</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assigned_to_user_id', $lead->assigned_to_user_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_to_user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-0">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="5">{{ old('notes', $lead->notes ?? '') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.leads.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                <button type="submit" class="btn btn-primary">{{ isset($lead) ? 'Modifier' : 'Créer' }}</button>
            </div>
        </div>
    </div>
</div>
