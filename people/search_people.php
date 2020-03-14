<?php

    include('db.php');

    $search = $_POST['nameValue'];

    if(!empty($search)){

    $query = "SELECT * FROM people WHERE name LIKE '$search%' ";
    $search_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($search_query);

    if(!$search_query) {

        die("QUERY FAIL" . mysqli_error($connection));

    }


    if($count >= 1) {

        while($row = mysqli_fetch_array($search_query)) {

            $name = $row['name'];
            $id = $row['id'];

            ?> 

    <ul>

        <?php

            echo "<li><a rel=".$id." class='displayed-name' href='javascript:void(0)'>{$name}</a></li>";

        ?>

    </ul>

<?php
            }

        }
    
    }

?>


<script>

$(document).ready(function() {

    $(".displayed-name").click(function() {

        var id = (this).attr('rel');

        alert(id);

    });

});


</script>