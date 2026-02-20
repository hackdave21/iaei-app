@extends('admin.layouts.master')

@section('title', 'Modifier l\'Option d\'Équipement')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Modifier l'Option: {{ $equipementOption->designation }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.equipement-options.index') }}">Équipements</a></li>
                <li class="breadcrumb-item">Modifier</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <form action="{{ route('admin.equipement-options.update', $equipementOption) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.equipement_options.partials.form')
        </form>
    </div>
</div>
@endsection
