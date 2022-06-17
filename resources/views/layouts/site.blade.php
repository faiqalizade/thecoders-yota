<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{asset("js/vue.js")}}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <div class="content">
                <header class="p-3 bg-dark text-white">
                    <div class="container">
                        <div class="d-flex flex-wrap align-items-center">
                            <a href="{{ route('home')}}" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none me-5">
                                The Coders Commentator
                            </a>

                            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

                            </ul>

                            <div class="text-end">
                                <button type="button" @click="clearData" id="header-add-comment-btn" data-toggle="modal" data-target="#addComment" class="btn btn-outline-light me-2">Add Comment</button>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container">
                    @yield('content')
                </div>
            </div>

            @include('components.modals.add-comment')
            <div class="footer">

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('js/axios.js')}}"></script>
    <script type="module" src="{{asset('js/app.js')}}"></script>
</body>
</html>
