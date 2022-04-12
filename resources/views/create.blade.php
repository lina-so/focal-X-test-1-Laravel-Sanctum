<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    
<h1>create book</h1>

    <div class="section1">
        <div class="container2">
            <div class="form1">
                <form  action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="Box">
                        <input type="text" placeholder="title" name="title">
                    </div>
                    <div class="Box">
                        <input type="text"placeholder="author" name="author">
                    </div>
                    <div class="Box">
                        <input type="text" placeholder="description" name="description">
                    </div>
                    <div>
                        <button type="submit">save</button>
                    </div>
                    
                </form>
            </div>
        </div>
	</div>


</body>
</html>