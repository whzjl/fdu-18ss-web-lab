<?php

    function outputOrderRow($file, $title, $quantity, $price) {
        echo "<tr>";
        echo "<td>";
        echo "<img src='images/books/tinysquare/$file'>";
        echo "</td>";
        echo "<td>";
        echo $title;
        echo "</td>";
        echo "<td>";
        echo $quantity;
        echo "</td>";
        echo "<td>";
        echo "$";
        echo $price;
        echo "</td>";
        echo "<td>";
        echo "$";
        echo $quantity*$price;
        echo "</td>";
        echo "</tr>";
    }
