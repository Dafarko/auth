<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('layouts/header.php');
?>
<h1 align="center">Sign in. ULS.</h1>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <?php
          if (!empty($this->session->userdata('message'))){?>
            <div class="alert alert-danger" role="alert">
              <?=$this->session->userdata('message')?>
            </div>
        <?php $this->session->unset_userdata('message'); }?>
        <form action="register/reg" method="post">
            <div class="form-group">
                <label for="fname">Your First Name</label>
                <input type="text" class="form-control" name ="fname" id="fname" placeholder="Enter your First Name">
            </div>
            <div class="form-group">
                <label for="lname">Your Last Name</label>
                <input type="text" class="form-control" name ="lname" id="lname" placeholder="Enter your Last Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name ="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" name ="password1" id="password1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" name ="password2" id="password2" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="home" class="btn btn-primary">Sign in</a>
        </form>
    </div>
</div>
<?php
include('layouts/footer.php');
?>
