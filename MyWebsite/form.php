<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form</title>
      <link rel="stylesheet" href="form.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="includes/loginhandler.inc.php" method="post" class="login">
                  <div class="field">
                     <input type="text" name="loginemail" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="loginpwd" placeholder="Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div>
               </form>
               <form action="includes/signuphandler.inc.php" method="post" class="signup">
                  <div class="field">
                     <input type="text" name="firstname" placeholder="First Name" required>
                  </div>
                  <div class="field">
                     <input type="text" name="lastname" placeholder="Last Name" required>
                  </div>
                  <div class="field">
                     <input type="text" placeholder="Address" required>
                  </div>
                  <div class="field">
                     <input type="text" placeholder="City" required>
                  </div>
                  <div class="field">
                     <input type="text" placeholder="Phone Number" required>
                  </div>
                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="pwd" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Confirm password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>