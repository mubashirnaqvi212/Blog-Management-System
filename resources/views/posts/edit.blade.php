<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #f9fafb, #e5e7eb);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 40px 30px;
        }

        .form-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #1d4ed8;
            margin-bottom: 24px;
        }

        .error-box {
            background-color: #fee2e2;
            border: 1px solid #fca5a5;
            color: #b91c1c;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            background-color: #f9fafb;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        textarea {
            resize: none;
        }

        input[type="file"] {
            width: 100%;
            font-size: 14px;
        }

        .current-image {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 8px;
            margin-bottom: 20px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .back-btn,
        .submit-btn {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .back-btn {
            background-color: #e5e7eb;
            color: #374151;
        }

        .back-btn:hover {
            background-color: #d1d5db;
        }

        .submit-btn {
            background-color: #2563eb;
            color: white;
            flex-grow: 1;
        }

        .submit-btn:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">✏️ Edit Post</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="body">Post Body</label>
                <textarea name="body" id="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image (Optional)</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>

            @if ($post->image)
                <div>
                    <p style="font-weight: 600; color: #374151;">Current Image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="current-image">
                </div>
            @endif

            <div class="button-group">
                <a href="{{ route('dashboard') }}" class="back-btn">← Back</a>
                <button type="submit" class="submit-btn">💾 Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
