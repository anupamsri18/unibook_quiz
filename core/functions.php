<?php


function format($result)
{
    $allRows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allRows, $row);
    }
    foreach ($allRows as $data) {
        echo "<article>";
        echo "<a href='itemDetail.php?i=".$data['id']."'><h1>" . $data['item_name'] . "</h1></a>";
        echo "<p>" . $data['summary'] . "</p>";
        echo $data['created_on'];
        echo "</article>";
    }
}

?>