$(document).ready(function() {

// will display names and other info on the screen
function updatePeople() {

        $.ajax({
            type: 'POST',
            url: 'display_people.php',
            success: function(show_info) {
                
                $(".people-info").html(show_info);

            }
        });
    }; //end of updateInfo function

    function UpdateId(){

        $.ajax({
            type: 'POST',
            url: "id's for selector.php",
            success: function(data) {

                $("#select-id").html(data);

            }
        });

    };

    // Updates the function displaying people on screen, and the id's in id selector
    function updateInfo(){

        updatePeople()
        UpdateId();

    };

    updateInfo();

    /* the button will switch users from searching by name and by id and the other way around */
    $("#js-btn").click(function() {

        //switches id and name search
        $("#select-name").toggleClass("hide");
        $("#select-id").toggleClass("hide");

        //switches the labels for id and name
        $('#name-label').toggleClass("hide");
        $('#id-label').toggleClass("hide");

        updateInfo();


        if($("#js-btn").hasClass("js-name-btn")) {
            $("#js-btn").removeClass("js-name-btn").val("click here to search by name");
        } else {
            $("#js-btn").addClass("js-name-btn").val("click here to select by id");
        }
    }); // end of js-btn click function

    // searches for matching names on key pressed
    $("#select-name").keyup(function() {

        var nameValue = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'search_people.php',
            data: {nameValue:nameValue},
            success: function(data) {

                $("#searched").html(data);

            }
        });


    });// end of #select-name keyup function

function addPerson(e) {

    e.preventDefault();
    $(".info-input, .info-btn").toggleClass("hide");

}

    $("#add-btn").click(function(e){

        addPerson(e);

    });

    $("#add-person-btn").click(function(e){

        var name = $("#name-input").val();
        var birthDate = $("#birth-date-input").val();
        var address = $("#address-input").val();
        var job = $("#job-input").val();
                
        e.preventDefault();

        

        if(name.length >= 1 && birthDate.length >= 1 && address.length >= 1 && job.length >= 1) {

        $.ajax({
            type: 'POST',
            url: 'add_ppl.php',
            data: {name:name, birthDate:birthDate, address:address, job:job},
            success: function(){

                $(".info-input").val('');
                updateInfo();

            }
        });
        } else {
            alert("you left an empty input, please fill it up!")
        }
    });

    $("#close-btn").click(function(e){

        addPerson(e);
        $(".info-input").val('');


    });

});