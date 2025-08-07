<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fafb;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        h1 {
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        p {
            color: #374151;
            line-height: 1.6;
        }

        a.back-link {
            display: inline-block;
            margin-top: 30px;
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
        @endif

        <p>{{ $post->body }}</p>

        <a href="{{ url()->previous() }}" class="back-link">⬅ Back</a>
    </div>
</body>
</html>
