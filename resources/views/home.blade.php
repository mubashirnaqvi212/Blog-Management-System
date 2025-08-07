<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Home - My Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #f9fafb, #e5e7eb);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        a {
            text-decoration: none;
            color: #2563eb;
            transition: color 0.3s;
        }

        nav a {
            margin-left: 10px;
            padding: 8px 16px;
            font-weight: 600;
            border-radius: 6px;
            transition: background-color 0.3s;
            text-decoration: none;
            color: white;
        }
        .btn-login {
            background-color: #2563eb;
        }
        .btn-login:hover {
            background-color: #1e40af;
        }
        .btn-signup {
            background-color: #10b981;
        }
        .btn-signup:hover {
            background-color: #047857;
        }
        .btn-dashboard {
            background-color: #2563eb;
        }
        .btn-dashboard:hover {
            background-color: #1e40af;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 30px 40px;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            max-width: 800px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            color: #1d4ed8;
            font-size: 28px;
            font-weight: bold;
        }

        .posts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .post-card {
            border: 1px solid #d1d5db;
            border-radius: 12px;
            padding: 20px;
            background: #fafafa;
            box-shadow: 0 4px 8px rgb(0 0 0 / 0.05);
            display: flex;
            flex-direction: column;
        }

        .post-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .post-excerpt {
            color: #4b5563;
            flex-grow: 1;
            margin-bottom: 12px;
        }

        .post-image {
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .read-more {
            font-weight: 600;
            color: #2563eb;
        }

        @media(max-width: 600px) {
            .posts {
                grid-template-columns: 1fr;
            }
            .container, header {
                padding: 20px;
            }
        }

        footer {
            margin-top: 40px;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <h1>Content Management System</h1>
    <nav>
        @guest
            <a href="{{ route('login') }}" class="btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn-signup">Signup</a>
        @else
            <a href="{{ route('dashboard') }}" class="btn-dashboard">Dashboard</a>
        @endguest
    </nav>
</header>

<div class="container">
    @if ($posts->isEmpty())
        <p style="text-align:center; color:#6b7280;">No posts published yet.</p>
    @else
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post-card">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image">
                    @endif
                    <div class="post-title">{{ $post->title }}</div>
                    <div class="post-excerpt">{{ \Illuminate\Support\Str::limit($post->body, 100) }}</div>
                    <a href="{{ route('posts.show', $post->id) }}" class="read-more">Read More</a>

                </div>
            @endforeach
        </div>
    @endif

    @auth
    <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
        @csrf
        <button type="submit" style="background:none; border:none; color:#2563eb; cursor:pointer;">
            Logout
        </button>
    </form>
    @endauth
</div>

<footer>
    &copy; {{ date('Y') }} My Blog. All rights reserved.
</footer>

</body>
</html>
