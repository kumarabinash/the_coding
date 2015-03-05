<div class="navbar navbar-fixed navbar-fluid">
  <nav>
    <ul>
      <li class="navbar-title">
        <a href="home.php">Home</a>
      </li>
    </ul>
    <ul>
      <?php
        if(isset($_SESSION['useremail'])){
          ?>
          <li><a href="profile.php"><?php echo $_SESSION['username']; ?></a></li>
          <li><a href="logout.php">Logout</a></li>
          <?php
        } else {
          ?>
          <li><a href="signup.php">Signup</a></li>
          <li><a href="login.php">Login</a></li>
          <?php
        }


      ?>
    </ul>
  </nav>
</div>