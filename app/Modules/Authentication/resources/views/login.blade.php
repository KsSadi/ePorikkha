


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ePorikkha - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366F1;
            --secondary-color: #8B5CF6;
            --accent-color: #C4B5FD;
            --success-color: #10B981;
            --light-color: #F9FAFB;
            --dark-color: #111827;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px 0;
            position: relative;
            overflow-x: hidden;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .login-container {
            max-width: 900px;
            width: 90%;
            display: flex;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            background-color: white;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .login-illustration {
            flex: 1;
            background: linear-gradient(135deg, #EBF4FF 0%, #C3DAFE 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .login-illustration::before {
            content: '';
            position: absolute;
            top: -30%;
            left: -30%;
            width: 160%;
            height: 160%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            animation: pulse 15s infinite alternate;
        }

        .login-illustration img {
            max-width: 100%;
            height: auto;
            position: relative;
            z-index: 2;
            transform: scale(0.9);
            animation: float 6s ease-in-out infinite;
        }

        .login-form-container {
            flex: 1;
            padding: 40px;
            position: relative;
            overflow: hidden;
            min-width: 320px;
        }

        .login-form-container::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, rgba(196, 181, 253, 0.3) 0%, rgba(196, 181, 253, 0.1) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .login-form-container::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2) 0%, rgba(139, 92, 246, 0.1) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }

        .logo-text::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
        }

        .login-header {
            text-align: left;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            margin-top: 15px;
        }

        .login-header h2 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 2.2rem;
            background: linear-gradient(135deg, var(--primary-color) 20%, var(--secondary-color) 80%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-header p {
            color: #6B7280;
            font-size: 1rem;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-control {
            height: 55px;
            border-radius: 12px;
            padding-left: 45px;
            border: 1.5px solid #e1e1e1;
            transition: all 0.3s;
            font-size: 1rem;
            background-color: transparent;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #d0d0d0;
            font-size: 16px;
            transition: all 0.3s;
            z-index: 2;
        }

        .form-control:focus + .form-icon {
            color: var(--primary-color);
            transform: translateY(-50%) scale(1.1);
        }

        .form-label {
            font-weight: 600;
            color: #4B5563;
            margin-bottom: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-group:focus-within .form-label {
            color: var(--primary-color);
        }

        .login-btn {
            height: 55px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
            padding: 0 30px;
            margin-top: 10px;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.6s ease;
            z-index: -1;
        }

        .login-btn::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(0deg, rgba(0,0,0,0.06) 0%, rgba(255,255,255,0) 50%);
            z-index: -2;
        }

        .login-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.5);
            background: linear-gradient(135deg, #5153d4 0%, #7a4fd9 100%);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: scale(0.98);
            box-shadow: 0 2px 10px rgba(99, 102, 241, 0.3);
        }

        .login-btn .btn-icon {
            margin-right: 10px;
            transition: transform 0.3s ease;
            font-size: 1.2rem;
        }

        .login-btn:hover .btn-icon {
            transform: translateX(4px) scale(1.1);
            color: rgba(255, 255, 255, 1);
        }

        .login-btn .btn-text {
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .login-btn:hover .btn-text {
            letter-spacing: 1px;
        }

        .login-btn .btn-loader {
            display: none;
            width: 22px;
            height: 22px;
            border: 2.5px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 0.7s linear infinite;
            margin-right: 12px;
        }

        .login-btn.loading {
            background: linear-gradient(135deg, #5153d4 0%, #7a4fd9 100%);
            cursor: wait;
            pointer-events: none;
            animation: pulse 1.5s infinite;
        }

        .login-btn.loading .btn-text {
            opacity: 0.7;
        }

        .login-btn.loading .btn-icon {
            display: none;
        }

        .login-btn.loading .btn-loader {
            display: inline-block;
        }

        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 6px;
            accent-color: var(--primary-color);
        }

        .remember-me label {
            color: #6B7280;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .forgot-password a {
            color: var(--primary-color);
            font-size: 0.9rem;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 500;
        }

        .forgot-password a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .login-social {
            margin-top: 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-social-divider {
            width: 100%;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            line-height: 0.1em;
            margin: 25px 0 20px;
        }

        .login-social-divider span {
            background: #fff;
            padding: 0 15px;
            color: #6B7280;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        .social-btn {
            border: none;
            border-radius: 12px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s;
            background-color: #f5f5f5;
            color: #333;
        }

        .social-btn.google {
            background-color: #fff;
            color: #DB4437;
            box-shadow: 0 4px 10px rgba(219, 68, 55, 0.15);
        }

        .social-btn.facebook {
            background-color: #fff;
            color: #3b5998;
            box-shadow: 0 4px 10px rgba(59, 89, 152, 0.15);
        }

        .social-btn.apple {
            background-color: #fff;
            color: #000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .signup-link {
            margin-top: 25px;
            text-align: center;
            color: #6B7280;
            font-size: 0.95rem;
        }

        .signup-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signup-link a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
            }
            50% {
                box-shadow: 0 5px 25px rgba(99, 102, 241, 0.7);
            }
            100% {
                box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0) scale(0.9);
            }
            50% {
                transform: translateY(-15px) scale(0.9);
            }
            100% {
                transform: translateY(0) scale(0.9);
            }
        }

        /* Error message styling */
        .error-message {
            color: #EF4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }

        .input-error {
            border-color: #EF4444 !important;
        }

        .input-error + .form-icon {
            color: #EF4444 !important;
        }

        .form-feedback-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            opacity: 0;
            transition: all 0.3s;
        }

        .input-valid + .form-feedback-icon {
            opacity: 1;
            color: var(--success-color);
        }

        /* Toast notification */
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            border-radius: 8px;
            padding: 15px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            transform: translateX(150%);
            transition: transform 0.3s ease-out;
            z-index: 1000;
        }

        .toast-notification.show {
            transform: translateX(0);
        }

        .toast-notification i {
            margin-right: 12px;
            font-size: 18px;
        }

        .toast-notification.error i {
            color: #EF4444;
        }

        .toast-notification.success i {
            color: var(--success-color);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }

            .login-illustration {
                display: none;
            }

            .login-form-container {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .login-container {
                width: 95%;
                padding: 25px;
            }

            .logo-text {
                font-size: 24px;
            }

            .login-header h2 {
                font-size: 1.8rem;
            }

            .login-options {
                flex-direction: column;
                align-items: flex-start;
            }

            .forgot-password {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
<div id="particles-js"></div>

<div class="login-container">
    <div class="login-illustration">
        <img src="https://cdn.jsdelivr.net/npm/@lottiefiles/lottie-player@latest/dist/lottie-player.js" style="display: none;">
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_iorpbol0.json" background="transparent" speed="1" style="width: 100%; height: 300px;" loop autoplay></lottie-player>
    </div>

    <div class="login-form-container">
        <div class="logo-container">
            <div class="logo-text">BA Contest</div>
        </div>

        <div class="login-header">
            <h2>Welcome !</h2>
            <p>Sign in to continue to your contest portal</p>
        </div>

        <form method="POST"  id="loginForm" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <div class="position-relative">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                    <i class="fas fa-user form-icon"></i>
                    <i class="fas fa-check-circle form-feedback-icon"></i>
                </div>
                <div class="error-message" id="email-error">Please enter a valid email</div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="position-relative">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                    <i class="fas fa-lock form-icon"></i>
                </div>
                <div class="error-message" id="password-error">Password must be at least 6 characters</div>
            </div>



            <button type="submit" class="btn login-btn w-100">
                <span class="btn-loader"></span>
                <i class="fas fa-sign-in-alt btn-icon"></i>
                <span class="btn-text">Sign In</span>
            </button>
        </form>
    </div>
</div>

<div class="toast-notification" id="notification">
    <i class="fas fa-exclamation-circle"></i>
    <span id="notification-text">Invalid email or password</span>
</div>

<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    // Initialize particles.js for background effect
    document.addEventListener('DOMContentLoaded', function() {
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    });


    // Show/Hide Password functionality
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const formGroup = passwordField.closest('.form-group');

        // Create toggle button
        const toggleBtn = document.createElement('button');
        toggleBtn.type = 'button';
        toggleBtn.className = 'btn btn-link position-absolute end-0 top-50 translate-middle-y text-decoration-none pe-3';
        toggleBtn.style.zIndex = '5';
        toggleBtn.innerHTML = '<i class="far fa-eye-slash"></i>';
        toggleBtn.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.innerHTML = '<i class="far fa-eye"></i>';
            } else {
                passwordField.type = 'password';
                this.innerHTML = '<i class="far fa-eye-slash"></i>';
            }
        });

        // Append to the form group
        formGroup.querySelector('.position-relative').appendChild(toggleBtn);

        // Input focus effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentNode.parentNode.classList.add('input-focused');
            });
            input.addEventListener('blur', function() {
                this.parentNode.parentNode.classList.remove('input-focused');
            });
        });
    });

    // Add this to your existing script tag
    document.addEventListener('DOMContentLoaded', function() {
        // Get the login form
        const loginForm = document.getElementById('loginForm');

        // Add submit event listener
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Show loading state
            const loginBtn = document.querySelector('.login-btn');
            loginBtn.classList.add('loading');

            // Get form data
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Create AJAX request
            fetch('{{ route("login") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
                .then(response => response.json())
                .then(data => {
                    // Remove loading state
                    loginBtn.classList.remove('loading');

                    if (data.success) {
                        // Show success notification
                        showNotification('Login successful!', 'success');

                        // Redirect based on role
                        setTimeout(() => {
                            window.location.href = data.redirect_url;
                        }, 1000);
                    } else {
                        // Show error notification
                        showNotification(data.message || 'Invalid credentials', 'error');
                    }
                })
                .catch(error => {
                    // Remove loading state
                    loginBtn.classList.remove('loading');
                    showNotification('Login failed. Please try again.', 'error');
                    console.error('Error:', error);
                });
        });

        // Notification function
        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notification-text');

            // Set message and icon
            notificationText.textContent = message;
            notification.className = 'toast-notification ' + type;

            if (type === 'success') {
                notification.querySelector('i').className = 'fas fa-check-circle';
            } else {
                notification.querySelector('i').className = 'fas fa-exclamation-circle';
            }

            // Show notification
            notification.classList.add('show');

            // Hide after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
    });

</script>
</body>
</html>
