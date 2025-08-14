<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to GreenBasket</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        /* Header Section */
        .header {
            background-color: #2E7D32;
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .logo span {
            color: #8BC34A;
        }
        
        /* Content Section */
        .content {
            padding: 30px;
        }
        
        .greeting {
            font-size: 20px;
            margin-bottom: 20px;
            color: #2E7D32;
        }
        
        .features {
            margin: 25px 0;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .feature-icon {
            width: 24px;
            height: 24px;
            background-color: #8BC34A;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
        }
        
        /* Button */
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 4px;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }
        
        /* Footer */
        .footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        
        .social-links {
            margin: 15px 0;
        }
        
        .social-link {
            margin: 0 10px;
            color: #4CAF50;
            text-decoration: none;
        }
        
        /* Responsive */
        @media only screen and (max-width: 600px) {
            .container {
                border-radius: 0;
            }
            
            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">Green<span>Basket</span></div>
            <p>Your Eco-Friendly Shopping Partner</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <h2 class="greeting">Welcome, {{ $user->name }}!</h2>
            
            <p>Thank you for joining GreenBasket - where sustainable shopping meets convenience. We're thrilled to have you as part of our green community!</p>
            
            <div class="features">
                <h3>Here's what you can do with your account:</h3>
                
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Shop fresh, organic and locally sourced products</span>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Track your carbon footprint reduction</span>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Get personalized eco-friendly recommendations</span>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Earn GreenPoints with every sustainable purchase</span>
                </div>
            </div>
            
            <p>To get started, explore our marketplace filled with eco-conscious products:</p>
            
            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="btn">Start Shopping Now</a>
            </div>
            
            <p>If you have any questions about our platform or sustainability initiatives, feel free to reply to this email.</p>
            
            <p>Happy Green Shopping!<br>
            <strong>The GreenBasket Team</strong></p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="social-links">
                <a href="#" class="social-link">Facebook</a>
                <a href="#" class="social-link">Instagram</a>
                <a href="#" class="social-link">Twitter</a>
            </div>
            
            <p>© {{ date('Y') }} GreenBasket. All rights reserved.</p>
            <p>Our address: 123 Green Street, Eco City, Earth</p>
            
            <p style="margin-top: 15px; font-size: 11px;">
                <a href="#" style="color: #777;">Privacy Policy</a> | 
                <a href="#" style="color: #777;">Terms of Service</a>
            </p>
            
            <p style="font-size: 11px; margin-top: 10px;">
                If you didn't create an account with us, please <a href="#" style="color: #777;">unsubscribe</a>.
            </p>
        </div>
    </div>
</body>
</html>