<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('layouts/header.php');
?>
    <h1 align="center">Login Page. ULS.</h1>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php
              if ($this->session->userdata('message') == 'error'){?>
                <div class="alert alert-danger" role="alert">
                  Error. Email or Password was incorect!!!
                </div>
            <?php }?>
            <form method="post" action="home/verif">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="register" type="submit" class="btn btn-primary">Sign in</a>
            </form>
        </div>
    </div>
<?php
include('layouts/footer.php');
?>
