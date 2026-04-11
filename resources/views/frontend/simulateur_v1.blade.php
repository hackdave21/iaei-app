@extends('layouts.frontend')

@section('title', 'Simulateur AIAE v8.1 - Estimation Construction')

@section('styles')
<style>
    :root{--bleu:#0E1540;--vert:#05482C;--orange:#CC6A00}
    main{font-family:'Inter',system-ui,sans-serif;}
    .mono{font-family:'JetBrains Mono',monospace}
    @media print{.no-print{display:none!important}body{background:white}}
    .card{background:white;border:1px solid #e2e8f0;border-radius:12px}
    .btn-primary{background:var(--orange);color:white;padding:12px 24px;border-radius:8px;font-weight:600;cursor:pointer;border:none}
    .btn-primary:hover{filter:brightness(1.1)}
    .btn-primary:disabled{background:#e5e7eb;color:#9ca3af;cursor:not-allowed}
    .input-num{display:flex;align-items:center;background:white;border:1px solid #e2e8f0;border-radius:8px;overflow:hidden}
    .input-num button{width:40px;height:40px;border:none;background:#f8fafc;cursor:pointer;font-size:18px}
    .input-num button:hover{background:#e2e8f0}
    .input-num .value{flex:1;text-align:center;font-weight:600;font-family:'JetBrains Mono',monospace;min-width:60px}
    .option-btn{padding:16px;border:2px solid #e2e8f0;border-radius:10px;text-align:left;cursor:pointer;transition:all 0.2s;background:white}
    .option-btn:hover{border-color:#cbd5e1;box-shadow:0 4px 6px -1px rgba(0,0,0,0.1)}
    .option-btn.selected{border-color:#3b82f6;background:#eff6ff}
    .warn-box{background:#fef3c7;border-left:4px solid #f59e0b;padding:12px 16px;border-radius:0 8px 8px 0}
    .alert-box{background:#fee2e2;border-left:4px solid #ef4444;padding:12px 16px;border-radius:0 8px 8px 0}
    .info-box{background:#eff6ff;border-left:4px solid #3b82f6;padding:12px 16px;border-radius:0 8px 8px 0}
    .success-box{background:#ecfdf5;border-left:4px solid #10b981;padding:12px 16px;border-radius:0 8px 8px 0}
    .badge{display:inline-flex;align-items:center;padding:4px 10px;border-radius:6px;font-size:12px;font-weight:600}
    .badge-blue{background:#dbeafe;color:#1e40af}
    .badge-green{background:#dcfce7;color:#166534}
    .badge-orange{background:#ffedd5;color:#c2410c}
    .badge-red{background:#fee2e2;color:#b91c1c}
    .badge-gray{background:#f3f4f6;color:#374151}
    .optimal-ring{box-shadow:0 0 0 3px rgba(34,197,94,0.4)}
</style>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
@endsection


@section('content')
<div id="root"></div>

<script>
    window.AIAE_CONFIG = {
        secteur: "{{ $secteur }}",
        saveRoute: "{{ route('simulator.save') }}",
        csrfToken: "{{ csrf_token() }}",
        DATA: @json($config)
    };
</script>
<script src="{{ asset('aiae-frontend/js/simulateur_ultimate.js') }}"></script>
@endsection
