<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
  <h2 class="mb-4">Registration Form</h2>
  <form method="POST" action="process_registration.php">
    
    <div class="form-group">
      <label>User ID</label>
      <input type="text" class="form-control" name="id" placeholder="Enter ID (optional)">
    </div>

    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control" name="username" placeholder="Enter Username">
    </div>

    <div class="form-group">
      <label>Email address</label>
      <input type="text" class="form-control" name="email" placeholder="Enter Email">
    </div>

    <div class="form-group">
      <label>Gender</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="Male">
        <label class="form-check-label">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="Female">
        <label class="form-check-label">Female</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="Other">
        <label class="form-check-label">Other</label>
      </div>
    </div>

    <div class="form-group">
      <label>Mobile No</label>
      <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile">
    </div>

    <div class="form-group">
      <label>Country</label>
      <select class="form-control" name="country">
        <option value="">--Select--</option>
        <option value="India">INDIA</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="JAPAN">JAPAN</option>
      </select>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password" placeholder="Enter Password">
      <?php
        
        session_start();
        if (!empty($_SESSION['password_error'])) {
            echo "<span style='color:red;'>* " . $_SESSION['password_error'] . "</span>";
            unset($_SESSION['password_error']); 
        }
      ?>
    </div>

    <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" name="terms">
      <label class="form-check-label">I agree to the terms and condition</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
</div>
</body>
</html>
