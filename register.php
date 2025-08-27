<?php
include 'navbar.php'; 






if(isset($_REQUEST['error'])){
    // from url take the as input
    $error = htmlspecialchars($_REQUEST['error']); 
    echo '
    <div class="container w-50 pt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$error.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    ';
}
echo '

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%; border-radius: 15px;">
    <h3 class="text-center mb-4">Register</h3>
    <form action="homepage.php" method="POST" class="needs-validation" >
      <!-- Username -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input 
          type="text" 
          class="form-control" 
          id="username" 
          name="username" 
          placeholder="Enter your Name" 
          required
        />
      
      
        </div>
      
      <!-- Email -->
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
      
      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input 
          type="password" 
          class="form-control" 
          id="password" 
          name="password" 
          placeholder="Enter your password" 
          minlength="6" 
          required
        />
      
        </div>
      

      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input 
          type="password" 
          class="form-control" 
          id="confirmPassword" 
          name="confirmPassword" 
          placeholder="Re-enter your password" 
          minlength="6" 
          required
        />
      
        </div>
      
      <!-- Submit Button -->
      <button type="submit"  name="submit" value="Register" class="btn btn-success w-100 mb-3">Register</button>
      
      <p class="text-center small mb-0">
        Already have an account? <a href="login.php" class="card-link">Login</a>
      </p>
    </form>
  </div>
</div>

';








include 'footer.php';

?>