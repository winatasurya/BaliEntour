<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
        <div>
            <img src="{{ asset('images/'.session('image')) }}" width="300" />
        </div>
    @endif

    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image">
    </div>

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4"></textarea>
    </div>

    <button type="submit">Upload Image</button>
</form>

</body>
</html>
