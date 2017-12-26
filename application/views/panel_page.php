<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('layouts/header.php');
?>
<nav class="nav nav-pills nav-fill">
  <a class="nav-item nav-link active" href="panel">Home page</a>
  <a class="nav-item nav-link disabled" href="panel/logout">Logout</a>
</nav>

<h1 align="center">All users. ULS.</h1>
<?php
  if (!empty($this->session->userdata('ok'))){?>
    <div class="alert alert-success" role="alert">
      <?=$this->session->userdata('ok')?>
    </div>
<?php $this->session->unset_userdata('ok'); }?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Group</th>
      <?php
          if($this->session->userdata('group') == 'admin'){
            echo "<th scope='col'>Edit</th>";
            echo "<th scope='col'>Delete</th>";
          }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $user) {?>
    <tr>
        <td><?=$user->id?></td>
        <td><?=$user->first_name?></td>
        <td><?=$user->last_name?></td>
        <td><?=$user->email?></td>
        <td><?php if($user->group=='A') echo 'Admin'; else echo 'Guest';?></td>
        <?php if($this->session->userdata('group') == 'admin'){
                echo "<td><a href='panel/edit/$user->id'>Edit</a></td>";
                echo "<td><a href='panel/delete/$user->id'>Delete</a></td>";
              }
        ?>
    </tr>
    <?php }?>
  </tbody>
</table>

<?php
include('layouts/footer.php');
?>
