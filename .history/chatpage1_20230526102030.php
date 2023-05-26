<?php 
include_once('config.php');
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: loginpage.php");
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat App | Professor</title>
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
            background-color: #f7f7f7;
        }

        .wrapper {
            max-width: 50%;
            height: 100%;
            margin: 25px auto;
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
            /* padding-right: 15px; */
        }

        .users header .content img {
            width: 40px;
            height: 40px;
            /* padding-left:15px ; */
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
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
        }

        .users .search button {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .users-list {
            max-height: 350px;
            overflow-y: auto;
            padding: 10px;
        }
        .users-list::-webkit-scrollbar{
            width: 0px;
        }

        

        .users-list a:hover {
            background-color: #e6e6e6;
        }

        .users-list a .content {
            display: flex;
            align-items: center;
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
        .users header .back-icon {
            padding: 10px;
font-size: 18px;
color: #333;
        }
        .users header span{
            font-size: 17px;
            font-weight: 600;
}
        .chat-box{
            overflow-y: auto;
            height: 500px;
            background: #91c9a5;
            padding: 10px 30px 20px 30px;
            box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
            inset 0 -32px 32px -32px rgb(0 0 0 / 5%)
            ;
        }
        .chat-box::-webkit-scrollbar{
            width: 0;
        }
        .chat-box .chat{
            margin: 15px 0;
        }
        .chat-box .chat p{
           word-wrap: break-word; 
           padding: 8px 16px; 
           box-shadow: 0 0 32px rgb(0 0 0 / 8%),
           0 16px 16px -16px rgb(0 0 0 /10%);


        }
        .chat-box .outgoing{
            display: flex;

        }

        .outgoing .details{
            margin-left: auto;
            max-width: calc(100% - 130px);

        }
        .outgoing .details p{
            word-wrap: break-word; 
            background: #333;
            color: #fff;
            border-radius: 18px 18px 0 18px;
        }
        .chat-box .incoming{
            display: flex;
            align-items: center;
        }
        .chat-box .incoming img{
            height: 35px;
            width: 35px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .incoming .details{
            margin-left: 10px;
            margin-right: auto;
            max-width: calc(100% - 130px);
        }
        .incoming .details p{
        color: #333;
        background: #fff;
        border-radius: 18px 18px  18px 0;

        }
         .typing-area{
            
        padding: 10px;
        display: flex;
        justify-content: space-between;
        
    }
        .typing-area input{
            height: 45px;
            width: calc(100% - 58px);
            font-size: 17px;
            border: 1px solid #ccc;
            padding: 0 13px;
            border-radius: 5px 0 0 5px;
            outline: none;
        }
        .typing-area button{
            width: 50px;
            height: 44px;
            border: none;
            outline: none;
            background: #333;
            color: #fff;
            font-size: 19px;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php
                $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
                echo $user_id;
                die(hello);
                $sql=mysqli_query($conn,"SELECT * FROM users_table where user_id={$user_id}");
                if(mysqli_num_rows($sql)>0){
                    $row=mysqli_fetch_assoc($sql);

                }
                ?>
                <div class="content">
               <a href="javascript:history.go(-1)" class="back-icon"> <i class="fas fa-arrow-left"></i></a>
               <img src="http://localhost/chat_project/images<?php echo $row['image'] ?>" alt="professor img">
                    <div class="details">
                        <span><?php echo $row['name'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                
                
            </header>
          
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./image.jpg" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./image.jpg" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./image.jpg" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./image.jpg" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>
               

            </div>
         
            <form action="#" class="typing-area">
            <input style="display:none" name="outgoing_id" type="text" value="<?php echo base64_encode($_SESSION['user_id'])?>">    
            <input style="display:none" name="incoming_id" type="text" value="<?php echo base64_encode($user_id) ?>">    
            <input type="text" name="message" class="input-field" placeholder="type your message here..."/>
                <button><i class="fab fa-telegram-plane"></i></button>

            </form>
            

          
          
        </section>
    </div>
    <
    <script src="./javascript/chat1.js"></script>
</body>

</html>
