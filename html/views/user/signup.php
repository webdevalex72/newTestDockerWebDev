<div class="container shadow p-4 rounded mt-5 w-50" style="background-color: #cfeaef">
<form action="/user/signup/" method="post" name="registration">
  <div class="container">
    <h1 class="text-center"><?= $title ?></h1>
    <?php Session::showMessage(); ?>
    <p>Please fill in this form to create an account.</p>
    <hr>
  <div class="form-group">
    <label for="email"><b>User Name</b></label>
    <input type="text" placeholder="Enter You Name" name="name" class="form-control" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" class="form-control" required id="userEmail">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" class="form-control" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" class="form-control" name="password-rpt" required>
  
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="reset"  class="btn btn-secondary mb-2">Cancel</button>
      <button type="submit"  class="btn btn-primary mb-2">Sign Up</button>
    </div>
  </div>
</form> 
</div>