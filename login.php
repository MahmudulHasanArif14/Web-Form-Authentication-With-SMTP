<?php
include 'navbar.php'; 


echo '
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
    <h3 class="text-center mb-4 ">Login</h3>
    <form action="validatelogin.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input 
          type="email" 
          class="form-control" 
          id="email" 
          name="email" 
          placeholder="Enter your email" 
          required 
        />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input 
          type="password" 
          class="form-control" 
          id="password" 
          name="password" 
          placeholder="Enter your password" 
          required
        />
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="rememberMe" />
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <a href="#" class="small text-decoration-none">Forgot password?</a>
      </div>
      <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
      <p class="text-center small mb-0">
        Don’t have an account? <a href="register.php" class="card-link">Register</a>
      </p>
    </form>
  </div>
</div>
';



?>