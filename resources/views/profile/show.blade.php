@extends('welcome')
@section('content')
    <div class="profile-edit-container">
        <div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h2 class="profile-edit-title">Update Your Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Name:</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email:</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Phone:</label>
                <input type="tel" name="phone" value="{{ auth()->user()->phone ?? '' }}" class="form-input">
            </div>

            <div class="form-group profile-image-group">
                <label class="form-label">Profile Image:</label>
                <div class="image-preview-container">
                    @if (auth()->user()->image_url)
                        <img src="{{ asset('/storage/' . auth()->user()->image_url) }}" 
                            class="current-profile-image">
                    @else   
                        <i class="fas fa-user-circle"></i>
                    @endif

                </div>
                <input type="file" name="profile_image" accept="image/*" class="file-input" id="profileImageUpload">
                <label for="profileImageUpload" class="file-upload-btn">
                    <i class="fas fa-cloud-upload-alt"></i> Choose Image
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="update-btn">
                    <i class="fas fa-save"></i> Update Profile
                </button>
            </div>
        </form>
    </div>

    <style>
        .profile-edit-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-edit-title {
            color: #2e7d32;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .profile-edit-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-weight: 500;
            color: #455a64;
            font-size: 16px;
        }

        .form-input {
            padding: 12px 15px;
            border: 1px solid #cfd8dc;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-input:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
            outline: none;
        }

        .profile-image-group {
            margin-top: 20px;
        }

        .image-preview-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 15px;
            border: 3px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
        }

        .current-profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image-placeholder {
            font-size: 60px;
            color: #bdbdbd;
        }

        .file-input {
            display: none;
        }

        .file-upload-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f5f5f5;
            color: #455a64;
            border: 1px dashed #bdbdbd;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s;
            font-size: 14px;
        }

        .file-upload-btn:hover {
            background-color: #e0e0e0;
            border-color: #9e9e9e;
        }

        .file-upload-btn i {
            margin-right: 8px;
        }

        .update-btn {
            padding: 12px 25px;
            background-color: #2e7d32;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .update-btn:hover {
            background-color: #1b5e20;
        }

        .update-btn i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .profile-edit-container {
                padding: 20px;
                margin: 20px;
            }

            .profile-edit-title {
                font-size: 24px;
            }
        }
    </style>

    <script>
        // Preview image before upload
        document.getElementById('profileImageUpload').addEventListener('change', function(event) {
            const previewContainer = document.querySelector('.image-preview-container');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewContainer.innerHTML = `<img src="${e.target.result}" class="current-profile-image">`;
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
