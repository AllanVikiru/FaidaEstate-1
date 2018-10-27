<?php
session_start();
$id = $_SESSION['login_id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estate";
$sql = "SELECT * FROM resident WHERE user_id ='$id'";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM statement WHERE month = '2018-06'"; 
$result1 = $conn->query($sql1);
 if(!$result1) {
     echo $conn->error;
  }
$sql2 = "SELECT * FROM statement WHERE month = '2018-07'"; 
$result2 = $conn->query($sql2);
 if(!$result2) {
     echo $conn->error;
  }
  
$sql3 = "SELECT * FROM statement WHERE month = '2018-08'"; 
$result3 = $conn->query($sql3);
 if(!$result3) {
     echo $conn->error;
  }

$sql4 = "SELECT * FROM statement WHERE month = '2018-09'"; 
$result4 = $conn->query($sql4);
 if(!$result4) {
     echo $conn->error;
  }
$sql5 = "SELECT * FROM statement WHERE month = '2018-10'"; 
$result5 = $conn->query($sql5);
 if(!$result5) {
     echo $conn->error;
  }
$sql6 = "SELECT * FROM statement WHERE month = '2018-11'"; 
$result6 = $conn->query($sql6);
 if(!$result6) {
     echo $conn->error;
  }
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Nyumba App | Resident Payment Module</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main_dash.css">
    <link rel="icon" type="image/png" href="../Login_v13/images/icons/favicon.ico"/>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="../javascript/main.js"></script>
<style>
.accordion {
    border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	background-color: #eef1f7;
	color: #617085;
	font-weight: 600;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.accordion:active, .accordion:hover {
    background-color: #ccc;
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>
</head>
<body>

	<div class="header">
        <div class="logo">
          <i class="fa fa-comments"></i>
          <span>FAIDA ESTATE</span>   
        </div>

        <a href="#" class="nav-trigger"><span></span></a>
         <p align="center" style="margin-top: 15px; margin-right: 60px; text-align: right; color: black; font-weight: bold; ">Welcome, <?php echo $_SESSION['username']; ?></p>

    </div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-comments"></i>
				<span>Faida Estate</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="../php/dashboard.php">
							<span><i class="fa fa-user"></i></span>
							<span>Profile</span>
						</a>
					</li>
			
  
				  <li class="active">
						<a href="#">
							<span><i class="fas fa-folder"></i></span>
							<span>Statements</span>
						</a>
					</li>

          <li>
            <a href="../php/my_payments.php">
              <span><i class="fas fa-coins"></i></span>
              <span>My Payments</span>
            </a>
          </li>
                    
					
                    <li>
						<a id="logout">
							<span><i class="fa fa-sign-out"></i></span>
							<span>Logout</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
        
		<div class="main-content">
			<div class="title">
				2018 Statements
			</div>
                <button class="accordion">June</button>
            <div class="panel">
           <div class="login-page">
           <div class="form">
                <form class="login-form" action="#">
      <p class="headers"> June 2018 Statement </p>
      <?php if ($result1 && $result1->num_rows > 0) { // output data of each row
    while($row = $result1->fetch_assoc()) { ?>
      <p class="message" align="left">Security:</p> <p class="message" align="right"> 
       KES <?php echo $row['security']; ?> </p> <br/> 
      <p class="message" align="left">Garbage Collection:</p> <p class="message" align="right"> 
       KES <?php echo $row['garbage']; ?> </p> <br/>
      <p class="message" align="left">Infrastructure Maintenance:</p> <p class="message" align="right"> 
       KES <?php echo $row['infrastructure']; ?> </p> <br/>
      <p class="message" align="left">Total:</p> <p class="message" align="right"> 
       KES <?php echo $row['total_kes']; ?> (USD <?php echo $row['total_usd']; ?>) </p> <br/>
</form>
 <div id="paypal-button1"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbA_jM24o_SXyUpFUhTHv3q6xgZlzQWLulDi0M659xhaOHr3oGg1YpzG1zoMFbUBZggaFWwylvr5XL0v',
      production: '',
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    color: 'blue',   // 'gold, 'blue', 'silver', 'black'
    size:  'responsive', // 'medium', 'small', 'large', 'responsive'
    shape: 'rect'    // 'rect', 'pill'
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '60',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Your payment has been recieved!');
        location.href = "../php/add_june_payment.php";
        
        
        

      });
    }
  }, '#paypal-button1');

