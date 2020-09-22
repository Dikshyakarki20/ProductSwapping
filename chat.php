

<?php
include('connection.php');
session_start();
   if(!isset($_SESSION['admin'])){

      header('Location:login.php');
 }

$to_user_id=$_GET['uid'];
 $from_user_id=$_SESSION['id'];
 if (isset($_POST['submitmsg'])){
    $chat_message=$_POST['chatmsg'];
    $stmt="INSERT INTO `chat_message`(`to_user_id`, `from_user_id`, `chat_message`,  `status`) VALUES ($to_user_id,$from_user_id,'".$chat_message."','1')";
    $qry=mysqli_query($conn,$stmt);
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recycle House -Chat</title>
  <link rel="icon" href="img/logo(2).png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/chat.css">

</head>
<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
        <?php include "sesionnav.php"; ?>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->

  <div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
                                <?php
                                $s="SELECT id,username,image,status FROM `users` WHERE id IN (SELECT DISTINCT to_user_id FROM `chat_message` WHERE from_user_id='$from_user_id' )";
                                $result=mysqli_query($conn,$s);
                                $r=mysqli_num_rows($result);
                                if ($r){
                                    while ($rw = mysqli_fetch_array($result)) { 
                                        echo'<li class="shrink">
                                        <a href="chat.php?uid='.$rw['id'].'">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
									            <img src="uploads/'.$rw['image'].'" class="rounded-circle user_img">
									            <span class="online_icon offline"></span>
                                            </div>';
                                        echo'<div class="user_info">
                                                <span>'.$rw['username'].'</span>
                                            </div>
                                        </div>
                                        </a>
                                        </li>';
                                    }
                                }
                                ?>
                                </div>
                                </li>
					<div class="card-footer"></div>
				</div></div>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
                            <?php
                                $sql="SELECT username,image FROM `users` WHERE id = (select DISTINCT to_user_id from chat_message where to_user_id=$to_user_id)";
                                $res=mysqli_query($conn,$sql);
                                $rf=mysqli_num_rows($res);
                                if ($rf){
                                    while ($rfetch = mysqli_fetch_array($res)) {
                                        echo '<div class="img_cont">
                                        <img src="uploads/'.$rfetch['image'].'" class="rounded-circle user_img">
                                        <span class="online_icon offline"></span>
                                    </div>
                                    <div class="user_info">
                                        <span>'.$rfetch['username'].'</span>
                                        <p>Welcome</p>
                                    </div>';
                                    }
                                }?>
								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
                        <div class="card-body msg_card_body">
                                <?php
                                $st="SELECT `to_user_id`, `from_user_id`, `chat_message`, `timestamp` FROM `chat_message` WHERE $to_user_id IN(to_user_id,from_user_id) AND $from_user_id IN(to_user_id,from_user_id) AND status=1 ";
                                $query=mysqli_query($conn,$st);
                                $rows=mysqli_num_rows($query);
                                if ($rows){
                                    while ($row = mysqli_fetch_array($query)) { 
                                        if($row['to_user_id']==$to_user_id){
                                            echo'<div class="d-flex justify-content-start mb-4">
                                                    <div class="img_cont_msg">
                                                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                                    </div>
                                                <div class="msg_cotainer">';
                                                echo $row['chat_message'].'
                                                    <span class="msg_time">'.$row['timestamp'].'</span>
                                                </div>
                                                <button type="submit" name="delmsg"><i class="fas fa-times" style="color:white"></i></button>
                                            </div>';
                                        }else{
                                            echo'<div class="d-flex justify-content-end mb-4">
                                            <button type="submit" name="delmsg"><i class="fas fa-times " style="color:white"></i></button>
                                                    <div class="msg_cotainer_send">'
                                                    .$row['chat_message'].'
                                                    <span class="msg_time">'.$row['timestamp'].'</span>
                                                    </div>
                                                <div class="img_cont_msg">
                                                    <img src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg" class="rounded-circle user_img_msg">
                                                </div>
                                            </div>';
                                        }


                                   }
                                }
                                    
                                ?>
						<div class="card-footer">
                        <form action="" method="POST">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea name="chatmsg" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<span class="input-group-text send_btn"><button type="submit" name="submitmsg"><i class="fas fa-location-arrow"></i></button></span>
								</div>
							</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script src="js/chat.js"></script>
<?php include "footer.php"; ?>