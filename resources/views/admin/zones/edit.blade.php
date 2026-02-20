@extends('admin.layouts.master')

@section('title', 'Modifier la Zone')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Modifier la Zone: {{ $zone->nom }}</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.zones.index') }}">Zones</a></li>
                <li class="breadcrumb-item">Modifier</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <form action="{{ route('admin.zones.update', $zone) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.zones.partials.form')
        </form>
    </div>
</div>
@endsection
