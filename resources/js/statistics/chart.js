import Highcharts from 'highcharts';

export const generateChart = (requestObject) => {
    console.log(requestObject)
    Highcharts.chart('chartContainer', {
        chart: {
            type: 'column'
        },
        title: {
            text: requestObject.title
        },
        subtitle: {
            text: requestObject.subtitle
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: requestObject.yAxisTitleText
            }
        },
        legend: {
            enabled: true
        },
        tooltip: {
            pointFormat: requestObject.tooltip
        },
        series: [{
            name: requestObject.seriesName,
            data: requestObject.data,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.2f}',
                y: 10
            }
        }]
    });
}