<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Dashboard นักศึกษา</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            src: url('{{ asset('fonts/THSarabunNew.ttf') }}') format('truetype');
            font-weight: 400;
        }

        @font-face {
            font-family: 'THSarabunNew';
            src: url('{{ asset('fonts/THSarabunNew-Bold.ttf') }}') format('truetype');
            font-weight: 700;
        }

        body,
        html {
            font-family: 'THSarabunNew', sans-serif;
            font-size: 18px;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen fc-font">

    <div class="flex min-h-screen">
        @include('layouts.menuleft')
        @include('layouts.menutop')

        <div class="flex-1 p-6 space-y-6">

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/3 bg-white shadow-md p-6 rounded-lg h-fit">
                    <h2 class="text-xl font-bold text-pink-600 border-b pb-2">@lang('form.home1')</h2>

                    <form method="GET" action="{{ route('dashboard.index') }}" class="space-y-4 mt-4">

                        <div>
                            <label class="font-semibold text-gray-700">
                                @lang('form.ระดับปริญญา')
                            </label>

                            <select name="namelevel"
                                class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:ring-pink-400 focus:border-pink-400">

                                <option value="">@lang('form.all')</option>

                                @foreach($levels as $lvl)
                                    <option value="{{ $lvl }}" {{ $selectedLevel == $lvl ? 'selected' : '' }}>
                                        @lang('form.' . $lvl)
                                    </option>
                                @endforeach
                            </select>
                        </div>




                        <div>
                            <label class="font-semibold text-gray-700">@lang('form.home5') </label>
                            <select name="year"
                                class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:ring-pink-400 focus:border-pink-400">
                                <option value="">@lang('form.all')</option>
                                @foreach($allYears as $yr)
                                    <option value="{{ $yr }}" {{ $selectedYear == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full bg-pink-600 text-white rounded-lg py-2 hover:bg-pink-700 transition">
                            @lang('form.show')
                        </button>
                    </form>
                </div>

                <div class="flex-1 bg-white shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
                    <h2 class="text-2xl font-bold text-center text-pink-600 mb-4">@lang('form.home4')</h2>
                    <div class="w-full max-w-[700px] h-[380px]">
                        <canvas id="yearChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6 mt-6">

                <h2 class="text-2xl font-bold text-center text-pink-600 mb-4">
                    @lang('form.home6') @if($selectedYear) (ปี {{ $selectedYear }}) @endif
                </h2>
                <div class="w-full max-w-[1000px] h-[450px] mx-auto">
                    <canvas id="majorChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('yearChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{ label: 'นักศึกษา (คน)', data: @json($chartData['data']), backgroundColor: '#ff77d0', borderRadius: 10, maxBarThickness: 50 }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                scales: { y: { beginAtZero: true, grace: '10%' }, x: { title: { display: true, text: '@lang('form.home5')' } } },
                plugins: { legend: { display: false }, datalabels: { color: '#000', anchor: 'end', align: 'top', font: { weight: 'bold', size: 14 }, formatter: (v) => v + ' @lang('form.คน')' } }
            },
            plugins: [ChartDataLabels]
        });

        const majorCtx = document.getElementById('majorChart');
        new Chart(majorCtx, {
            type: 'bar',
            data: {
                labels: @json($chartMajor['labels']->map(fn($key) => __('major.' . $key))),
                datasets: [{ label: '{{ __("form.students") }}', data: @json($chartMajor['data']), backgroundColor: '#b35cff', borderRadius: 8, maxBarThickness: 40 }]
            },
            options: {
                responsive: true, maintainAspectRatio: false, indexAxis: 'y',
                layout: { padding: { top: 10, right: 20, left: 10, bottom: 10 } },
                scales: { x: { beginAtZero: true, grace: '10%', title: { display: true, text: '{{ __("form.students") }}' }, ticks: { font: { size: 13 } } }, y: { ticks: { font: { size: 13, weight: 'bold' }, autoSkip: false } } },
                plugins: { legend: { display: false }, datalabels: { color: '#000', anchor: 'end', align: 'right', font: { weight: 'bold', size: 12 }, formatter: (v) => v + ' @lang('form.คน')' }, tooltip: { callbacks: { title: (tooltipItems) => { const labels = @json($chartMajor['labels']->map(fn($key) => __('major.' . $key))); return labels[tooltipItems[0].dataIndex]; } } } }
            },
            plugins: [ChartDataLabels]
        });
    </script>
</body>

</html>