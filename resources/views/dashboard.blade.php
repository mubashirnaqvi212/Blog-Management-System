<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #f9fafb, #e5e7eb);
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            color: #1d4ed8;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .create-btn,
        .logout-btn {
            background-color: #2563eb;
            color: white;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .create-btn:hover,
        .logout-btn:hover {
            background-color: #1e40af;
        }

        .post {
            display: flex;
            align-items: center;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            background-color: #f9fafb;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .post-image {
            width: 150px;
            height: 100px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .post-content {
            padding: 16px;
            flex-grow: 1;
        }

        .post-title {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 12px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .edit-btn,
        .delete-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #facc15;
            color: #78350f;
        }

        .delete-btn {
            background-color: #ef4444;
            color: white;
        }

        .edit-btn:hover {
            background-color: #eab308;
        }

        .delete-btn:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">📋 Admin Dashboard</div>
            <div class="button-group">
                <a href="{{ route('posts.create') }}" class="create-btn">➕ Create New Post</a>


                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">🚪 Logout</button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($posts as $post)
            <div class="post">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image">
                @endif

                <div class="post-content">
                    <div class="post-title">{{ $post->title }}</div>

                    <div class="action-buttons">
                        <a href="{{ route('posts.edit', $post->id) }}" class="edit-btn">✏️ Edit</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">🗑️ Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No posts found.</p>
        @endforelse
    </div>
</body>
</html>
