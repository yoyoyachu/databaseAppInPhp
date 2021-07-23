<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ajax Jquery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>Enter Your Name: </h1>
        <form id="target">       
            <input type="text" name="one" size="60" id="">       
        </form>
        <!-- <img id="spinner" src="https://media0.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.webp?cid=ecf05e47hsac3jme61ta8r8c94j3j8izof94e4pm802gsb2z&rid=giphy.webp&ct=g" alt="" height="300px" width="300px"> -->
        <div id="result"></div>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

        <script type="text/javascript">
            $('#target').change(function(evt){
                var form = $('#target');
                var txt = form.find('input[name="one"]').val();
                console.log('sending POST');
                $.post('data.php',{'val': txt}, 
                    function(data){
                        console.log(data);
                        $('#result').empty().append(data);
                    }
                ).error(function(){
                    alert('Dang!!!');
                });
            });
        </script>
        
    </body>
</html>