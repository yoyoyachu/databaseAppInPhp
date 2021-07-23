<?php
  if ( !isset($_POST['val']) ) return;
  sleep(4);
  echo('registered: '.$_POST['val']);
