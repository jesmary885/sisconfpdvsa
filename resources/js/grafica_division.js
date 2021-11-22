  // Create the chart
  Highcharts.chart('container', {
    chart: {
    type: 'column'
    },
    title: {
    text: 'Porcentaje del cumplimiento real por División'
    },
    subtitle: {
    text: ''
    },
    accessibility: {
    announceNewData: {
        enabled: true
    }
    },
    xAxis: {
    type: 'category'
    },
    yAxis: {
    title: {
        text: 'Porcentaje total'
    }
    },
    legend: {
    enabled: false
    },
    plotOptions: {
    series: {
        borderWidth: 0,
        dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
        }
    }
    },
    tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },
    series: [
    {
        name: "Negocio",
        colorByPoint: true,
        data: <?= $data ?> 
    }
    ],
});