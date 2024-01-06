@extends('layouts.main')

@section('content')

<div class="tab-pane container active" id="login">
              <div class="container-fluid row" style="visibility:hidden; height:170px;">
              </div>
              <h1 style="font-family: Arial, Helvetica, sans-serif; margin-top: 50px; margin-bottom: 25px; text-align: center;">Log in</h1>
              <form class="needs-validation">
                <div class="form-floating mb-3" style="width: 300px; margin:auto;">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-2" style="width: 300px; margin:auto;">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-check mb-2" style="width: 300px; margin: auto;">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-right: 5px;">
                  <label class="form-check-label" for="flexCheckDefault" style="font-size: 14px;" style="margin-right: 80px;">
                    Remember me
                  </label>
                </div>
                <div style="width: 300px; margin: auto;">
                <button type="submit" class="btn btn-primary" style="margin-left: 190px;">Log in</button>
                </div>
              </form>
            </div>

@endsection