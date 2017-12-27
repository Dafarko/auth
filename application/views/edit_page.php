<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('layouts/header.php');
?>
<nav class="nav nav-pills nav-fill">
  <a class="nav-item nav-link active" href="/panel">Main Panel</a>
  <a class="nav-item nav-link disabled" href="/panel/logout">Logout</a>
</nav>
<h1 align="center">Edit user.</h1>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <?php
          if (!empty($this->session->userdata('message'))){?>
            <div class="alert alert-danger" role="alert">
              <?=$this->session->userdata('message')?>
            </div>
        <?php $this->session->unset_userdata('message'); }?>
        <form action="/panel/edit_action" method="post">
            <?php foreach ($result as $res) {?>
            <input type="hidden" name ="id" id="id" value="<?=$res->id?>">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name ="fname" id="fname" placeholder="Enter your First Name" value="<?=$res->first_name?>">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name ="lname" id="lname" placeholder="Enter your Last Name" value="<?=$res->last_name?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name ="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$res->email?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" name ="password1" id="password1" placeholder="Password" value="">
            </div>
            <div class="form-group">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" name ="password2" id="password2" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary" value="Change">
            <? } ?>
        </form>
    </div>
</div>
<?php
include('layouts/footer.php');
?>
