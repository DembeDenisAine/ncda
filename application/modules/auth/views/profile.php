   <?php

    $user= (Object) $this->session->get_userdata();

   //print_r($user);
   ?>

      <!-- /.card-header -->
<div class="card-body">
<form class="user_form" method="post" action="<?=base_url()?>auth/changePass" enctype="multipart/form-data">
  <div class="row">
      <div class="col-md-12">
</div>
<div class="col-md-12" style="margin:0 auto;">
	<span class="status"></span>
</div>
    <div class="col-sm-4">
      <!-- text input -->
      <div class="form-group">
        <label>Name</label>
         <h5><?=$user->names?></h5>
      </div>
    </div>
  
    <div class="col-sm-12">
      <!-- textarea -->
      <div class="form-group">
        <label>Username</label>
        <input type="text" value="<?=$user->username?>" required name="username"  autocomplete="off" class="form-control" placeholder="Username"  required/>
      </div>
    </div>
    <div class="col-sm-12">
      <!-- textarea -->

      <div class="form-group">
        <label>Old Password</label>
        <input type="password" required name="oldpass"   class="form-control" />
      </div>

      <div class="form-group">
        <label>New Password</label>
        <input type="password" required name="newpass"   class="form-control" minlength="6" />
      </div>

      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" required name="confirmnew"   class="form-control" minlength="6"  />
      </div>
    </div>

    <div class="col-sm-12">
      <button type="submit" class="btn btn-info float-right">Save Changes</button>
    </div>
   

    </div>
  </div>
</form>
</div>