<?php

include "db.php"; 
$error="";

if(isset($_POST['barcode'])){
    
    $current_time=time();
    $DateTime=strftime("%d-%m-%y  %H:%M:%S",$current_time);
    $DateTime;


$barcode=$_POST['barcode'];
$date = new DateTime( null, new DateTimeZone('Asia/Kolkata') );
$dateformatted = $date->format('Y-m-d H:i:s');
mysqli_query($connection,"INSERT INTO item ( `barcode`, `datereg` )
VALUES ( '$barcode', '$dateformatted')");
}
$barcodes= mysqli_query($connection,"SELECT * FROM item");
?>

<!DOCTYPE html>
<html>
<style type="text/css">
    
    .pos-style{
        background-image: url(img/epos.jpg);
        height: 400px;
    }
    </style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode reader Testing - Spiders</title>
</head>  

    <body onload="document.pos.barcode.focus();">
    
       
        <div class="container">
        
            <form name="pos" action="" method="post">
            
            
            <div class="form-group">
                
                <input type="text" name="barcode" class="form-control" placeholder="bar code reader">
                </div>
            
            </form>

            <table class="styled-table">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Barcode</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                while($barcode = $barcodes->fetch_assoc()):
                    ?>
                <tr>
                    <th>
                        <?php echo $barcode['id'];?>
                    </th>
                    <th>
                        <?php echo $barcode['barcode'];?>
                    </th>
                    <th>
                        <?php echo $barcode['datereg'];?>
                    </th>
                </tr>
                <?php endwhile;?>
            </tbody>
            </table>
            
         
            
            
        </div>
        
    
    <style>
        .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    width: 100%;
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
}.styled-table th,
.styled-table td {
    padding: 12px 15px;
}.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
        </style>
    </body>

</html>