<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            color: #333;
        }
        .spinner {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }
        h2 {
            margin: 0;
            font-size: 20px;
        }
        p {
            color: #555;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
    <script>
        setTimeout(function(){
            window.location.href = "{{ $url }}";
        }, 3000);
    </script>
</head>
<body>
    <div class="spinner"></div>
    <h2>Redirecting from "{{ $alias }}"...</h2>
    <p>You will be redirected to the landing page in 3 seconds.</p>
</body>
</html>
