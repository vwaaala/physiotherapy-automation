<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Physiopoint - 404 </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/404.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="text">
  <h1>404</h1>
	<h2>Uh, Ohh</h2>
  <h3>Sorry we cant find what you are looking for 'cuz its so dark in here</h3>
</div>
<div class="torch"></div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script>
    $(document).mousemove(function (event) {
        $('.torch').css({
            'top': event.pageY,
            'left': event.pageX
        });
    });
  </script>

</body>
</html>
