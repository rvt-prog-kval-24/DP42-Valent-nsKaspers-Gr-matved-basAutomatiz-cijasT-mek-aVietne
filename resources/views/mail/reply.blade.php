<!DOCTYPE html>
<html>
<head>
    <title>answer</title>
</head>
<body>
<h1>Hello, {{ $question->email }}</h1>

<p>Your question:</p>
<p>{{ $question->question_text }}</p>

<p>On your question I can get for you next answer:</p>
<p>{{ $response }}</p>

<p>With best wishes,<br>
    {{ config('app.name') }}</p>
</body>
</html>
