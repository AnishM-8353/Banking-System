<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Simple Banking System</title>
</head>
<style>
  div.defined
  {
    align-content: center;
    opacity: 0.8;

  
  }

  a#nav
  {
    font: 100%/20px 'Freestyle script';
    font-size: 2.5rem;
    
  }

  a#pglink
  {
    text-decoration: none;
    color: blue;
  }

  body
  {
    
    background-image: url('bg7.png');
    background-repeat: no-repeat;
    background-size: cover;
   
    
  }

  div.row
  {
    color: blue;
  }
  .mySlides {
    display:none;
  }

.footer
  {
    background-color: #1e6cad;
  
    padding-top: 16px;
    padding-bottom: 2px;
    color: white;
    font-size: 16px;
    text-align: center;
    margin-top: 80px;
  }

  img#col-1{
    vertical-align: middle;
    width: 22%;
    height: 30%;
}

</style>
<body>
<nav class="navbar navbar-dark" style="background-color: #1e6cad;">
        <div class="container-fluid" style="background-color: #1e6cad;">
          <a id="nav" class="navbar-brand" href="#" style="font-size: 2.5rem;">
            <img src="bank.png" alt="TSF" width="38" height="38" class="d-inline-block align-text-top">
            TSF Bank
          </a>
        </div>
      </nav>
    
    
    <div class="animate__animated animate__zoomIn">

      <img class="mySlides" src="onlinebanking.jpg" width="100%" height="360px" style="opacity: 0.99">
      <img class="mySlides" src="bankHour.png" width="100%" height="360px">  
      <img class="mySlides" src="Blog.jpg" width="100%" height="360px">
    </div> 
    
    <br><br>
    <div style="width: 50px; height: 2px; background:blue; margin: 0 auto 10px;"></div>
  <div>
    <p style="font-size: 30px; text-align: center; color: blue;"><b>Services we offer</b></p>
    


  </div>

  <div class="container">


      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
          
            <img src="viewcust1.png" id="col-1">
          <h2><a href="ViewCustomers.php" id="pglink">View Customers</a></h2>
          <p>Check basic details of customer</a></p>
        </div>

        <div class="feature col" >
          <img src="moneyt - Copy (2).png" id="col-1">
          <h2>  <a href="ViewCustomers.php" id="pglink">Transfer Money</a></h2>
          <p>Instantly transfer money</p>
        </div>

        <div class="feature col">
        
            <img src="transactionh - Copy - Copy.png" id="col-1">
            
          
          
          <h2><a href="Transaction History.php" id="pglink">Transaction History </a></h2>
          <p>View the latest transactions</p>
        </div>
      </div>
    </div>

  <div class="footer">
    <p> Copyright@2022 | All rights reserved </p>
</div>  
    
    <script>
      var myIndex = 0;
      carousel();
      
      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 1500);
      }
      </script>
      
</body>
</html>