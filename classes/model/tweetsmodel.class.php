<?php

class TweetsModel extends Dbh{

    private $db = "";

    public function __construct() {

        $this->db = $this->connect();

    }

    protected function getTweet($id){

        $sql = "SELECT * FROM tweets WHERE id=$id";
        $data = $this->db->query($sql);
        $result = $data->fetchAll();

        return $result;

    }

    protected function setTweets ($data = array()){

        $sql = "INSERT INTO tweets(source, id_str, text, created_at, retweet_count, in_reply_to_user_id_str, favorite_count, is_retweet) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $bool_string = ( $data["is_retweet"] )? "TRUE":"FALSE";
        $stmt->execute(array(
            $data["source"],
            $data["id_str"],
            $data["text"],
            $data["created_at"],
            $data["retweet_count"],
            $data["in_reply_to_user_id_str"],
            $data["favorite_count"],
            $bool_string));

    }

    protected function getYearlyStatsTweetsByHashTag($hashtag ='', $year = 1000){

        global $months;
        $build_qb = "";
        $counter = 0;
        $total_m = count($months);
        foreach($months as $current_month){
            $counter++;
            if($total_m !=  $counter){
                $build_qb .=" CAST( SUM(IF(t.text LIKE '%$hashtag%' AND t.created_at LIKE '%$current_month%' ,1,0)) AS SIGNED) AS $current_month";
                $build_qb .=", ";
            }else{
                $build_qb .=" CAST( SUM(IF(t.text LIKE '%$hashtag%' AND t.created_at LIKE '%$current_month%' ,1,0)) AS SIGNED) AS $current_month"."ember";
            }
        }
        $sql ="SELECT $build_qb FROM tweets as t WHERE t.created_at LIKE '%$year%' ORDER BY id ASC";
        $data = $this->db->query($sql);
        $result = $data->fetchAll();

        return $result;

    }

    protected function getTweetsByHoursAndKey($key_name){

        $sql ="SELECT t.id, t.created_at, t.$key_name FROM tweets as t ORDER BY t.id ASC";
        $data = $this->db->query($sql);
        $result = $data->fetchAll();
        
        return $result;

    }

    protected function getTotalSources(){

        $sql = "SELECT SUM(IF(source!='',1,0)) AS total FROM `tweets`";
        $data = $this->db->query($sql);
        $result = $data->fetchAll();

        return $result[0]['total'];
    }

    protected function getTweetsSources(){

        $sql ="SELECT source , SUM(IF(source!='',1,0)) AS stotal FROM `tweets` GROUP BY source";
        $data = $this->db->query($sql);
        $result = $data->fetchAll();

        return $result;

    }

}

?>