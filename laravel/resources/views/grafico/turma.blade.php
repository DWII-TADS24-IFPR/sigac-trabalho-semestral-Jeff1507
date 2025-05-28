<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Gráfico de Horas da Turma {{ $turma->ano }}</h2>
    </x-slot>

    <div class="p-4">
        <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>
    <script>
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Aluno', 'Horas Cumpridas'],
                @foreach ($dados as [$nome, $horas])
                    ['{{ $nome }}', {{ $horas }}],
                @endforeach
            ]);

            const options = {
                title: 'Total de Horas Cumpridas por Aluno',
                chartArea: {width: '70%'},
                hAxis: {
                    title: 'Total de Horas',
                    minValue: 0
                },
                vAxis: {
                    title: 'Alunos'
                },
                colors: ['#0E7490']
            };

            const chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</x-app-layout>
