<?php 
include_once('config.php');
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: loginpage.php");
    echo $_SESSION['user_id'];
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat App | List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .wrapper {
            max-width: 500px;
            margin: 45px auto;
            padding: 20px;
        }

        .users {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .users header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .users header .content {
            display: flex;
            align-items: center;
        }

        .users header .content img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .users header .content .details span {
            font-weight: bold;
        }

        .users header .content .details p {
            color: #777;
            font-size: 12px;
        }

        .users header .logout {
            color: #777;
            font-size: 14px;
            text-decoration: none;
        }

        .users .search {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #fff;
        }

        .users .search .text {
            font-weight: bold;
            margin-right: 10px;
        }

        .users .search input[type="text"] {
            flex: 1;
            padding: 8px;
            border: none;
            border-radius: 4px;
            box-shadow: 3px 5px 4px #777;
            font-size: 14px;
            border-radius: 5px 0 0 5px;
            outline:0;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .users .search input.active{
            opacity: 1;
            pointer-events: auto;
        }

        .users .search button {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
            transition: all 0.2s ease;
        }
        .users .search button.active{
            color: #fff;
            background:#333

        }
        .users .search button.active i::before{
            content:"\f00d";
        }

        .users-list {
            max-height: 350px;
            overflow-y: auto;
            padding: 10px;
        }
        .users-list::-webkit-scrollbar{
            width: 0px;
        }

        .users-list a {
            page-break-after: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-right: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 15px;
            text-decoration: none;
            color: #000;
            /* transition: background-color 0.3s ease; */
        }

        .users-list a:hover {
            background-color: #e6e6e6;
        }

        .users-list a .content {
            display: flex;
            align-items: center;
        }

        .users-list a .content img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .users-list a .content .details {
            display: flex;
            flex-direction: column;
        }

        .users-list a .content .details span {
            font-weight: bold;
        }

        .users-list a .content .details p {
            color: #777;
            font-size: 12px;
        }

        .users-list a .status-dot {
            display: flex;
            align-items: center;
        }

        .users-list a .status-dot i {
            font-size: 8px;
            color: green;
            margin-left: 5px;
        }

        @media (max-width: 600px) {
            .wrapper {
                max-width: 100%;
                padding: 10px;
            }

            .users header .content .details {
                display: none;
            }

            .users header .logout {
                font-size: 12px;
            }
        }
        a .logout{
            columns: #fff;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                $sql=mysqli_query($conn,"SELECT * FROM users_table where user_id={$_SESSION['user_id']}");
                if(mysqli_num_rows($sql)>0){
                    $row=mysqli_fetch_assoc($sql);

                }
                ?>
                <div class="content">
                    <img src="<?php echo $row['image'] ?> alt="professor img">
                    <div class="details">
                        <span><?php echo $row['name'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="logout.php" class="logout btn btn-danger text-dark">Logout</a>
            </header>
            <div class="search">
               
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <a href="#">
                    <div class="content">
                        <img src="./image.jpg" alt="">
                        <div class="details">
                            <span>Professor's</span>
                            <p>This is a test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./image.jpg" alt="">
                        <div class="details">
                            <span>Professor's</span>
                            <p>This is a test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./image.jpg" alt="">
                        <div class="details">
                            <span>Professor's</span>
                            <p>This is a test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./image.jpg" alt="">
                        <div class="details">
                            <span>Professor's</span>
                            <p>This is a test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./image.jpg" alt="">
                        <div class="details">
                            <span>Professor's</span>
                            <p>This is a test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
            </div>
            
            

           
      
        </section>
    </div>
    <script src="./javascript/user.js"></script>
</body>

</html>
