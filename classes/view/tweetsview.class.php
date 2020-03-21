<?php

class TweetsView extends TweetsModel{

    public function showTweet($id){

        $result = $this->getTweet($id);
        
        return $result[0]['id']." - ".$result[0]['text'];

    }

    public function showYearlyStatsTweetsByHashTag($hashtag, $year){

        $response = $this->getYearlyStatsTweetsByHashTag($hashtag, $year);
        foreach( $response AS $row ){
            $result = json_encode(array($row['Jan'],$row['Feb'],$row['Mar'],$row['Apr'],$row['May'],$row['Jun'],$row['Jul'],$row['Aug'],$row['Sep'],$row['Oct'],$row['Nov'],$row['December']));
        }
        
        return $result;

    }

    public function showTweetsByHoursAndKey($key_name){

        $result = array();
        $filter = array();
        $response = $this->getTweetsByHoursAndKey($key_name);
        foreach( $response AS $row ){
            date_default_timezone_set("UTC");
            $date = $row['created_at'];
            $date_data = date_parse_from_format("D M d H:i:s u Y", $date);
            $milliseconds_date = mktime($date_data['hour'],$date_data['minute'],$date_data['second'],$date_data['month'],$date_data['day'],$date_data['year']);
            $filter[$milliseconds_date] = $row[$key_name];
        }
        ksort($filter);
        foreach($filter AS $key => $value){
            array_push($result, array((int)1000*$key, $value) );
        }

        return json_encode( $result );

    }
                    
    public function showTweetsSources(){ 

        $result = array();
        $total = $this->getTotalSources();
        $response = $this->getTweetsSources();
        foreach( $response AS $row ){
            $total_p_by_source = (($row['stotal'] / $total) * 100 );
            array_push( $result, array( 'name'=>$row['source'], 'y'=>$total_p_by_source, 'drilldown'=>null) );
        }

        return json_encode( $result );
        
    }

}

?>