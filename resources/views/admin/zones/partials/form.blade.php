<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Code (Unique) <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $zone->code ?? '') }}" required>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $zone->nom ?? '') }}" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Coefficient <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="coefficient" class="form-control @error('coefficient') is-invalid @enderror" value="{{ old('coefficient', $zone->coefficient ?? '1.00') }}" required>
                        @error('coefficient')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Profondeur Forage (m)</label>
                        <input type="number" name="profondeur_forage" class="form-control @error('profondeur_forage') is-invalid @enderror" value="{{ old('profondeur_forage', $zone->profondeur_forage ?? '') }}">
                        @error('profondeur_forage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Prix Foncier (m²)</label>
                        <input type="number" name="prix_foncier_m2" class="form-control @error('prix_foncier_m2') is-invalid @enderror" value="{{ old('prix_foncier_m2', $zone->prix_foncier_m2 ?? '') }}">
                        @error('prix_foncier_m2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-0">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $zone->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.zones.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                <button type="submit" class="btn btn-primary">{{ isset($zone) ? 'Modifier' : 'Créer' }}</button>
            </div>
        </div>
    </div>
</div>
