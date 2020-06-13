<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script type="text/javascript">
    var longerChartContext = document.getElementById('longerChart').getContext('2d');

    var labels24=   {!! $parameters->values24DateLabels !!};
    var values24=   {!! $parameters->values24 !!};

    var chart24 = new Chart(longerChartContext, {
        type: 'line',
        data: {
            labels: labels24,
            datasets: [{
                label: ' {{ $vitalSign->name }} (Kg)',
                backgroundColor: 'rgba(255, 255, 255,0.1)',
                borderColor: 'rgb(40, 180, 99)',
                data: values24
            }]
        },

        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>