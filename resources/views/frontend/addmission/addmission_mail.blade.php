<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    @dd($adminssionMain)
    <div class="card">
        <div class="top"><span>Hello</span>
            <div class="bottom">
           <p> Your Registration Done </p>
            <h5>Here Admission information</h5>
            <h6>Email:-{{ $adminssionMain['confirmation_type']}}</h6>
            </div>
        </div>
    </div>
</body>
</html>
