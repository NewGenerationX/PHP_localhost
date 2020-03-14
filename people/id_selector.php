<?php

    include('db.php');

    $id = $_POST['id'];

    if(!empty($id)) {

    $query = "SELECT * FROM people WHERE id LIKE '$id%' ";
    $query_people_info = mysqli_query($connection, $query);

    if(!$query_people_info) {

        die("QUERY FAIL" . mysqli_error($connection));

    }

    while($row = mysqli_fetch_array($query_people_info)) {



        ?>

    <ul>

        <?php

            echo "<li><a rel=".$row['id']." class='displayed-name' href='javascript:void(0)'>{$row['name']}</a></li>";

        ?>

    </ul>

<?php
        }

    }
?>