<?php

class TweetsController extends TweetsModel{

    public function importTweetsToDbByYear($year){

        if($year>=2014 && $year<=2020){
            $json = file_get_contents('http://trumptwitterarchive.com/data/realdonaldtrump/'.$year.'.json');
            $tweets_data = json_decode($json);
            foreach($tweets_data AS $tweet){
                $this->setTweets( (array)$tweet );
            }
        }
        
    }

}

?>