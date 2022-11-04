<?php
    include "lib/User.php";
    include "layouts/header.php";
    Session::checkSession();
?>
<?php 
    if(isset($_GET['id'])){
        $usrid = (int)$_GET['id'];

        $sesId = Session::get("id");

         if($usrid != $sesId){
            header("Location: index.php");
         }

    }

    $user = new User();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatePass'])){
        $updatePass = $user->updatePassData($usrid,$_POST);
    }
?>
        <div class="panel panel-default">
            <div class="panel-heading">
            <h1>Change Password <span class="pull-right"><a href="profile.php?id=<?php echo $usrid; ?>" class="btn btn-info btn-sm">Back</a></span></h1>

            </div>
            <div class="panel-body">
                <div style="max-width:600px; margin:0 auto;">

                <?php 
                    if(isset($updatePass)){
                        echo $updatePass;
                    }
                ?>

                    <form action="" method="post">

                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <button type="submit" name="updatePass" class="btn btn-success btn-sm">Update</button>
                    </form>
              
                </div>
            </div>
        </div>

<?php 
    include "layouts/footer.php";
?>