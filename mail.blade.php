<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .user-details {
            margin-top: 20px;
        }

        .user-details p {
            margin: 0;
            line-height: 1.5;
        }

        .user-details strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello</h2>
        <p>You have got an email from: <strong>{{ $name }}</strong></p>
        <div class="user-details">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Subject:</strong> {{ $subject }}</p>
            <p><strong>Message:</strong> {{ $user_query }}</p>
        </div>
        <p>Thanks</p>
    </div>
</body>
</html>
