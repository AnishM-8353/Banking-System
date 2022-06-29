<?php 
require "connect.php"; 

$sql = "SELECT * FROM customers;";
$result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="table.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />


    
<link href="table.css" rel="stylesheet" />
<title>View Customers</title>
</head>

<script>
 $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>

<style>

.form-popup {
  <?php 
  if(!(isset($_GET['transfer']))) {  ?>
  display: none;
  <?php } ?>

  position: fixed;
  top: 10%;  
  bottom: 25%;
  right: 35%;
  left: 28%;
  z-index: 9;
}

.form-container {
  max-width: 400px;
  padding: 12px;
  border: 3px solid #7693aa;
  background-color: #92c4ed;
}
.selector{
  width: 90%;
  padding: 3px;
  margin: 5px 0 22px 0;
  border-radius: 6px;
  font-weight: 200;

}

.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    appearance: none;
    margin: 0; 
}

input[type=number] {
  -moz-appearance: textfield;
}






</style>
<body>




<nav class="navbar navbar-dark" style="background-color: #1e6cad;">
        <div class="container-fluid" style="background-color: #1e6cad;">
          <a class="navbar-brand" href="index.php" style="font: 100%/20px 'Freestyle script'; font-size: 2.5rem; ">
            <img src="bank.png" alt="TSF" width="38" height="38" class="d-inline-block align-text-top">
            TSF Bank
          </a>
          <a class="navbar-brand" href="Transaction History.php">Transaction History</a>
        </div>
      </nav>

<div class="header">Customers</div> 
  <div class="tbl-header">
  <table> 
        <thead> 
            <tr> 
                <th>Name</th> 
                <th>Email</th> 
                <th>Current Balance</th> 
                <th>Transfer To</th> 
            </tr> 
        </thead>
</table>
</div>
<div class="tbl-content"> 
  <table>
        <tbody>
            <?php
               while($records = mysqli_fetch_assoc($result))
                {
            ?>            
        
            <tr> 
                <td scope=row><?php echo $records['Name']; ?></td> 
                <td><?php echo $records['Email']; ?></td> 
                <td><?php echo $records['CurrentBalance'];?></td> 
                <td> 
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                     <button class="button" type="submit" value="<?php  echo $records['Email'];?>"  onclick="openForm()" name="transfer" style=" display: inline-block; background: red; color: #fff;  padding: 8px 20px; margin: 8px 0; border-radius: 10px;" >Transfer</button>
                  </form>
                </td> 
                
            </tr> 
            
           <?php } ?> 
           

        </tbody> 
    </table>
  </div> 
 
    
 <div class="form-popup" id="myForm">
  <form action="Transaction History.php" id="trnform" class="form-container animate__animated animate__slideInUp" method="POST" style="color: #000000;">
    <h1>Transfer Money</h1>

    <label for="email"><b>Sender</b></label> 
    <select name="Selectedsender" class="selector" id="sender">
<?php 
  $sql = "SELECT * FROM customers;";
  $result = mysqli_query($conn,$sql);
  while($res = mysqli_fetch_assoc($result))
  {
    if(isset($_GET['transfer']))
    {
    ?>
     
        <option value="<?php echo $_GET['transfer']; ?>" > <?php $semail = $_GET['transfer'];
                                                                  $sqls = "SELECT customers.Name FROM `customers` WHERE Email = '".$_GET['transfer']."';";
                                                                  /*"SELECT customers.Name FROM `customers` WHERE Email = '".$semail."';";*/
                                                                  $sendname = mysqli_query($conn,$sqls);
                                                                  while($sname = mysqli_fetch_assoc($sendname))
                                                                  {
                                                                    echo $sname['Name']."(".$_GET['transfer'].")";
                                                                  }  ?></option>
     <?php 
     break;
    }
     else
     {
      ?>
      <option value="<?php echo $res['Email']; ?>"> <?php echo $res['Name']."(".$res['Email'].")"; ?></option>
     
    <?php 
     } 
    }
    ?>  
    </select>    

    <label for="psw"><b>Transfer To</b></label>
    <div class="selectrecv">
    <select name="Selectedreceiver" class="selector" id="receiver">
      <option disabled selected hidden>Enter Receiver's Name</option>
    <?php
     $sql = "SELECT * FROM customers;";
     $result = mysqli_query($conn,$sql);
    while($res = mysqli_fetch_assoc($result))
    {

      if(isset($_GET['transfer']))
      {
        if($_GET['transfer'] == $res['Email'])
        {
          continue;
        }
        else
        {
    ?> 
    <option value="<?php echo $res['Email']; ?>"> <?php echo $res['Name']."(".$res['Email'].")"; ?></option>
        
    <?php 
        }
   
    }
  }
  ?>  
  
    </select>
    </div>
    <div>
    <label for="amt"><b>Amount</b></label>
    <input type="number" placeholder="Enter Amount to be transferred" id="trnamt" name="Trnrdamt" class="selector" min=0 style="font-size: 18px; background-color: ghostwhite;" required><br>
    <input type="checkbox" id="allowtransfer">
    <label for="allowtransfer"><b>Please Confirm this option to transfer</b></label>
    <br>
    <button type="submit" id="allowtrn" class="btn" disabled>Proceed to Transfer</button>
    <button type="button" class="btn" onclick="closeForm()">Cancel</button>
    </div>
  </form>
</div>


<div class="footer" id="foot">
    <p> Copyright@2022 | All rights reserved </p>
</div>  


 
</body>


<script>

var closeForm = function () {
    document.getElementById("myForm").style.display = "none";
    location.href = "ViewCustomers.php";
  } 

 function openForm () {
    document.getElementById("myForm").style.display = "block";
  }



  var checkTransfer = (e) => {
    if(document.querySelector('#trnamt').value > <?php if(isset($_GET['transfer'])) { ?> <?php $sqls = "SELECT CurrentBalance FROM `customers` WHERE Email = '".$_GET['transfer']."';";
                                                                   $sendbal = mysqli_query($conn,$sqls);
                                                                   while($sbal = mysqli_fetch_assoc($sendbal))
                                                                   {
                                                                     echo $sbal['CurrentBalance'];
                                                                   } } ?>){

        e.preventDefault();
        
        
        alert("You do not have sufficient balance");
        location.href = "ViewCustomers.php"
        
    }
};


document.querySelector('#allowtrn').addEventListener('click', checkTransfer);

var check = document.getElementById("allowtransfer");
var clickable = document.getElementById("allowtrn") ;

check.onchange = function()
{
  if(this.checked)
  {
    clickable.disabled = false;
  }
  else
  {
    clickable.disabled = true;
  }
}



</script>
</html>