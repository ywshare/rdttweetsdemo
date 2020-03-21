<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Charts</title>
    <link rel="stylesheet" type="text/css" href="/assets/app/css/index.css">
</head>
<body>
<h1>Tweets - Charts</h1>

<br><br>
<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Basic line chart showing tweets by word.
    </p>
</figure>

<br><br>
<figure class="highcharts-figure">
    <div id="containerColumnDrilldown"></div>
    <p class="highcharts-description">
        Chart showing the porcentage of sources used from 2014 to 2020.
    </p>
</figure>

<br><br>
<figure class="highcharts-figure">
    <div id="containerBoost"></div>
    <p class="highcharts-description">
        Basic line-boost chart showing retweets count by hour.
    </p>
</figure>

<br><br>
<figure class="highcharts-figure">
    <div id="containerBoostFC"></div>
    <p class="highcharts-description">
        Basic line-boost chart showing favorite count by hour.
    </p>
</figure>



<script src="/assets/global/plugins/jquery/jquery-3.1.1.min.js"></script>
<script src="/assets/global/plugins/highcharts/code/highcharts.js"></script>
<script src="/assets/global/plugins/highcharts/code/modules/series-label.js"></script>
<script src="/assets/global/plugins/highcharts/code/modules/boost.js"></script>
<script src="/assets/global/plugins/highcharts/code/modules/data.js"></script>
<script src="/assets/global/plugins/highcharts/code/modules/drilldown.js"></script>
<script src="/assets/global/plugins/highcharts/code/modules/exporting.js"></script>
<script src="/assets/global/plugins/highcharts/code/modules/export-data.js"></script>
<script src="/assets/global/plugins/highcharts/code/modules/accessibility.js"></script>
<script src="/assets/app/js/chart.js"></script>

</body>
</html>