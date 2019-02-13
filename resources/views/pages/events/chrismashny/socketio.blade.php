<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>   
    <script>
        var socket = io.connect(':44301', {secure: true});
        socket.on('cards', function(msg){
          console.log(msg)
        });
    </script>
</body>
</html>