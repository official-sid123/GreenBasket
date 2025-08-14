<!-- Contact Modal -->
@extends('welcome')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us | GreenBascet</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background: #f9f9f9;
            }

            .contact-header {
                background: #4CAF50;
                color: white;
                padding: 30px 0;
                text-align: center;
            }

            .contact-container {
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }

            .contact-options {
                flex: 1;
                min-width: 300px;
            }

            .contact-card {
                background: white;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .contact-card h3 {
                color: #4CAF50;
            }

            .contact-form {
                flex: 1;
                min-width: 300px;
                background: white;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            .form-group textarea {
                height: 120px;
            }

            .submit-btn {
                background: #4CAF50;
                color: white;
                border: none;
                padding: 12px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            .social-links {
                display: flex;
                gap: 15px;
                margin-top: 20px;
            }

            .social-links a {
                color: #4CAF50;
                font-size: 24px;
            }

            .faq-item {
                margin-bottom: 10px;
            }

            .faq-question {
                font-weight: bold;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class="contact-header">
            <h1>Contact GreenBascet</h1>
            <p>We're here to help! Reach out for support, feedback, or business inquiries.</p>
        </div>

        <div class="contact-container">
            <!-- Left Side: Contact Options -->
            <div class="contact-options">
                <div class="contact-card">
                    <h3><i class="fas fa-phone-alt"></i> Call Us</h3>
                    <p>Customer Support: <strong>+91 9876543210</strong></p>
                    <p>Business Inquiries: <strong>+91 9876543211</strong></p>
                </div>

                <div class="contact-card">
                    <h3><i class="fas fa-envelope"></i> Email Us</h3>
                    <p>Support: <strong>support@greenbascet.com</strong></p>
                    <p>Business: <strong>business@greenbascet.com</strong></p>
                </div>

                <div class="contact-card">
                    <h3><i class="fas fa-comment-dots"></i> Live Chat</h3>
                    <p>Chat with us on WhatsApp:</p>
                    <a href="https://wa.me/918208904409" target="_blank"
                        style="background: #25D366; color: white; padding: 10px 15px; border-radius: 5px; display: inline-block; margin-top: 10px;">
                        <i class="fab fa-whatsapp"></i> Chat Now
                    </a>
                </div>

                {{-- <div class="contact-card">
        <h3><i class="fas fa-map-marker-alt"></i> Visit Us</h3>
        <p><strong>GreenBascet Headquarters</strong></p>
        <p>123 Green Valley, Mumbai, India - 400001</p>
        <div style="margin-top: 15px; height: 200px; background: #eee; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
          [Google Maps Embed Here]
        </div>
      </div> --}}
                <div class="contact-card">
                    <h3><i class="fas fa-map-marker-alt"></i> Visit Us</h3>
                    <p><strong>GreenBascet Headquarters</strong></p>
                    <p>123 Green Valley, Mumbai, India - 400001</p>
                    <div style="margin-top: 15px; height: 200px; border-radius: 5px; overflow: hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.526070251382!2d72.83384697492765!3d19.06561935244554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ceda14d2b4af%3A0xc030f7ec1ed5a87a!2sMumbai%20Central!5e0!3m2!1sen!2sin!4v1723488301957!5m2!1sen!2sin"
                            width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>


            </div>

            <!-- Right Side: Contact Form -->
            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" required>
                            <option value="">Select an option</option>
                            <option>Order Issue</option>
                            <option>Product Feedback</option>
                            <option>Business Inquiry</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Attach File (Optional)</label>
                        <input type="file" id="attachment">
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>

                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="contact-container" style="margin-top: 0;">
            <div class="contact-card" style="flex: 100%;">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-item">
                    <div class="faq-question">How do I track my order?</div>
                    <div class="faq-answer">You can track your order from the "My Orders" section in your account.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">What is your return policy?</div>
                    <div class="faq-answer">We accept returns within 7 days of delivery. Visit our Returns page for details.
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Form Submission
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Thank you! Your message has been sent. We will contact you soon.');
                this.reset();
            });

            // FAQ Toggle
            document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', () => {
                    const answer = question.nextElementSibling;
                    answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
                });
            });
        </script>
    </body>

    </html>
@endsection
