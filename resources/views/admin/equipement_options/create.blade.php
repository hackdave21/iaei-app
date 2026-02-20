@extends('admin.layouts.master')

@section('title', 'Créer une Option d\'Équipement')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Créer une Option d'Équipement</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.equipement-options.index') }}">Équipements</a></li>
                <li class="breadcrumb-item">Créer</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <form action="{{ route('admin.equipement-options.store') }}" method="POST">
            @csrf
            @include('admin.equipement_options.partials.form')
        </form>
    </div>
</div>
@endsection