</script>
    
        <?php } }else {
        echo "No receipt yet.";
      }
	
      ?> 
        </div>
          </div>
             </div>
	
             
		 <button class="accordion">July</button>
            <div class="panel">
           <div class="login-page">
           <div class="form">
                <form class="login-form" action="#">
      <p class="headers"> July 2018 Statement </p>
      <?php if ($result2 && $result2->num_rows > 0) { // output data of each row
    while($row = $result2->fetch_assoc()) { ?>
      <p class="message" align="left">Security:</p> <p class="message" align="right"> 
       KES <?php echo $row['security']; ?> </p> <br/> 
      <p class="message" align="left">Garbage Collection:</p> <p class="message" align="right"> 
       KES <?php echo $row['garbage']; ?> </p> <br/>
      <p class="message" align="left">Infrastructure Maintenance:</p> <p class="message" align="right"> 
       KES <?php echo $row['infrastructure']; ?> </p> <br/>
      <p class="message" align="left">Total:</p> <p class="message" align="right"> 
       KES <?php echo $row['total_kes']; ?> (USD <?php echo $row['total_usd']; ?>) </p> <br/>
</form>
       <div id="paypal-button2"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbA_jM24o_SXyUpFUhTHv3q6xgZlzQWLulDi0M659xhaOHr3oGg1YpzG1zoMFbUBZggaFWwylvr5XL0v',
      production: '',
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    color: 'blue',   // 'gold, 'blue', 'silver', 'black'
    size:  'responsive', // 'medium', 'small', 'large', 'responsive'
    shape: 'rect'    // 'rect', 'pill'
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '60',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Your payment has been recieved!');
        location.href = "../php/add_july_payment.php";
       
        

      });
    }
  }, '#paypal-button2');

</script>
    
        <?php } }else {
        echo "No receipt yet.";
      }
	
      ?> 
             </div>
               </div>
                 </div>

      <button class="accordion">August</button>
            <div class="panel">
            <div class="login-page">
           <div class="form">
          <form class="login-form" action="#">
       <p class="headers"> August 2018 Statement </p>
      <?php if ($result3 && $result3->num_rows > 0) { // output data of each row
      while($row = $result3->fetch_assoc()) { ?>
      <p class="message" align="left">Security:</p> <p class="message" align="right"> 
       KES <?php echo $row['security']; ?> </p> <br/> 
      <p class="message" align="left">Garbage Collection:</p> <p class="message" align="right"> 
       KES <?php echo $row['garbage']; ?> </p> <br/>
      <p class="message" align="left">Infrastructure Maintenance:</p> <p class="message" align="right"> 
       KES <?php echo $row['infrastructure']; ?> </p> <br/>
      <p class="message" align="left">Total:</p> <p class="message" align="right"> 
       KES <?php echo $row['total_kes']; ?> (USD <?php echo $row['total_usd']; ?>)</p> <br/>
</form>
  <div id="paypal-button3"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbA_jM24o_SXyUpFUhTHv3q6xgZlzQWLulDi0M659xhaOHr3oGg1YpzG1zoMFbUBZggaFWwylvr5XL0v',
      production: '',
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    color: 'blue',   // 'gold, 'blue', 'silver', 'black'
    size:  'responsive', // 'medium', 'small', 'large', 'responsive'
    shape: 'rect'    // 'rect', 'pill'
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '60',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Your payment has been recieved!');
        location.href = "../php/add_august_payment.php";
      
        

      });
    }
  }, '#paypal-button3');

</script>

        <?php } }else {
        echo "No receipt yet.";
      }
	
      ?> 
             </div>
          </div>
             </div> 
             
              <button class="accordion">September</button>
            <div class="panel">
            <div class="login-page">
           <div class="form">
               <form class="login-form" action="#">
       <p class="headers"> September 2018 Statement </p>
      <?php if ($result4 && $result4->num_rows > 0) { // output data of each row
      while($row = $result4->fetch_assoc()) { ?>
      <p class="message" align="left">Security:</p> <p class="message" align="right"> 
       KES <?php echo $row['security']; ?> </p> <br/> 
      <p class="message" align="left">Garbage Collection:</p> <p class="message" align="right"> 
       KES <?php echo $row['garbage']; ?> </p> <br/>
      <p class="message" align="left">Infrastructure Maintenance:</p> <p class="message" align="right"> 
       KES <?php echo $row['infrastructure']; ?> </p> <br/>
      <p class="message" align="left">Total:</p> <p class="message" align="right"> 
       KES <?php echo $row['total_kes']; ?> (USD <?php echo $row['total_usd']; ?>) </p> <br/>
</form>
  <div id="paypal-button4"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbA_jM24o_SXyUpFUhTHv3q6xgZlzQWLulDi0M659xhaOHr3oGg1YpzG1zoMFbUBZggaFWwylvr5XL0v',
      production: '',
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    color: 'blue',   // 'gold, 'blue', 'silver', 'black'
    size:  'responsive', // 'medium', 'small', 'large', 'responsive'
    shape: 'rect'    // 'rect', 'pill'
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '60',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Your payment has been recieved!');
        location.href = "../php/add_sept_payment.php";
        
        

      });
    }
  }, '#paypal-button4');

