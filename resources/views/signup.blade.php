@extends('layouts.main')

@section('content')

<div class="tab-pane container active" id="signup">
              <div class="container-fluid row" style="visibility:hidden; height:170px;">
              </div>
              <h1 style="font-family: Arial, Helvetica, sans-serif; margin-top: 50px; margin-bottom: 25px; text-align: center;">
              
              <?php if( isset($_SESSION['errors'])) echo $_SESSION['errors'] ?>
              Sign up</h1>
              <form class="needs-validation" action="Backend/connect.php" method="post" onsubmit="return validateForm()"> 

                <div class="form-floating mb-3" style="width: 300px; margin:auto;">
                  <input type="text" class="form-control" id="floatingName" placeholder="First name" name="fname" required>
                  <label for="floatingName">First name</label>
                </div>
                <div class="form-floating mb-3" style="width: 300px; margin:auto;">
                  <input type="text" class="form-control" id="floatingLastName" placeholder="Last name" name="lname" required>
                  <label for="floatingLastName">Last name</label>
                </div>
                <div class="form-floating mb-3" style="width: 300px; margin:auto;">
                  <input type="email" class="form-control" id="floatingInputS" placeholder="name@example.com" name="emailAddress" required>
                  <label for="floatingInputS">Email address</label>
                </div>
                <div class="form-floating" style="width: 300px; margin:auto;">
                  <input type="password" class="form-control" id="floatingPasswordS" placeholder="Password" name="pass" required>
                  <label for="floatingPasswordS">Password</label>
                </div>
                <div class="form-floating mb-2" style="width: 300px; margin: auto;">
                  <span class="form-text" style="margin-right: 80px;">Must be 8-20 chracters long.</span>
                </div>
                <div class="form-floating mb-2" style="width: 300px; margin:auto;">
                  <input type="password" class="form-control" id="floatingConfirmPassword" placeholder="Confirm Password" required>
                  <label for="floatingConfirmPassword">Confirm Password</label>
                  <div class="invalid-feedback" id="passwordMatchError" style="display: none;">Passwords do not match.</div>
                  <div class="invalid-feedback" id="passwordLength" style="display: none;">Password is too short or too long.</div>
                </div>
                <div class="form-check mb-2" style="width: 300px; margin: auto;">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"  style="margin-right: 5px;" name="rem">
                  <label class="form-check-label" for="flexCheckDefault" style="font-size: 14px;" style="margin-right: 80px;">
                    Remember me
                  </label>
                </div>
                <div style="width: 300px; margin: auto;">
                <button type="submit" class="btn btn-primary" style="margin-left: 190px;">Sign up</button>
                </div>
              </form>
            </div>

@endsection