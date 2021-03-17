<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>SignUp as an Emplyer!</title>
    <!--Css-->  
      <style>
          *{ padding: 0 ; margin: 0 box-sizing: border-box; }
          
          body{ background: rgb(219,226,226);}
          
          .row{background: white;border-radius: 30px;box-shadow: 12px 12px 22px grey;}
          img{width: auto; ; border-radius: 30px; }
          
          .btn1{border: none;outline: none;height: 50px;width: 100%;background-color: black;color: white;border-radius: 4px;font-weight: bold;}
          .btn1:hover{background-color: white; border: 1px solid;color: black;}
          
          .logo{padding-bottom: 50px;}
      
      </style>
  </head>
    
    
  <body>
      <section class="Form my-4 mx-5">
      <div class="container">
          <div class="row no-gutters">
            <div class="col-lg-5">
              <img src="img/login.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-7 px-5 pt-5">
                  
        <div class="logo"> <!--main logo-->
        <a href="index.html"> <img src="img/logo.png" alt="" align="left"> </a>
        </div>
                  
        <h4>SignUp as an Employer!</h4>
                  
              <form action="" method="POST">
                  <div class="form-row">
                  <div class="col-lg-7">
                      <input type="email" placeholder="Email-Address" class="form-control my-3 p-4" name="email" required>
                      </div>
                  </div>
                  
                 <div class="form-row">
                  <div class="col-lg-7">
                      <input type="password" placeholder="Password" class="form-control my-3 p-4 " name="password" required>
                      </div>
                  </div>
                  
                   <div class="form-row">
                  <div class="col-lg-7">
                      <input type="phone" placeholder="Phone 017-XXXX-XXXX" class="form-control my-3 p-4" name="phone">
                      </div>
                  </div>
                  
                 <!--    <div class="form-row">
                  <div class="col-lg-7">
                      <input type="number" placeholder="Contact Number e.g. 017-XXXX-XXXX" class="form-control my-3 p-4">
                      </div>
                  </div>-->
                  
                  
                     <div class="form-row">
                  <div class="col-lg-7">
                      <button type="submit"  class="btn1 mt-mb-5" value="Submit"> SignUp </button>
                      </div>
                  </div>
                  <a href="#"> Forgot Password?</a>
                  <p>Already Have an account?  <a href="login as job seeker or employer.html"> Login Here!</a> </p>
                  
                  </form>
              </div>
          </div>
          
          </div>
      </section>

    
      
      
      
      
      
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'] ;



if (!empty($email) || !empty($password) || !empty($phone))
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "jobwebsiteakib";

    #create connection
    $conn= new mysqli($host ,$dbusername , $dbpassword , $dbname);

    if(mysqli_connect_error()) {
        die('Connecr Error( '. mysqli_connect_errorno() . ')'. mysqli_connect_error());

    } else{
        $SELECT = "SELECT email From signupasemployer where email = ? limit 1";
        $INSERT = "INSERT Into signupasemployer ( email , password , phone) values(?,?,?)";

     //prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s" , $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     
     if($rnum==0)
     {
         $stmt->close();
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("ssi", $email , $password , $phone);
         $stmt->execute();
         echo "New record inserted successfully";

     } else{
         echo "someone already registered using this email";

     }
     $stmt->close();
     $conn->close();
    }
}
else{
    echo "all fields are required" ;
    die();
}
?>