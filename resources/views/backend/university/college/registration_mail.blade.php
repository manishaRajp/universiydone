<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    <div class="card">
        <div class="top"><span>Hello {{ $clg_mail['name'] }}</span>
            <div class="bottom">
                <p> Your Registration Done </p>
                <h5>Here Your Login Information</h5>
                <h6>Email:-{{ $clg_mail['email'] }}</h6>
                <h6>Password:-{{ $clg_mail['password'] }}</h6>
            </div>
            <div class="wrapper">
                <a href="{{ route('college.login')}}">Go click For Login!</a>
            </div>
        </div>
    </div>
</body>

</html>
