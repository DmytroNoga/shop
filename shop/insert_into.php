<?php

    if (isset($_POST["name"])) {

        $q = "SELECT MAX(`id`) as id FROM `products`";
        $sql = mysqli_query($mysql, $q);    
        $products_id = mysqli_fetch_assoc($sql);
        $product_id = $products_id[id] + 1;
var_dump($product_id);

        $q2 = "INSERT INTO `products` (`name`, `description`, `price`, `type`) 
            VALUES ('" . $_POST['name'] . "', '" . $_POST['description'] . "', '" . $_POST['price'] . "', '" . $_POST['type'] . "')";
        $sql2 = mysqli_query($mysql, $q2);

        // $q .= isset($info['value']) ? ', ' . $info['value'] . ' as value' : '';
        
        if(isset($_POST['core'])) {
            $q3 .= "INSERT INTO `products_core` (`product_id`, `core_id`)";
            $q3 .= " VALUES ( $product_id , '" . $_POST['core'] . "')";
            $sql3 = mysqli_query($mysql, $q3);
        }

        if(isset($_POST['camera'])) {  
            $q4 .= "INSERT INTO `product_camera` (`product_id`, `quality`)";
            $q4 .= " VALUES ( $product_id , '" . $_POST['camera'] . "')";
            $sql4 = mysqli_query($mysql, $q4);
        }

        if(isset($_POST['doors'])) {  
            $q5 .= "INSERT INTO `product_doors` (`product_id`, `count_doors`)";
            $q5 .= " VALUES ( $product_id , '" . $_POST['doors'] . "')";
            $sql5 = mysqli_query($mysql, $q5);
        }

        if(isset($_POST['engine'])) {  
            $q6 .= "INSERT INTO `product_engine` (`product_id`, `engine`";
            $q6 .= isset($_POST['engine_type']) ? ', `engine_type`)' : ')'; 
            // $q4 .= ")";
            $q6 .= " VALUES ( $product_id , '" . $_POST['engine'] . "'";
            $q6 .= isset($_POST['engine_type']) ? ", '" . $_POST['engine_type'] . "')" : ')';
            $sql6 = mysqli_query($mysql, $q6);
        }
// var_dump($_POST['core']);
// var_dump($_POST['photo']);
//         if(isset($_POST['photo'])) {  
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
  
    move_uploaded_file($temp_file, $dirName . $filename);

  var_dump($dirName);
  var_dump($filename);

  }
}
            $delta = '1.jpg';
            $size = 123;
            $path = 'var/www';
            
            $q7 .= "INSERT INTO `product_files` (`product_id`, `delta`, `size`, `path`)";
            
            $q7 .= " VALUES ( $product_id, '$delta', '$size', '$path' )";
            var_dump($q7);
            $sql7 = mysqli_query($mysql, $q7);
            var_dump($sql7);
        // }

        //Если вставка прошла успешно
        if ($sql2) {
            echo "<p>".$_POST['name']." successfully added to the table.</p>";
            if ($sql3)
                 echo "<p>Added sql3!!!</p>";
            if ($sql4)
                 echo "<p>Added sql4!!!</p>";
            if ($sql5)
                 echo "<p>Added sql5!!!</p>";
            if ($sql6)
                 echo "<p>Added sql6!!!</p>";
            if ($sql7)
                 echo "<p>Added sql7!!!</p>";
            else
                echo "<p>ERROR sql7!!!</p>";
        } else {
            echo "<p>ERROR!!!</p>";
        }
    }

?>