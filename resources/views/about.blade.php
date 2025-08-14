@extends('welcome')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | GreenBascet</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Global Styles */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
      line-height: 1.6;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    .btn {
      display: inline-block;
      background: #4CAF50;
      color: white;
      padding: 12px 25px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }
    .btn:hover {
      background: #45a049;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1606787366850-de6330128bfc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      height: 400px;
      display: flex;
      align-items: center;
      text-align: center;
      color: white;
    }
    .hero-content h1 {
      font-size: 3rem;
      margin-bottom: 20px;
    }
    .hero-content p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 30px;
    }

    /* Our Story Section */
    .section {
      padding: 80px 0;
    }
    .section-title {
      text-align: center;
      margin-bottom: 50px;
      color: #4CAF50;
      font-size: 2.2rem;
    }
    .story-content {
      display: flex;
      align-items: center;
      gap: 40px;
    }
    .story-text {
      flex: 1;
    }
    .story-image {
      flex: 1;
      border-radius: 10px;
      overflow: hidden;
    }
    .story-image img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* Why Choose Us */
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }
    .feature-card {
      background: white;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: 0.3s;
    }
    .feature-card:hover {
      transform: translateY(-10px);
    }
    .feature-icon {
      font-size: 2.5rem;
      color: #4CAF50;
      margin-bottom: 20px;
    }

    /* Team Section */
    .team {
      background: #f9f9f9;
    }
    .team-members {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }
    .member {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      width: 250px;
      text-align: center;
    }
    .member-image {
      height: 250px;
      overflow: hidden;
    }
    .member-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .member-info {
      padding: 20px;
    }
    .member-info h3 {
      margin: 0 0 5px;
    }
    .member-info p {
      color: #777;
      margin: 0;
    }

    /* Milestones */
    .milestones {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 20px;
    }
    .milestone {
      text-align: center;
    }
    .milestone-number {
      font-size: 2.5rem;
      font-weight: bold;
      color: #4CAF50;
      margin-bottom: 10px;
    }

    /* CTA Section */
    .cta {
      background: #4CAF50;
      color: white;
      text-align: center;
      padding: 60px 0;
    }
    .cta h2 {
      margin-bottom: 30px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .story-content {
        flex-direction: column;
      }
      .hero {
        height: 300px;
      }
      .hero-content h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <!-- Hero Section -->
  <section class="hero">
    <div class="container hero-content">
      <h1>About GreenBascet</h1>
      <p>Delivering farm-fresh groceries to your doorstep since 2023. Our mission is to make healthy eating accessible to everyone.</p>
      <a href="#story" class="btn">Our Story</a>
    </div>
  </section>

  <!-- Our Story Section -->
  <section class="section" id="story">
    <div class="container">
      <h2 class="section-title">Our Story</h2>
      <div class="story-content">
        <div class="story-text">
          <p>Founded in 2023, GreenBascet began as a small initiative to connect local farmers with urban consumers. Our founders, Siddhesh and team, noticed the gap between fresh farm produce and busy city lifestyles.</p>
          <p>Today, we work with over 500 farms across India to bring you the freshest fruits, vegetables, and organic products at competitive prices.</p>
          <p><strong>Our Mission:</strong> To revolutionize grocery shopping by making it convenient, affordable, and sustainable.</p>
        </div>
        <div class="story-image">
          <img src="https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Farmers harvesting">
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="section" style="background: #f9f9f9;">
    <div class="container">
      <h2 class="section-title">Why Choose GreenBascet?</h2>
      <div class="features">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-leaf"></i>
          </div>
          <h3>Farm-to-Table Freshness</h3>
          <p>We source directly from trusted farms to ensure maximum freshness and nutrition.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-truck"></i>
          </div>
          <h3>Fast Delivery</h3>
          <p>Get your order delivered within 24 hours in major cities.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-award"></i>
          </div>
          <h3>100% Organic</h3>
          <p>Wide selection of certified organic products with full traceability.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-undo"></i>
          </div>
          <h3>Easy Returns</h3>
          <p>Not satisfied? We offer no-questions-asked returns within 7 days.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="section team">
    <div class="container">
      <h2 class="section-title">Meet Our Team</h2>
      <div class="team-members">
        <div class="member">
          <div class="member-image">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team Member">
          </div>
          <div class="member-info">
            <h3>Siddhesh</h3>
            <p>Founder & CEO</p>
          </div>
        </div>
        <div class="member">
          <div class="member-image">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team Member">
          </div>
          <div class="member-info">
            <h3>Priya</h3>
            <p>Head of Operations</p>
          </div>
        </div>
        <div class="member">
          <div class="member-image">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Team Member">
          </div>
          <div class="member-info">
            <h3>Rahul</h3>
            <p>Technology Lead</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Milestones Section -->
  <section class="section">
    <div class="container">
      <h2 class="section-title">Our Milestones</h2>
      <div class="milestones">
        <div class="milestone">
          <div class="milestone-number">10,000+</div>
          <div class="milestone-text">Happy Customers</div>
        </div>
        <div class="milestone">
          <div class="milestone-number">500+</div>
          <div class="milestone-text">Partner Farms</div>
        </div>
        <div class="milestone">
          <div class="milestone-number">50+</div>
          <div class="milestone-text">Cities Served</div>
        </div>
        <div class="milestone">
          <div class="milestone-number">24/7</div>
          <div class="milestone-text">Customer Support</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta">
    <div class="container">
      <h2>Ready to Experience Freshness Delivered?</h2>
      <a href="/shop" class="btn" style="background: white; color: #4CAF50;">Shop Now</a>
    </div>
  </section>

  <script>
    // Simple animation for milestones
    document.addEventListener('DOMContentLoaded', function() {
      const milestones = document.querySelectorAll('.milestone-number');
      milestones.forEach(milestone => {
        const target = +milestone.innerText.replace('+', '');
        const increment = target / 20;
        let current = 0;
        
        const timer = setInterval(() => {
          current += increment;
          milestone.innerText = Math.floor(current) + '+';
          if (current >= target) {
            milestone.innerText = target + '+';
            clearInterval(timer);
          }
        }, 50);
      });
    });
  </script>
</body>
</html>
@endsection