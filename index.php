<?php
    include "lib/User.php";
    include "layouts/header.php";
    Session::checkSession();
   
?>

<?php 
    $loginmsg  = Session::get("loginmsg");
    if($loginmsg){
        echo $loginmsg;
    }
    Session::set('loginmsg', null);
?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>User list <span class="pull-right">Welcome! <strong> 
                    <?php 

                        $username = Session::get('username');
                        if(isset($username)){
                            echo $username;
                        }
                    ?>
                </strong> </span></h1>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <th width="20%">Serial</th>
                    <th width="20%">Name</th>
                    <th width="20%">Username</th>
                    <th width="20%">Email Address</th>
                    <th width="20%">Action</th>

     <?php 
         $user = new User();

         $userdata = $user->getUserData();

         if($userdata){
            $i = 0;
            foreach($userdata as $value){
                   $i++;     
     ?>               
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['name']?></td>
                        <td><?php echo $value['username']?></td>
                        <td><?php echo $value['email']?></td>
                        <td>
                            <a href="profile.php?id=<?php echo $value['id']?>" class="btn btn-primary btn-xs">View</a>
                        </td>
                    </tr>
                 <?php }} else {?>
                    <tr><td colspan="5"><h2>No User Data Found</h2></td></tr>
                  <?php }?>  
                    
                </table>
            </div>
        </div>
  
<?php 
    include "layouts/footer.php";
?>  