</script>


  
        <?php } }else {
        echo "No receipt yet.";
      }
	
      ?> 
             </div>
          </div>
             </div> 
             
            <button class="accordion">October</button>
            <div class="panel">
            <div class="login-page">
           <div class="form">
               <form class="login-form" action="#">
       <p class="headers"> October 2018 Statement </p>
      <?php if ($result5 && $result5->num_rows > 0) { // output data of each row
      while($row = $result5->fetch_assoc()) { ?>
      <p class="message" align="left">Security:</p> <p class="message" align="right"> 
       KES <?php echo $row['security']; ?> </p> <br/> 
      <p class="message" align="left">Garbage Collection:</p> <p class="message" align="right"> 
       KES <?php echo $row['garbage']; ?> </p> <br/>
      <p class="message" align="left">Infrastructure Maintenance:</p> <p class="message" align="right"> 
       KES <?php echo $row['infrastructure']; ?> </p> <br/>
      <p class="message" align="left">Total:</p> <p class="message" align="right"> 
       KES <?php echo $row['total_kes']; ?> (USD <?php echo $row['total_usd']; ?>) </p> <br/>
</form>
      <div id="paypal-button5"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbA_jM24o_SXyUpFUhTHv3q6xgZlzQWLulDi0M659xhaOHr3oGg1YpzG1zoMFbUBZggaFWwylvr5XL0v',
      production: '',
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    color: 'blue',   // 'gold, 'blue', 'silver', 'black'
    size:  'responsive', // 'medium', 'small', 'large', 'responsive'
    shape: 'rect'    // 'rect', 'pill'
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '60',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Your payment has been recieved!');
        location.href = "../php/add_october_payment.php";
        
        

      });
    }
  }, '#paypal-button5');

</script>
      
    
        <?php } }else {
        echo "No receipt yet.";
      }
	
      ?> 
             </div>
          </div>
             </div> 
             
             <button class="accordion">November</button>
            <div class="panel">
             <div class="login-page">
           <div class="form">
        <form class="login-form" action="#">
     <p class="headers"> November 2018 Statement </p>
      <?php if ($result6 && $result6->num_rows > 0) { // output data of each row
    while($row = $result6->fetch_assoc()) { ?>
      <p class="message" align="left">Security:</p> <p class="message" align="right"> 
       KES <?php echo $row['security']; ?> </p> <br/> 
      <p class="message" align="left">Garbage Collection:</p> <p class="message" align="right"> 
       KES <?php echo $row['garbage']; ?> </p> <br/>
      <p class="message" align="left">Infrastructure Maintenance:</p> <p class="message" align="right"> 
       KES <?php echo $row['infrastructure']; ?> </p> <br/>
      <p class="message" align="left">Total:</p> <p class="message" align="right"> 
       KES <?php echo $row['total_kes']; ?> (USD <?php echo $row['total_usd']; ?>) </p> <br/>
</form>
       <div id="paypal-button6"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbA_jM24o_SXyUpFUhTHv3q6xgZlzQWLulDi0M659xhaOHr3oGg1YpzG1zoMFbUBZggaFWwylvr5XL0v',
      production: '',
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    color: 'blue',   // 'gold, 'blue', 'silver', 'black'
    size:  'responsive', // 'medium', 'small', 'large', 'responsive'
    shape: 'rect'    // 'rect', 'pill'
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '60',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Your payment has been recieved!');
        location.href = "../php/add_november_payment.php";
        
        

      });
    }
  }, '#paypal-button6');

</script>

        <?php } }else {
        echo "No receipt yet.";
      }
	  $conn->close();
      ?> 
             </div>
          </div>
             </div>  

			</div>
		
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

var logout = document.getElementById('logout');
logout.addEventListener('click', function() {
  if (confirm("Are you sure you want to log out?")) {
    location.href = "../html/home.html";
} else {
    location.href = "../php/dashboard.php";
}
});
</script>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.form {
  
  z-index: 1;
  background: #ffffff;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form .headers {
  margin: 15px 0 0;
  color: #000;
  font-size: 18px;
}
.type {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.month {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

input:invalid + span:after {
    position: absolute;
    content: '✖';
    color: red;
    padding-left: 5px;
}

input:valid + span:after {
    position: absolute;
    content: '✓';
    color: green;
    padding-left: 5px;
}

button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #35475e;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
button:hover,button:active, button:focus {
  background: #eef1f7;
  color: #617085;
  font-weight:bolder;
}
.form .message {
  margin: 15px 0 0;
  color: #000;
  font-size: 12px;
}
.form .message a {
  color: #eef1f7;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
 
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
</style>
</body>
</html>