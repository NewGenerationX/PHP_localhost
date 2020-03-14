<?php

    include("db.php");

    if(isser($_POST['update'])){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $birthDate = $_POST['birthDate'];
        $address = $_POST['address'];
        $job = $_POST['job'];

        $query_name = "UPDATE people SET name = '$name' WHERE id = $id";
        $query_birth_date = "UPDATE people SET birth_date = '$birthDate' WHERE id = $id";
        $query_address = "UPDATE people SET address = '$address' WHERE id = $id";
        $query_job = "UPDATE people SET job = '$job' WHERE id = $id";

        $result_set_name = mysqli_query($connection, $query_name);
        $result_set_birth_date = mysqli_query($connection, $query_birth_date);
        $result_set_address = mysqli_query($connection, $query_address);
        $result_set_job = mysqli_query($connection, $query_job);

        if(!$result_set_name || !$result_set_birth_date || !$result_set_address || !$result_set_job) {

            die("QUERY FAIL" . mysqli_error($connection));

        }

    }

?>