<?php

$host = 'localhost'; 
$database = 'courses'; 
$user = 'root'; 
$password = '1234'; 

$mysql = mysqli_connect($host, $user, $password, $database);

$query2 = "SELECT DISTINCT type FROM products";
$result2 = mysqli_query($mysql, $query2) or die("Error " . mysqli_error($mysql));


$query_all = "SELECT * FROM products";
$result_all = mysqli_query($mysql, $query_all) or die("Error " . mysqli_error($mysql));
$num_all = mysqli_num_rows($result_all);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<form  method="_GET">

    <!-- <select name="search"></select> -->
    <input type="search" name="search" placeholder="Search">
    <!-- <button type="submit">Search</button>  -->
    
    <select name="taskOption">
        
<?php

    echo '<option value="' .NULL. '">' . 'All' . '</option>';

    while ($row = mysqli_fetch_assoc($result2)) {
        echo '<option value="' . $row['type'] . '">' . $row['type'] . '</option>';
    }
?>
    </select>
    <input type="submit" value="Submit">

</form>


<?php

//Search по продуктам
// $data = [];
// $total = 0;
// $showed=0;

// $pages = []

$query = $_GET['search'];
$query = trim($query); 
$query = htmlspecialchars($query);

$var = $_GET['taskOption'];

$limit= 3;
$quantity = 4;

$pages = $num_all/$quantity;
$pages = ceil($pages);
// $pages++; 

if ($page > $pages or $page < 1 or !is_numeric($page)) 
    $page = 1;

echo '<br><strong style="color: #CD2626"> Page № ' . $page . ' of '. $pages . '</strong><br /><br />'; 
echo '<strong style="color: #EE3B3B"> Showing ' . $quantity . ' results of '. $num_all . '</strong><br /><br />'; 

if (!isset($list)) 
    $list=0;

$list=--$page*$quantity;

// $result_page = mysqli_query($mysql, "SELECT * FROM products LIMIT $quantity OFFSET $list;");
// $num_result = mysqli_num_rows($result_page);

// for ($i = 0; $i<$num_result; $i++) {
//     $row = mysqli_fetch_array($result_page);
//     echo '<div><strong>' . $row["name"] . '</strong><br />' . 
//     $row["description"] . '</div><br>';
// }




    // if (!empty($query)) { 
    if ($query != NULL) { 

        if (strlen($query) > 30) {
            $text = '<p> Too long search text. </p>';
        }

        else {
        if ($var != NULL){ 
        $q = "SELECT *  FROM `products` 
                WHERE (`name` LIKE '%$query%'
                OR `description` LIKE '%$query%' 
                OR `price` LIKE '%$query%')
                AND `type` LIKE '$var'
                LIMIT $quantity OFFSET $list";
        }

        else{
        $q = "SELECT *  FROM `products` 
                WHERE `name` LIKE '%$query%'
                OR `description` LIKE '%$query%' 
                OR `price` LIKE '%$query%'
                LIMIT $quantity OFFSET $list";         
        }

            $result3 = mysqli_query($mysql, $q);
            

            if (mysqli_affected_rows($mysql) > 0) { 
                $row = mysqli_fetch_assoc($result3); 
                $num = mysqli_num_rows($result3);

                $text = '<p> On request <b>'.$query.'</b> matches found: <b>'.$num.' of '. $num_all.'</b></p>';

                do {
                    // Делаем запрос, получающий ссылки на статьи
                    $q1 = "SELECT * FROM `products` 
                        WHERE `id` = '$row[id]'";
                    $result1 = mysqli_query($mysql, $q1);

                    if (mysqli_affected_rows($mysql) > 0) {
                        $row1 = mysqli_fetch_assoc($result1);
                    }
                    
                    $text .= '<tr><td>'.$row['name'].'</td><td>'.$row['description'].'</td><td>'.$row['price'].'$'.'</td><td>'.$row['created'].'</td><td>'.$row['updated'].'</td><td>'.$row['type'].'</td><tr>';
                    

                } while ($row = mysqli_fetch_assoc($result3)); 
                echo "<table><tr><th>Name</th><th>description</th><th>price</th><th>created</th><th>updated</th><th>type</th></tr>";
                echo $text;
                echo "</table>";
            } 
            else 
                echo $text = '<p> Nothing found on your request.</p>';

        } 
    }
    else{

        if ($var != NULL) {
            $query = "SELECT * FROM products WHERE `type` = '$var' LIMIT $quantity OFFSET $list";
            //$query = "SELECT * FROM products WHERE price NOT LIKE '321'";

            $result = mysqli_query($mysql, $query) or die("Error " . mysqli_error($mysql)); 

            if($result) {
                $rows = mysqli_num_rows($result); // количество полученных строк
                echo "<table><tr><th>Id</th><th>Name</th><th>description</th><th>price</th><th>created</th><th>updated</th><th>type</th></tr>";
                
                for ($i = 0 ; $i < $rows ; ++$i)  {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                        for ($j = 0 ; $j < 7 ; ++$j) 
                            echo "<td>$row[$j]</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                 
                // очищаем результат
                mysqli_free_result($result);
            }
        }

        else {
            $query = "SELECT * FROM products LIMIT $quantity OFFSET $list";
            //$query = "SELECT * FROM products WHERE price NOT LIKE '321'";

            $result = mysqli_query($mysql, $query) or die("Error " . mysqli_error($mysql)); 

            if($result) {
                $rows = mysqli_num_rows($result); // количество полученных строк
                echo "<table><tr><th>Name</th><th>description</th><th>prise</th><th>created</th><th>prise</th><th>type</th></tr>";
                
                for ($i = 0 ; $i < $rows ; ++$i)  {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                        for ($j = 1 ; $j < 7 ; ++$j) 
                            echo "<td>$row[$j]</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                 
                // очищаем результат
                mysqli_free_result($result);
            }    
        }
}




echo '<br>'.'Pages: ';
if ($page>=1) {

    // Значение page= для первой страницы всегда равно единице, 
    // поэтому так и пишем
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=1"><<</a> &nbsp; ';

    // Так как мы количество страниц до этого уменьшили на единицу, 
    // то для того, чтобы попасть на предыдущую страницу, 
    // нам не нужно ничего вычислять
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . $page . 
    '">< </a> &nbsp; ';
}

$that = $page+1;

// Узнаем с какой ссылки начинать вывод
$start = $that-$limit;

// Узнаем номер последней ссылки для вывода
$end = $that+$limit;

// Выводим ссылки на все страницы
// Начальное число $j в нашем случае должно равнятся единице, а не нулю
for ($j = 1; $j<$pages; $j++) {

    // Выводим ссылки только в том случае, если их номер больше или равен
    // начальному значению, и меньше или равен конечному значению
    if ($j>=$start && $j<=$end) {

        // Ссылка на текущую страницу выделяется жирным
        if ($j==($page+1)) echo '<a href="' . $_SERVER['SCRIPT_NAME'] . 
        '?page=' . $j . '"><strong style="color: #df0000">' . $j . 
        '</strong></a> &nbsp; ';

        // Ссылки на остальные страницы
        else echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . 
        $j . '">' . $j . '</a> &nbsp; ';
    }
}

if ($j>$page && ($page+2)<$j) {

    // Чтобы попасть на следующую страницу нужно увеличить $pages на 2
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($page+2) . 
    '"> ></a> &nbsp; ';

    // Так как у нас $j = количество страниц + 1, то теперь 
    // уменьшаем его на единицу и получаем ссылку на последнюю страницу
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($j-1) . 
    '">>></a> &nbsp; ';
}


mysqli_close($mysql);

?>

</body>
</html>
