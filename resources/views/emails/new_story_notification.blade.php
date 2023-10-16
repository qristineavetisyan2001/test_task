<!DOCTYPE html>
<html>
<head>
    <title>New Story Submission</title>
</head>
<body>
<p>Hello Admin,</p>
<p>A new story has been submitted:</p>
<p>Title: {{ $story->title }}</p>
<p>Description: {{ $story->description }}</p>

<p>Click the following link to approve the story:</p>
<p><a href="{{route("link_click",base64_encode($story->id)), $story->admin_approval_token }}">{{$story->admin_approval_token}}</a></p>

<p>Thank you!</p>
</body>
</html>
