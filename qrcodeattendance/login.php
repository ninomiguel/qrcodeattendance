<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            max-height: 100vh;
            margin: 100px auto;
            background-image: linear-gradient(359deg, rgb(35,166,6),rgb(138, 191, 54),rgb(0,69,45));
        }
        .form-control::placeholder {
            color: #5cb85c;
            opacity: 0.5;
        }
        .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        small {
            opacity: 0.6;
        }
    </style>

</head>
<body>
    <h1 class="text-center text-white mb-5">CHMSU STUDENT ATTENDANCE MANAGEMENT SYSTEM</h1>
    <div class="container-lg bg-light rounded-3 p-5 w-50">
        
        
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <img src="img/chmsu.png" class="img-fluid rounded-pill" alt="CHMSU LOGO">
            </div>
            <div class="col-lg-6">
            <h3 class="text-success">Hello, welcome!</h3>
            <small class="my-2 text-success">Log in to continue!</small>
                <div class="mb-3">
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control shadow-none rounded-pill" autofocus="true">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control shadow-none rounded-pill" >
                </div>
                <div class="mb-3">
                    <a href="index.php" class="link-success text-white text-decoration-none"><button type="submit" class="btn btn-success shadow-none rounded-pill w-100">Login</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>