<?php
    include 'includes/connect.php';

    if(isset($_POST)) {
        $postString = file_get_contents("php://input");
        $postArray = json_decode($postString, true);

        try {
            $query = "insert into buyer_order_details values(?,?,?);";
            $data = $connect->prepare($query);
            $data->bind_param("sss",$postArray['posting_ref_no'],$postArray['orderList'],$postArray['total_order']);
            $data->execute();
        } catch (Exception $e) {
            $query = "UPDATE buyer_order_details SET orderList=?,total_order=? where posting_ref_no=?;";
            $data = $connect->prepare($query);
            $data->bind_param("sss",$postArray['orderList'],$postArray['total_order'],$postArray['posting_ref_no']);
            $data->execute();
        }
        $data->close();
        echo "{\"saved\":\"". true ."\"}";
    }
?>