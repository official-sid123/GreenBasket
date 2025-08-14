<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenBasket - Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes strengthMeter {
            0% { width: 0%; }
            100% { width: var(--strength); }
        }
        
        .strength-meter {
            --strength: 0%;
            animation: strengthMeter 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen p-5">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                <span class="text-green-700">Green</span><span class="text-green-500">Basket</span>
            </h1>
            <p class="text-gray-600 mt-2">Join our eco-friendly community</p>
        </div>
        
      <form action="{{route('users.saveregister')}}" method="POST" id="registrationForm" class="space-y-6">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
        <input type="text" id="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" placeholder="Enter your full name" name="name" required>
        <p id="name-error" class="mt-1 text-sm text-red-600 hidden">Please enter a valid name</p>
    </div>
    
    <!-- Mobile Field -->
    <div>
        <label for="mobile" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
        <input type="tel" id="mobile" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" placeholder="Enter your mobile number" name="phone" required>
        <p id="mobile-error" class="mt-1 text-sm text-red-600 hidden">Please enter a valid mobile number</p>
    </div>
    
    <!-- Email Field -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input type="email" id="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" placeholder="Enter your email" name="email" required>
        <p id="email-error" class="mt-1 text-sm text-red-600 hidden">Please enter a valid email address</p>
    </div>
    
    <!-- Role Selection -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Account Type</label>
        <div class="flex space-x-4 mt-2">
            <div class="flex-1">
                <input type="radio" id="user" name="role" value="user" checked class="hidden peer">
                <label for="user" class="block w-full py-3 px-4 text-center rounded-lg border border-gray-300 peer-checked:bg-green-500 peer-checked:text-white peer-checked:border-green-500 cursor-pointer transition">
                    User
                </label>
            </div>
            <div class="flex-1">
                <input type="radio" id="admin" name="role" value="admin" class="hidden peer">
                <label for="admin" class="block w-full py-3 px-4 text-center rounded-lg border border-gray-300 peer-checked:bg-green-500 peer-checked:text-white peer-checked:border-green-500 cursor-pointer transition">
                    Admin
                </label>
            </div>
        </div>
    </div>
    
    <!-- Password Field -->
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" placeholder="Create a password" name="password" required>
        <div class="h-1 bg-gray-200 rounded-full mt-2 overflow-hidden">
            <div id="strength-meter" class="strength-meter h-full" style="background-color: #ef4444;"></div>
        </div>
        <p id="password-error" class="mt-1 text-sm text-red-600 hidden">Password must be at least 8 characters</p>
    </div>
    
    <!-- Confirm Password -->
    <div>
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
        <input type="password" id="confirmPassword" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" placeholder="Confirm your password" name="password_confirmation" required>
        <p id="confirm-error" class="mt-1 text-sm text-red-600 hidden">Passwords do not match</p>
    </div>
    
    <!-- Submit Button -->
    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
        Create Account
    </button>
    
    <!-- Login Link -->
    <div class="text-center text-gray-600 text-sm">
        Already have an account? <a href="{{route('users.login')}}" class="text-green-600 font-semibold hover:underline">Log in</a>
    </div>
</form>
    </div>

    {{-- <script>
        // Basic form validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const name = document.getElementById('name').value;
            const mobile = document.getElementById('mobile').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            // Toggle error messages
            const toggleError = (elementId, show) => {
                document.getElementById(elementId).classList.toggle('hidden', !show);
            };
            
            // Name validation
            toggleError('name-error', name.trim() === '' || name.length < 3);
            if (name.trim() === '' || name.length < 3) isValid = false;
            
            // Mobile validation
            toggleError('mobile-error', !/^\d{10,15}$/.test(mobile));
            if (!/^\d{10,15}$/.test(mobile)) isValid = false;
            
            // Email validation
            toggleError('email-error', !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email));
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) isValid = false;
            
            // Password validation
            toggleError('password-error', password.length < 8);
            if (password.length < 8) isValid = false;
            
            // Confirm password
            toggleError('confirm-error', password !== confirmPassword);
            if (password !== confirmPassword) isValid = false;
            
            if (isValid) {
                // Form is valid, proceed with registration
                alert('Registration successful!');
                // Here you would typically send the data to your server
            }
        });
        
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthMeter = document.getElementById('strength-meter');
            let strength = 0;
            
            // Calculate strength
            if (password.length > 0) strength += 20;
            if (password.length >= 8) strength += 20;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 20;
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;
            
            // Update meter
            strengthMeter.style.setProperty('--strength', strength + '%');
            
            // Update color
            if (strength < 40) {
                strengthMeter.style.backgroundColor = '#ef4444'; // red-500
            } else if (strength < 80) {
                strengthMeter.style.backgroundColor = '#f59e0b'; // amber-500
            } else {
                strengthMeter.style.backgroundColor = '#10b981'; // emerald-500
            }
        });
    </script> --}}
</body>
</html>