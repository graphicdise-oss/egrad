<!DOCTYPE html>
<html>

<head>
    <title>E - Graduate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <meta name="robots" content="noindex, nofollow">


</head>

<body class="bg-gray-100 min-h-screen fc-font">


    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft3')
        @include('layouts.menutop')



               

<div class="p-8">
    <div class="bg-white p-6 shadow-md w-3/4 border">
        <h2 class="text-lg font-semibold mb-4">@lang('form.payment1_1')</h2>
        <hr class="mb-4">

        @if($payments->isEmpty())
            <p class="text-center text-gray-500">@lang('form.paymentno')</p>
        @else
            <div class="space-y-4">
                @foreach($payments as $index => $payment)
                    <div class="row mb-3">
                        <div class="col-md-2"></div>

                        <div class="col-md-3">
                            <label class="form-label">@lang('form.payment1_2'){{ $index + 1 }}</label>
                            <input type="text" class="form-control" 
                                   value="{{ $payment->term ?? '-' }}" readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">AccNo</label>
                            <input type="text" class="form-control" 
                                   value="{{ $payment->accno ?? '-' }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('form.status')</label>
                            <input type="text" class="form-control 
                                {{ ($payment->Expr1 ?? '') == 'ชำระแล้ว' ? 'text-green-600' : 'text-red-600' }}" 
                                value="{{ $payment->Expr1 ?? '-' }}" readonly>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>





</body>

</html>
<script>
    function toggleSubMenu(id) {
        const submenu = document.getElementById(id);
        const arrow = document.getElementById('arrow-' + id);

        if (submenu) submenu.classList.toggle('hidden');
        if (arrow) arrow.classList.toggle('rotate-180');
    }
</script>