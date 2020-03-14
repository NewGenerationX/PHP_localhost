<?php

include('db.php');

$query = "SELECT * FROM people";
$query_people_info = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($query_people_info)) {

    $id = $row['id'];

    echo "<option value='{$id}' class='id-option'>{$id}</option>";

}

?>



<script>
    $(document).ready(function(){
        var id;
        $("#select-id").change(function() {

            id = $(this).val();

            $.ajax({
                type: 'POST',
                url: 'id_selector.php',
                data: {id:id},
                success: function(data){

                    $("#searched").html(data);

                }
            });

        });

    });


</script>