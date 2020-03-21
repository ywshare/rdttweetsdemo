<?php

include_once 'config.php';

if ( isset($_REQUEST["action"]) && !empty($_REQUEST["action"]) && is_numeric($_REQUEST["year"]) ) 
{
    $tweets_view = new TweetsView();

    switch ($_REQUEST["action"]) 
    {
        case "hashtag":      
            $apiResponse = $tweets_view->showYearlyStatsTweetsByHashTag('overtime', $_REQUEST["year"]);
        break;

        case "retweets":      
            $apiResponse = $tweets_view->showTweetsByHoursAndKey('retweet_count');
        break;

        case "favorites":      
            $apiResponse = $tweets_view->showTweetsByHoursAndKey('favorite_count');
        break;

        case "sources":      
            $apiResponse = $tweets_view->showTweetsSources();
        break;

        default:
            $apiResponse =  json_encode(array());

    }

    echo $apiResponse;

}

?>