//LINES
Highcharts.chart('container', {

    title: {
        text: 'Number of Tweets with word "OVERTIME" by month from 2014 to 2020'
    },

    subtitle: {
        text: 'Source: Tweeter'
    },

    yAxis: {
        title: {
            text: 'Number of tweets'
        }
    },

    xAxis: {
        accessibility: {
            rangeDescription: 'Range: Jan to Dec'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: [{
        name: 'Year 2014',
        data: []
    }, {
        name: 'Year 2015',
        data: []
    }, {
        name: 'Year 2016',
        data: []
    }, {
        name: 'Year 2017',
        data: []
    }, {
        name: 'Year 2018',
        data: []
    }, {
        name: 'Year 2019',
        data: []
    }, {
        name: 'Year 2020',
        data: []
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});


//LINE-BOOST RETWEETS
var n = 500000,
    data = [],
    datafc = []

Highcharts.chart('containerBoost', {

    chart: {
        zoomType: 'x'
    },

    title: {
        text: 'RETWEETS/SHARES with Hourly PRECISION'
    },

    subtitle: {
        text: 'Using the Boost module'
    },

    tooltip: {
        valueDecimals: 2
    },

    xAxis: {
        type: 'datetime'
    },

    yAxis: {
        title: {
            text: 'Count of retweets'
        }
    },

    series: [{
        boostThreshold: 1,
        data: data,
        lineWidth: 0.5,
        name: 'Retweets with Hourly data PRECISION'
    }]

});

//LINE-BOOTS FAVORITES
Highcharts.chart('containerBoostFC', {

    chart: {
        zoomType: 'x'
    },

    title: {
        text: 'FAVORITES/LIKES with Hourly PRECISION'
    },

    subtitle: {
        text: 'Using the Boost module'
    },

    tooltip: {
        valueDecimals: 2
    },

    xAxis: {
        type: 'datetime'
    },

    yAxis: {
        title: {
            text: 'Count of favorite'
        }
    },

    series: [{
        boostThreshold: 1,
        data: datafc,
        lineWidth: 0.5,
        name: 'Favorite count with Hourly data PRECISION'
    }]

});

//DRILLDOWN
Highcharts.chart('containerColumnDrilldown', {
    chart: {
        type: 'column'
    },
    title: {
        text: '% OF SOURCES used from 2014 to 2020'
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
            text: 'Total SOURCES percent'
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
            name: "Sources",
            colorByPoint: true,
            data: []
        }
    ]
    
});

function loadDataFromApi(index,key,series,year) {
    var query ='';
    if(year>0){
        query = '&year='+year;
    }
    var chart = Highcharts.charts[index];
    chart.showLoading('Loading data from server...');
    $.getJSON('/api.json.php?action='+key+query, function (data) {
    chart.series[series].setData(data);
    chart.hideLoading();
    });
}

$(window).on('load', function() {
    loadDataFromApi(0,'hashtag',0,2014);
    loadDataFromApi(0,'hashtag',1,2015);
    loadDataFromApi(0,'hashtag',2,2016);
    loadDataFromApi(0,'hashtag',3,2017);
    loadDataFromApi(0,'hashtag',4,2018);
    loadDataFromApi(0,'hashtag',5,2019);
    loadDataFromApi(0,'hashtag',6,2020);

    loadDataFromApi(3,'sources',0,1);
    loadDataFromApi(1,'retweets',0,1);
    loadDataFromApi(2,'favorites',0,1);
});