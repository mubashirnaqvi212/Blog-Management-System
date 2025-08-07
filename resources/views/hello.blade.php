<!DOCTYPE html>
<html>
<head>
    <title>Hello Laravel</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <h1>Hello from Laravel!</h1>
    
    
    <form action="\register" method ="POST">
        @csrf 
        <input type = "text" name="name" placeholder="name"><br><br>
        <input type = "text" name="email" placeholder="Email"><br><br>
        <input type = "text" name="password" placeholder="Password"><br><br><br>

       <button>Register</button>
    </form>
</body>
</html>
