<DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>


<body>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
      <input type="submit" value="Upload">
  </form>
</body>
</html>

<?php

 $dirName = __DIR__.'/files/';

if (!is_dir($dirName)) 
{
    if (mkdir($dirName, 0777)) 
      echo "$dirName added<br>";
    
    else 
      echo 'Во время выполнения произошла ошибка<br>';
} 

if (!empty($_FILES['images'])) 
{
  foreach ($_FILES['images']['name'] as $delta => $filename) 
  {
    $temp_file = $_FILES['images']['tmp_name'][$delta];
    
    $path_parts = pathinfo($filename);
    $path = __DIR__.'/files/' . $filename;
  
 if(file_exists($path))  {
    
    $result = glob(__DIR__.'/files/' . $path_parts['filename']. '_*.'. $path_parts['extension']);
    $count = count($result);
    $filename = $path_parts['filename']. '_'. $count . '.' . $path_parts['extension'];
  }



  // foreach (glob("$path") as $filename) {
  //   // echo '1';
  //   echo "$filename размер " . filesize($filename) . "\n";
  
  // }
  
    move_uploaded_file($temp_file, $dirName . $filename);

  var_dump($dirName);
  var_dump($filename);

  }
}

// var_dump($path_parts);

// var_dump($path_parts[filename]);

?>