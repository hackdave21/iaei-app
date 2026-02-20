<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Code (Unique) <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $sol->code ?? '') }}" required>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $sol->nom ?? '') }}" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Coefficient <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="coefficient" class="form-control @error('coefficient') is-invalid @enderror" value="{{ old('coefficient', $sol->coefficient ?? '1.00') }}" required>
                        @error('coefficient')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Prix Fondation (m²)</label>
                        <input type="number" name="prix_fondation_m2" class="form-control @error('prix_fondation_m2') is-invalid @enderror" value="{{ old('prix_fondation_m2', $sol->prix_fondation_m2 ?? '') }}">
                        @error('prix_fondation_m2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Message d'Alerte (Géotechnique)</label>
                        <input type="text" name="alerte" class="form-control @error('alerte') is-invalid @enderror" value="{{ old('alerte', $sol->alerte ?? '') }}" placeholder="Ex: Étude de sol obligatoire">
                        @error('alerte')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-0">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $sol->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.sols.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                <button type="submit" class="btn btn-primary">{{ isset($sol) ? 'Modifier' : 'Créer' }}</button>
            </div>
        </div>
    </div>
</div>
