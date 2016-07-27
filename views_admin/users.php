<?php 
//write the sql statement and run the query
$sql_users = "SELECT user_id, full_name, user_name, admin FROM user_details WHERE NOT user_name = 'sevenseastech'";
$user = db_query($sql_users);

?>

<div class="section">
      <div class="container">
      <div class="panel panel-default panel-faded">
                <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                        <img src="assets/img/users.svg" class="img-responsive" width="125" height="125">
                    </div> 
                    <div class="col-md-12">
                        <h1>Users</h1>
                    </div>       
                </div> <br>
            <div class="row">
                <div class="col-md-5">
                  <form role="form" method="post">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Enter User Name">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">search</button>
                        </span>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-7">
                  <a class="btn btn-default" href="newuser">Add New User</a>
                </div>
            </div>    
        <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <ul class="media-list">
                 <?php 
                 while ($row = $user->fetch_assoc()) {
                     ?>
                 <li class="col-md-6">
                  <div class="panel panel-default panel-faded">
                    <div class=" file-list">
                        <a class="pull-left img--space" href="userinfo?id=<?php echo $row["user_id"]?>"><img class="media-object" src="assets/img/avatar.jpg" height="79" width="79"></a>
                        <div class="media-body">
                          <h4 class="name"><?php echo $row["full_name"];?></h4>
                          <h5 class="name">Username: <?php echo $row["user_name"];?></h5>
                          <div><?php if($row["admin"]>0){echo "Administrator";}else{echo "<br>";}?></div>
                          <a class="btn btn-default" title="edit" href="edit_user?id=<?php echo $row['user_id'];?>"> <img src="assets/img/edit.png"></a>
                          <a class="btn btn-default" title="delete" href="edit_user?id=<?php echo $row['user_id'];?>"> <img src="assets/img/delete.png"></a>
                        </div>
                    </div>
                  </div>
                 </li>
                 <?php }
                 ?>                 
               </ul>  
          </div>
        </div>
      </div>
    </div>
</div>
</div>