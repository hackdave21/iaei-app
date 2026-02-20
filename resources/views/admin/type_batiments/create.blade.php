@extends('admin.layouts.master')

@section('title', 'Créer un Type de Bâtiment')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Créer un Type de Bâtiment</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.type-batiments.index') }}">Bâtiments</a></li>
                <li class="breadcrumb-item">Créer</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <form action="{{ route('admin.type-batiments.store') }}" method="POST">
            @csrf
            @include('admin.type_batiments.partials.form')
        </form>
    </div>
</div>
@endsection
