<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat App | Login</title>
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
        }

        .eye-icon {
            cursor: pointer;
        }

        @media (max-width: 576px) {
            .eye-icon {
                position: absolute;
                top: 50%;
                right: 10px;
                transform: translateY(-50%);
            }
        }
       form .link{
        text-align: center;
        margin: 10px 0;
        font-size: 17px;
       }
       form .link a{
        color: #333;
       }
       form .link a:hover{
        text-decoration: underline;
       }

        .invalid-feedback {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container col-md-4 border border-warning rounded">
        <div class="shadow-lg p-3 m-5 bg-white rounded">
            <div class="container-1">
                <h1 class="text-center h1">Login</h1>
            </div>
            <form id="login-form" onsubmit="validateForm(event)" method="post" action="login.php">
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" required>
                        <span class="input-group-text eye-icon" onclick="togglePasswordVisibility('password')">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    <div class="invalid-feedback">Please enter a password.</div>
                </div>
                
                
                
                <input type="submit" class="btn btn-info my-3" value="Continue to Chat">
                <div class="link">Not yet signed up?<a href="http://localhost/chat_project/signuppage.php">Sign up now</a></div>

            </form>
        </div>
    </div>

    <script src="./javascript/pass-show-hide.js"></script>
    <script>
        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>
</html>
