<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR code</title>

    <!-- QR Code Library -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <style>
        
        .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-success bg-success mb-5">
  <div class="container-fluid">
    <a class="navbar-brand text-white " href="#"><i class="fa-sharp fa-solid fa-qrcode me-2"></i>QR CODE STUDENT ATTENDANCE</a>
    <button class="navbar-toggler navbar-light bg-white text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
        <li class="nav-item">
          <a class="nav-link active text-white " aria-current="page" href="index.php">Scan-QRcode</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Student-Info</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Report
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Daily Report</a></li>
            <li><a class="dropdown-item" href="#">Weekly Report</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Monthly Report</a></li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active text-white " aria-current="page" href="login.php">Logout</a>
        </li>
      </form>
    </div>
  </div>
</nav>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>
                <?php
                if(isset($_SESSION['error'])){
                    echo "<div class='alert alert-danger><h4>Error!</h4>".$_SESSION['error']."</div>";
                }

                if(isset($_SESSION['success'])){
                    echo "<div class='alert alert-success bg-success text-white'><h4>Success!</h4>".$_SESSION['success']."</div>";
                }

                ?>
            </div>
            <div class="col-md-6">
            <form action="insert.php" method="post" class="form-horizontal">
                <label class="mb-3 text-success">SCAN QR CODE</label>
                <input type="text" name="text" id="text" readonny="" placeholder="Scan ID" class="form-control mb-3">
            </form>
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr >
                        <!-- <td>ID</td> -->
                        <td>Student ID</td>
                        <td>Time In</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $server = 'localhost';
                    $username = 'root';
                    $password = '12345';
                    $dbname = 'qrcodedb';
                
                    $conn = new mysqli($server, $username, $password, $dbname);
                
                    if($conn->connect_error){
                        die("Connection Failed" .$conn->connect_error);
                    }

                        $sql="SELECT student_name,time_in FROM student_attendance WHERE DATE(time_in)=CURDATE()";
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()){
                    ?>
                        <tr>
                            
                            <td><?php echo $row['student_name'];?></td>
                            <td><?php echo $row['time_in'];?></td>
                        </tr>

                    <?php    
                    }
                    ?>
                </tbody>
            </table>
                
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});

    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        }else{
            alert('No cameras found');
        }
    }).catch(function(e){
        console.error(e);
    });

    scanner.addListener('scan',function(c){
        document.getElementById('text').value=c;
        document.forms[0].submit();
    });
</script>
</body>
</html>