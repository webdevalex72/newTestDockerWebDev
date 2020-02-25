<div class="container shadow p-4 rounded mt-5 w-50" style="background-color: #cfeaef">
<h1 class="text-center"><?= $title ?></h1>
<?php Session::showMessage(); ?>
<form action="/user/login/" class="form-inline" method="post">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container form-group">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" class="form-control ml-2 mr-2" name="name" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" class="form-control ml-2 mr-2" name="password" required>

    <button type="submit" class="btn btn-primary  ml-2">Login</button>
    <!-- <label>
      <input type="checkbox" checked="checked" class="form-control" name="remember"> Remember me
    </label> -->
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input mt-2 mb-2" type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
  <div class="container" >
    <button type="reset" class="btn btn-secondary mb-2">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> 

</div>