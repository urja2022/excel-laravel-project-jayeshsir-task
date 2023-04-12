<!DOCTYPE html>
<html>

<head>
    <title>Excel Laravel Demo</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        
        <div class="card bg-light mt-3">
            
            <div class="card-header">
                Export Excel Data
            </div>
            <div class="card-body">
                <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Post Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                            placeholder="Please Enter Post Title">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Post description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"
                            placeholder="Please Enter Post Description"></textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btnUpload" class="custm-btn btn-primary">Submit</button>
                    </div>
                    <div id="app">
                        @include('flash-message')
                        @yield('content')
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
