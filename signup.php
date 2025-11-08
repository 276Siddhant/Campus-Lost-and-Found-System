<?php
// D:\Xampp\htdocs\FP\signup.php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: /FP/index.php"); 
    exit();
}
// INCLUDE THE STATS FILE
// FIX: Using db_connect.php (PDO) for consistency
include 'db_connect.php';
include 'get_stats.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Campus Lost & Found - Sign Up</title>
  <link rel="icon" type="image/png" href="static/images/L&F.jpg" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="static/css/signup.css" /> 
  <style>
      .input-group { position: relative; }
      .input-field { width: 100%; padding: 10px 10px 10px 0; font-size: 16px; border: none; border-bottom: 2px solid #ccc; outline: none; transition: border-bottom-color 0.3s; background-color: transparent; }
      /* ADDED: Specific padding for the password field to make room for the icon */
      .input-field.pr-10 { padding-right: 40px; } 
      .input-field:focus { border-bottom-color: #3b82f6; }
      .input-label { position: absolute; top: 10px; left: 0; font-size: 16px; color: #999; pointer-events: none; transition: 0.3s ease all; }
      .input-field:focus ~ .input-label, .input-field:not(:placeholder-shown) ~ .input-label { top: -14px; font-size: 12px; color: #3b82f6; }
      .btn-primary { width: 100%; padding: 10px; background-color: #3b82f6; color: white; border-radius: 6px; font-weight: 600; transition: background-color 0.3s; }
      .btn-primary:hover { background-color: #2563eb; }
      .heading-accent { border-bottom: 3px solid #f97316; display: inline-block; padding-bottom: 2px; }
      #signupMessage { /* New style for error message */ color: red; text-align: center; margin-top: 10px; } 
  </style>
</head>

<body class="h-screen w-screen overflow-hidden bg-gray-100">

  <div class="grid grid-cols-1 md:grid-cols-2 h-screen w-screen">
    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex flex-col items-center justify-center p-6 space-y-10 h-full">
      <div class="flex items-center space-x-4">
        <img src="static/images/sggs.jpg" alt="SGGS Logo" class="w-20 h-20 rounded-full shadow-lg bg-white p-2" />
        <h1 class="text-4xl font-bold">SGGS Campus Connect</h1>
      </div>

      <div class="flex gap-8 mb-8 text-center">
          <div class="p-4 rounded-xl bg-white bg-opacity-20 backdrop-blur-sm shadow-xl border border-white border-opacity-30">
              <p class="text-5xl font-extrabold text-yellow-300"><?php echo htmlspecialchars($total_users); ?></p>
              <p class="text-lg font-semibold mt-1">Total Users</p>
          </div>
          <div class="p-4 rounded-xl bg-white bg-opacity-20 backdrop-blur-sm shadow-xl border border-white border-opacity-30">
              <p class="text-5xl font-extrabold text-green-300"><?php echo htmlspecialchars($resolved_cases); ?></p>
              <p class="text-lg font-semibold mt-1">Cases Resolved</p>
          </div>
      </div>
      
      <div class="flex space-x-16 items-center justify-center">
        <div class="text-center bg-white rounded-2xl shadow-lg p-4">
          <img src="static/images/lost.jpg" alt="Someone lost it" class="w-48 h-48 object-contain" />
          <p class="text-black mt-2 text-center">🔍 Someone lost it</p>
        </div>
        <div class="text-center bg-white rounded-2xl shadow-lg p-4">
          <img src="static/images/found.jpg" alt="Someone found it" class="w-48 h-48 object-contain" />
          <p class="text-black mt-2 text-center">✅ Someone found it</p>
        </div>
      </div>
      <div class="mt-6 text-center px-6">
        <p class="text-lg font-semibold">Let's reconnect them together ✨</p>
      </div>
    </div>

    <div class="flex items-center justify-center h-full p-6 bg-gray-50">
      <div class="form-container animate-fade-in p-8 w-full max-w-md bg-white rounded-xl shadow-2xl text-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center heading-accent">Campus Lost & Found</h2>
        <p class="text-center text-gray-600 mb-6">Create your account</p>

        <form id="signupForm" class="space-y-6">
          <div class="input-group">
            <input type="text" id="newUsername" name="newUsername" required class="input-field peer" placeholder=" " />
            <label for="newUsername" class="input-label">Username</label>
          </div>

          <div class="input-group">
            <input type="email" id="newEmail" name="newEmail" required class="input-field peer" placeholder=" " />
            <label for="newEmail" class="input-label">Email</label>
          </div>

          <div class="input-group relative">
            <input type="password" id="newPassword" name="newPassword" required class="input-field peer pr-10" placeholder=" " />
            <label for="newPassword" class="input-label">Password</label>
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 focus:outline-none" style="top: 50%; transform: translateY(-50%);">
                <svg id="eye-icon-open" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg id="eye-icon-closed" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.14 0 2.222.25 3.228.718M21 12c-1.274 4.057-5.064 7-9.542 7-1.14 0-2.222-.25-3.228-.718m8.056-8.056l-9.9 9.9M21 21l-9.9-9.9" />
                </svg>
            </button>
          </div>
          <button type="submit" class="btn-primary">Create Account</button>

          <p id="signupMessage"></p> <p class="text-center text-sm text-gray-600 mt-2">
            Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Sign in</a>
          </p>
          <p class="text-xs mt-2">
            <a href="home.php" class="text-gray-500 hover:text-gray-700">← Back to Home</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  <script>
    // --- Password Toggle Functionality ---
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('newPassword'); // Corrected ID: newPassword
    const openEye = document.getElementById('eye-icon-open');
    const closedEye = document.getElementById('eye-icon-closed');

    togglePassword.addEventListener('click', function (e) {
        e.preventDefault(); 
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        if (type === 'text') {
            openEye.style.display = 'block';
            closedEye.style.display = 'none';
        } else {
            openEye.style.display = 'none';
            closedEye.style.display = 'block';
        }
    });
    // --- End Password Toggle Functionality ---

    document.getElementById("signupForm").addEventListener("submit", async function(e) {
      e.preventDefault(); 
      
      const newUsername = document.getElementById("newUsername").value;
      const newEmail = document.getElementById("newEmail").value; 
      const newPassword = document.getElementById("newPassword").value;
      const messageElement = document.getElementById("signupMessage");
      messageElement.textContent = "";

      try {
        // *** CRITICAL FIX: Changed URL to pass action as a query parameter ***
        const response = await fetch('/FP/api.php?action=signup', { 
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username: newUsername, email: newEmail, password: newPassword }) 
        });

        const result = await response.json();
        
        if (response.ok) {
            messageElement.textContent = result.message || "Sign up successful!";
            messageElement.style.color = "green";
            // Redirect after successful sign up
            setTimeout(() => {
                window.location.href = "/FP/login.php"; 
            }, 1000);
        } else {
            // Display the specific error message from the API
            messageElement.textContent = result.error || "Sign up failed due to an unknown error.";
            messageElement.style.color = "red";
        }
      } catch (networkError) {
        messageElement.textContent = "NETWORK ERROR: Could not connect to the server. Check XAMPP status.";
        messageElement.style.color = "red";
      }
    });
  </script>
</body>
</html>