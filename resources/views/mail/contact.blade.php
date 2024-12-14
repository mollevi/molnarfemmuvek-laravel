<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission Appeared</title>
</head>
<body>
<h2>Sent by: {{ $data['name'] }}</h2>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Company:</strong> {{ $data['company'] ?? 'Not provided' }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] ?? 'Not provided' }}</p>
<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
</body>
</html>
