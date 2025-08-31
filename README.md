# Web Form Authentication with SMTP

A secure PHP web form authentication system using SMTP email verification. Users can register, receive an OTP via email, and verify their account before logging in. Built with modern UI and Bootstrap for a professional look.

## Features

- **User Registration**
  - Input fields: Name, Email, Password, Confirm Password
  - Regex validation for proper formatting
  - Password must contain letters and numbers

- **Email Verification**
  - OTP sent to user email via SMTP using PHPMailer
  - Randomly generated OTP for secure verification
  - Only verified users can log in

- **Login System**
  - Session-based authentication
  - Blocks access to protected pages if OTP not verified

- **UI & Design**
  - Responsive Bootstrap 5 design
  - Gradient backgrounds and card layouts
  - Alert messages for success and errors

## How it Works

1. User registers on the form.
2. Server validates input and generates an OTP.
3. OTP is sent via email using PHPMailer.
4. User enters OTP on the verification page.
5. Upon successful verification, the user can log in.
6. Direct access to protected pages is blocked until OTP verification.

## Technologies Used

- PHP  
- PHPMailer (SMTP)  
- HTML5 & CSS3  
- Bootstrap 5  
- Regex for input validation  
- Session-based authentication  

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/MahmudulHasanArif14/Web-Form-Authentication-With-SMTP.git
   composer install


