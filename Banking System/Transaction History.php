<?php
require "connect.php";


if(isset($_POST['Trnrdamt']) && isset($_POST['Selectedreceiver']))
{
    
    $sender = $_POST['Selectedsender'];
    $recvr = $_POST['Selectedreceiver'];
    $amount = $_POST['Trnrdamt'];

    $senderbal = "UPDATE customers SET CurrentBalance = CurrentBalance - $amount WHERE Email = '".$sender."'";
    $baldec = mysqli_query($conn,$senderbal); 

    $recvrbal = "UPDATE customers SET CurrentBalance = CurrentBalance + $amount WHERE Email = '".$recvr."'";
    $balinc = mysqli_query($conn,$recvrbal);

    $add = "INSERT INTO trnhistory(sender,receiver,amount) VALUES ('$sender','$recvr','$amount');";
    $added = mysqli_query($conn,$add);
}   
?>
   


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<link href="Trntable.css" rel="stylesheet">
<title>Transaction History</title>
</head>

<style>
    main{
        display:none;       
    }
</style>

<script>
 $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>




<body onload="loader()">

<div class="loader-wrap" id="loader-view">
<span class="loader"></span>

</div>

<main id="view-body" class="animate__animated animate__slideInUp">

<nav class="navbar navbar-dark" style="background-color: #1e6cad;">
        <div class="container-fluid" style="background-color: #1e6cad;">
          <a class="navbar-brand" href="index.php" style="font: 100%/20px 'Freestyle script'; font-size: 2.5rem;">
            <img src="bank.png" alt="TSF" width="38" height="38" class="d-inline-block align-text-top">
            TSF Bank
          </a>
          <a class="navbar-brand" href="ViewCustomers.php">View Customers</a>
        </div>
      </nav>

<?php

if(isset($_POST['Trnrdamt']) && isset($_POST['Selectedreceiver']))
{
?>
   
   <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Hurrahh!!!</h4>
    <p>Transaction Successful</p>
  </div>
<?php
}
?>    




<div class="total">
<div class="tbl-header">
    <table> 
        <thead> 
            <tr> 
                <th>Sender</th> 
                <th>Receiver</th> 
                <th>Amount Transferred</th> 
            </tr> 
        </thead>
</table>
</div>
<div class="tbl-content">
    <table>
        <tbody>
            <?php
            $sql = "SELECT * FROM trnhistory;";
            $result = mysqli_query($conn,$sql);
            
            if($result)
            {
                $trnrec=mysqli_fetch_all($result);
                $lentrn = count($trnrec);
            }
        
              for($records = $lentrn-1;$records>=0;$records-=1)
                {
            ?>            
        
            <tr> 
                <td scope=row><?php echo $trnrec[$records][1]; ?></td> 
                <td><?php echo $trnrec[$records][2]; ?></td> 
                <td><?php echo $trnrec[$records][3];?></td> 
            
                </tr> 
            
           <?php } ?> 
           

        </tbody>

    </table>
</div>
</div>
<div class="footer">
    <p> Copyright@2022 | All rights reserved </p>
</div>  

</main>

<script>
var load = document.getElementById('loader-view');
var body = document.getElementById('view-body');

function loader()
{
  setTimeout(function() 
  {load.style.display = 'none';
   body.style.display = 'block'; 
  },4000)
}
</script>

</body>