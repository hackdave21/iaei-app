<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Code (Unique) <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $templateProjet->code ?? '') }}" required>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $templateProjet->nom ?? '') }}" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $templateProjet->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Secteur <span class="text-danger">*</span></label>
                        <input type="text" name="secteur" class="form-control @error('secteur') is-invalid @enderror" value="{{ old('secteur', $templateProjet->secteur ?? '') }}" required placeholder="Ex: Residentiel, Pro, Mixte">
                        @error('secteur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Type de Bâtiment <span class="text-danger">*</span></label>
                        <input type="text" name="type_batiment" class="form-control @error('type_batiment') is-invalid @enderror" value="{{ old('type_batiment', $templateProjet->type_batiment ?? '') }}" required placeholder="Ex: Villa, Immeuble">
                        @error('type_batiment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Standing <span class="text-danger">*</span></label>
                        <input type="text" name="standing" class="form-control @error('standing') is-invalid @enderror" value="{{ old('standing', $templateProjet->standing ?? '') }}" required placeholder="Ex: Economique, Standing, Premium">
                        @error('standing')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Icône</label>
                        <input type="text" name="icone" class="form-control @error('icone') is-invalid @enderror" value="{{ old('icone', $templateProjet->icone ?? '🏠') }}">
                        @error('icone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Ordre d'affichage <span class="text-danger">*</span></label>
                        <input type="number" name="ordre_affichage" class="form-control @error('ordre_affichage') is-invalid @enderror" value="{{ old('ordre_affichage', $templateProjet->ordre_affichage ?? '0') }}" required>
                        @error('ordre_affichage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4 d-flex align-items-center mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="actif" value="0">
                            <input type="checkbox" name="actif" value="1" class="custom-control-input" id="actifCheck" {{ old('actif', $templateProjet->actif ?? true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="actifCheck">Template Actif</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.templates-projets.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                <button type="submit" class="btn btn-primary">{{ isset($templateProjet) ? 'Modifier' : 'Créer' }}</button>
            </div>
        </div>
    </div>
</div>
