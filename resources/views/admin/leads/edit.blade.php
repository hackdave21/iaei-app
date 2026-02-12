@extends('admin.layouts.master')

@section('title', 'Modifier le Lead - ' . $lead->first_name . ' ' . $lead->last_name)

@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Modifier le Lead</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.leads.index') }}">Leads</a></li>
                <li class="breadcrumb-item">Modifier</li>
            </ul>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <form action="{{ route('admin.leads.update', $lead) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.leads.partials.form', ['lead' => $lead])
        </form>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection
