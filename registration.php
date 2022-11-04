<?php
    include "layouts/header.php";
    include "lib/User.php";
?>

<?php
    $user = new User();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registration'])){
        $userRegi = $user->userRegistration($_POST);
    }


?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>User Registration</h1>
            </div>
            <div class="panel-body">
                <div style="max-width:600px; margin:0 auto;">

                <?php 

                    if(isset($userRegi)){
                        echo $userRegi;
                    }
    
                ?>
                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="name">your Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="registration" class="btn btn-success btn-xs">Submit</button>
                    </form>
                </div>
            </div>
        </div>

<?php 
    include "layouts/footer.php";
?>