<?php
  //Path to python script
  $pythonScript = "c:/Xampp/htdocs/newstuffsa-website/admin/adminpy/networkpackets/connection.py";

  //function is used to properly escape the $pythonScript
  $escapedPythonScript = escapeshellarg($pythonScript);

  // Execute command to run Python script in PHP. 
  $command = $escapedPythonScript . ' -c ';
  $output = shell_exec($command);
  echo $output;

  //Path to python script
  $pythonScript = "c:/Xampp/htdocs/newstuffsa-website/admin/adminpy/networkpackets/lengths.py";

  //function is used to properly escape the $pythonScript
  $escapedPythonScript = escapeshellarg($pythonScript);

  // Execute command to run Python script in PHP. 
  $command = $escapedPythonScript . ' -c ';
  $output = shell_exec($command);
  echo $output;