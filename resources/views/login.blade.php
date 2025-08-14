<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenBasket - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen p-5">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                <span class="text-green-700">Green</span><span class="text-green-500">Basket</span>
            </h1>
            <p class="text-gray-600 mt-2">Welcome back to our eco-friendly community</p>
        </div>
        
        <form action="{{route('users.validatecredential')}}" method="POST" id="loginForm" class="space-y-6">
            @csrf
            <!-- Email Field -->
            <div>
                <label for="loginEmail" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="" id="loginEmail" class="w-full px-4 py-3 rounded-lg border  focus:ring-2 focus:ring-green-500 focus:border-green-500 transition @error('email') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-green-500  @enderror" placeholder="Enter your email"  name="email" autocomplete="new-email" >
                {{-- <p id="email-error" class="mt-1 text-sm text-red-600 hidden">Please enter a valid email address</p> --}}
                <span class='text-red-500 text-sm mt-1 block'>
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>
            
            <!-- Password Field -->
            <div class="relative">
                <label for="loginPassword" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="" id="loginPassword" class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition pr-10 @error('password') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-green-500  @enderror" placeholder="Enter your password" name="password" autocomplete="new-password" >
                {{-- <i class="fas fa-eye password-toggle" id="togglePassword"></i> --}}
                {{-- <p id="password-error" class="mt-1 text-sm text-red-600 hidden">Password must be at least 8 characters</p> --}}
                <span class='text-red-500 text-sm mt-1 block'>
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </div>
            
            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="#" class="font-medium text-green-600 hover:text-green-500">Forgot password?</a>
                </div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Sign In
            </button>
            
            <!-- Social Login -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>
                
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fab fa-google text-red-500 mr-2"></i> Google
                    </a>
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
                    </a>
                </div>
            </div>
            
            <!-- Registration Link -->
            <div class="text-center text-gray-600 text-sm">
                Don't have an account? <a href="{{route('users.register')}}" class="text-green-600 font-semibold hover:underline">Sign up</a>
            </div>
        </form>
    </div>

    {{-- <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('loginPassword');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
        
        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            // Toggle error messages
            const toggleError = (elementId, show) => {
                document.getElementById(elementId).classList.toggle('hidden', !show);
            };
            
            // Email validation
            toggleError('email-error', !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email));
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) isValid = false;
            
            // Password validation
            toggleError('password-error', password.length < 8);
            if (password.length < 8) isValid = false;
            
            if (isValid) {
                // Form is valid, proceed with login
                alert('Login successful!');
                // Here you would typically send the data to your server
            }
        });
    </script> --}}
</body>
</html>