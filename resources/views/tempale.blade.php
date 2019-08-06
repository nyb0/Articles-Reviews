<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ARTICLES') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <title>ARTICLES</title>
</head>
<body>
    <div class="page-box">

        <div class="content">
            @yield('content')
        </div>

        <div class="header">
            <div class="menu">
                <a href="/">ARTICLES</a>
                <a href="#">REGISTRATION</a>
                <a href="#">LOGIN</a>
            </div>
        </div>

        <div class="feedback">
            <h1>COMMENTS</h1>                               

            <div class="add-review">
                <div class="close-form">
                    <img src="{{ asset('storage/images/to_close.png') }}" alt="Close">
                </div>

                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="user-name">
                        <label for="user-name">NAME:</label>
                        <input type="text" name="user-name" id="user-name" placeholder="Enter your name">
                    </div>
                    
                    <div class="email">
                        <label for="email">EMAIL:</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email">
                    </div>

                    <div class="rating">
                        <label>Give your grade:</label>
                        <div class="rate-stars">
                            <input type="radio" name="star" id="star-1" value="1">
                            <label for="star-1" class="star-1">1</label>
                            <input type="radio" name="star" id="star-2" value="2">
                            <label for="star-2" class="star-2">2</label>
                            <input type="radio" name="star" id="star-3" value="3">
                            <label for="star-3" class="star-3">3</label>
                            <input type="radio" name="star" id="star-4" value="4">
                            <label for="star-4" class="star-4">4</label>
                            <input type="radio" name="star" id="star-5" value="5">
                            <label for="star-5" class="star-5">5</label>
                            <span></span>
                        </div>
                    </div>

                    <div class="review-message">    
                        <label for="review-message">Feedback message:</label>
                        <textarea name="review-message" id="review-message" placeholder="Leave your feedback"></textarea>
                    </div>
                        
                    <div class="review-img">
                        <label for="review-img"><span>Add image:</span>
                            <img src="{{ asset('storage/images/upload_file.png') }}" alt="Choose FILE">
                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="review-img" id="review-img">
                        </label>
                    </div>

                    <button type="submit">Leave feedback</button>
                </form>

            </div>

            
        </div>

        <div class="footer"></div>
    
    </div>
	
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>