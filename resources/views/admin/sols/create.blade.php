@extends('admin.layouts.master')

@section('title', 'Créer un Type de Sol')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Créer un Type de Sol</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sols.index') }}">Sols</a></li>
                <li class="breadcrumb-item">Créer</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <form action="{{ route('admin.sols.store') }}" method="POST">
            @csrf
            @include('admin.sols.partials.form')
        </form>
    </div>
</div>
@endsection
