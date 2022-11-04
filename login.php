<?php
    include "layouts/header.php";
    include "lib/User.php";
    Session::checkLogin();
?>

<?php
    $user = new User();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        $userLogin = $user->userLogin($_POST);
    }

?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>User Login</h1>
            </div>
            <div class="panel-body">
                <div style="max-width:600px; margin:0 auto;">

                <?php 

                    if(isset($userLogin)){
                        echo $userLogin;
                    }
    
                ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" name="password" class="form-control" required="">
                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-xs">Login</button>
                    </form>
                </div>
            </div>
        </div>

<?php 
    include "layouts/footer.php";
?>