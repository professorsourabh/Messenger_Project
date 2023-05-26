<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat App | Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        .container {
            margin-top: 6rem;
            box-shadow: 10px 15px 20px #f0520a;
            background-image: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
        }

        #name:focus,
        #email:focus,
        #password:focus,
        #confirm_password:focus,
        #dob:focus {
            outline: none !important;
            border: 1px solid wheat;
            box-shadow: 0 0 10px #f0520a;
        }

        .h1 {
            color: white;
            text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
        }

        .row {
            position: absolute;
            top: 59%;
            left: 55%;
            transform: translate(-50%, -50%);
        }

        .eye-icon {
            cursor: pointer;
        }

        @media (max-width: 576px) {
            .container {
                margin-top: 3rem;
                margin-bottom: 3rem;
                box-shadow: none;
                background-image: none;
            }

            .row {
                position: static;
                transform: none;
                margin-top: 1rem;
                text-align: center;
            }

            .eye-icon {
                position: static;
                top: auto;
                right: auto;
                transform: none;
                margin-top: 0.5rem;
            }
        }

        form .link {
            text-align: center;
            margin: 10px 0;
            font-size: 17px;
        }

        form .link a {
            color: #333;
        }

        form .link a:hover {
            text-decoration: underline;
        }

        .invalid-feedback {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container col-md-4 col-lg-3 border border-warning rounded">
        <div class="shadow-lg p-3 m-5 bg-white rounded">
            <div class="container-1">
            <div class="alert alert-success" role="alert">
  <?php $_SESSION['msg']?>
</div>
                <h1 class="text-center h1">Sign Up</h1>
            </div>
            <form id="login-form" onsubmit="validateForm(event)" enctype="multipart/form-data" method="post" action="signup.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" required>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="form-group">
                    <label for="dob">DOB</label>
                    <input type="date" id="dob" class="form-control" name="dob" required>
                    <div class="invalid-feedback">Please enter your date of birth.</div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" class="form-control" name="password" required>
                        <span class="input-group-text eye-icon" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="invalid-feedback">Please enter a password.</div>
                </div>
                <div class="invalid-feedback" id="password-match-error">Passwords do not match.</div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                    <div class="invalid-feedback">Please upload your Image.</div>
                </div>
                <div class="button">
                <input type="submit" class="btn btn-info my-3 w-100" value="Continue to Chat">
                </div>
                <div class="link">Already signed up? <a href="#">Login now</a></div>
            </form>
        </div>
    </div>
    <script src="./javascript/signup.js">
       
    </script>
</body>
</html>
