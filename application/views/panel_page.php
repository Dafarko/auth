<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('layouts/header.php');
?>
<nav class="nav nav-pills nav-fill">
  <a class="nav-item nav-link active" href="#">Home page</a>
  <a class="nav-item nav-link disabled" href="http://auth/panel/logout">Logout</a>
</nav>

<h1 align="center">All users. ULS.</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Group</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>admin</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>admin</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>admin</td>
    </tr>
  </tbody>
</table>

<?php
include('layouts/footer.php');
?>
