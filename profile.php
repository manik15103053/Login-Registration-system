<?php
    include "lib/User.php";
    include "layouts/header.php";
    Session::checkSession();
?>
<?php 
    if(isset($_GET['id'])){
        $usrid = (int)$_GET['id'];
    }

    $user = new User();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $updateUser = $user->updateUserData($usrid,$_POST);
    }
?>
        <div class="panel panel-default">
            <div class="panel-heading">
            <h1>User Profile <span class="pull-right"><a href="index.php" class="btn btn-info btn-sm">Back</a></span></h1>

            </div>
            <div class="panel-body">
                <div style="max-width:600px; margin:0 auto;">

                <?php 
                    if(isset($updateUser)){
                        echo $updateUser;
                    }
                ?>

                <?php 
                    $userdata = $user->getUserById($usrid);

                    if($userdata){

                    
                ?>
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="name">your Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $userdata->name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $userdata->username; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $userdata->email; ?>">
                        </div>

                        <?php 
                            $sesId = Session::get("id");

                            if($usrid == $sesId){

                           
                        ?>

                        <button type="submit" name="update" class="btn btn-success btn-sm">Update</button>
                         <a href="changepass.php?id=<?php echo $usrid; ?>" class="btn btn-primary btn-sm">Password Change</a>       
                        <?php }?>
                    </form>
                <?php }?>    
                </div>
            </div>
        </div>

<?php 
    include "layouts/footer.php";
?>