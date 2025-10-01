<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shortlink Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        input {
            padding: 8px;
            width: 300px;
        }

        button {
            padding: 8px 12px;
        }

        .link {
            margin-top: 20px;
        }

        .message {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Create ShortLink</h1>
    <form method="POST" action="/links">
        @csrf
        <input type="text" name="original_url" placeholder="Input URL" required>
        <button type="submit">Create link</button>
    </form>

    @if (session('message'))
    <div class="message" style="color: blue; margin-top: 10px;">
        {{ session('message') }}
    </div>
    @endif

    @if(session('shortlink'))
    <div class="link">
        <p>Short Link:</p>
        <a href="{{ session('shortlink') }}" class="shortlink">{{ session('shortlink') }}</a>
    </div>
    @endif

    <div id="redirect-message" class="message" style="display:none;"></div>

    <script>
        const link = document.querySelector('.shortlink');
        const message = document.getElementById('redirect-message');

        if (link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.href;

                window.location.href = url;
                
            });
        }
    </script>
</body>

</html>