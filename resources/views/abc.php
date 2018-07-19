<html>
<head>
    <script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
</head>
<body>
<h1>Hello, <?php echo $name; ?> - <span id="messages"></span> -</h1>
<script>
         console.log("ready!...");

        var socket = io.connect('http://127.0.0.1:8890');
        // socket.on('message', function (data) {
        //     console.log(data);
        //     console.log('123123');
        //     //$("#messages").append("<p>" + data + "</p>");
        // });

</script>
</body>
</html>