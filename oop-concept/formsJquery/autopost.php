<html>
<head>
</head>
<body>
<p>Change the contents of the text field and 
then tab away from the field
to trigger the change event. Do not use
Enter or the form will get submitted.</p>
<form id="target">
  <input type="text" name="one" value="Hello there" 
     style="vertical-align: middle;"/> 
     <img id="spinner" src="https://media0.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.webp?cid=ecf05e47hsac3jme61ta8r8c94j3j8izof94e4pm802gsb2z&rid=giphy.webp&ct=g" alt="" height="300px" width="300px" style="display:none">
</form>
<hr/>
<div id="result"></div>
<hr/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</script>
<script type="text/javascript">
  $('#target').change(function(event) {
    $('#spinner').show();
    var form = $('#target');
    var txt = form.find('input[name="one"]').val();
    window.console && console.log('Sending POST');
    $.post( 'autoecho.php', { 'val': txt },
      function( data ) {
          window.console && console.log(data);
          $('#result').empty().append(data);
          $('#spinner').hide();
      }
    ).error( function() { 
      $('#target').css('background-color', 'red');
      alert("Dang!");
	});
  });
</script>
</body>
