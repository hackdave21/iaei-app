<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Code (Unique) <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $equipementOption->code ?? '') }}" required>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Catégorie <span class="text-danger">*</span></label>
                        <input type="text" name="categorie" class="form-control @error('categorie') is-invalid @enderror" value="{{ old('categorie', $equipementOption->categorie ?? '') }}" required placeholder="Ex: Domotique, Paysager">
                        @error('categorie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Désignation <span class="text-danger">*</span></label>
                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation', $equipementOption->designation ?? '') }}" required>
                        @error('designation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Prix Min <span class="text-danger">*</span></label>
                        <input type="number" name="prix_min" class="form-control @error('prix_min') is-invalid @enderror" value="{{ old('prix_min', $equipementOption->prix_min ?? '') }}" required>
                        @error('prix_min')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Prix Max <span class="text-danger">*</span></label>
                        <input type="number" name="prix_max" class="form-control @error('prix_max') is-invalid @enderror" value="{{ old('prix_max', $equipementOption->prix_max ?? '') }}" required>
                        @error('prix_max')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Unité <span class="text-danger">*</span></label>
                        <input type="text" name="unite" class="form-control @error('unite') is-invalid @enderror" value="{{ old('unite', $equipementOption->unite ?? 'Forfait') }}" required placeholder="Ex: m², Unité, Forfait">
                        @error('unite')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Puissance / Taille</label>
                        <input type="text" name="puissance" class="form-control @error('puissance') is-invalid @enderror" value="{{ old('puissance', $equipementOption->puissance ?? '') }}">
                        @error('puissance')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="form-label">Ordre d'affichage</label>
                        <input type="number" name="ordre_affichage" class="form-control @error('ordre_affichage') is-invalid @enderror" value="{{ old('ordre_affichage', $equipementOption->ordre_affichage ?? '0') }}">
                        @error('ordre_affichage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4 d-flex align-items-center mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="actif" value="0">
                            <input type="checkbox" name="actif" value="1" class="custom-control-input" id="optionActifCheck" {{ old('actif', $equipementOption->actif ?? true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="optionActifCheck">Actif</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-0">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $equipementOption->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.equipement-options.index') }}" class="btn btn-light-brand me-2">Annuler</a>
                <button type="submit" class="btn btn-primary">{{ isset($equipementOption) ? 'Modifier' : 'Créer' }}</button>
            </div>
        </div>
    </div>
</div>
