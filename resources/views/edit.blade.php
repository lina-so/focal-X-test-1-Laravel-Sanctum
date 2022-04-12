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
            @foreach ($book as $item)
            <form  action="{{route('book.update',$item->id)}}" method="POST" enctype="multipart/form-data">
					    @csrf
                        @method('PUT')
                        <div class="Box">
                        <input type="text" value="{{$item->title}}" name="title">
                        </div>
                        <div class="Box">
                            <input type="text"value="{{$item->author}}" name="author">
                        </div>
                        <div class="Box">
                            <input type="text" value="{{$item->description}}" name="description">
                        </div>
                        <div>
                        <button type="submit">update</button>
                    </div>
                    
                </form>
                @endforeach
            </div>
        </div>
	</div>


</body>
</html>