/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // resident show table
    var table = $('.resident-table').DataTable({
        processing: true,
        dom: 'lrtip',
        serverSide: true,
        ajax: config.routes.resident,
        columns: [{
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },{data: 'resident_id',name: 'resident_id', "visible": false,
            },{data: 'lastname',name: 'lastname'
            },{data: 'firstname',name: 'firstname'
            },{data: 'middlename',name: 'middlename'
            },{data: 'alias',name: 'alias'
            },{data: 'civilstatus',name: 'civilstatus'
            },{data: 'mobile_no',name: 'mobile_no'
            },{data: 'birthday',name: 'birthday'
            },{data: 'gender',name: 'gender'
            },{data: 'voterstatus',name: 'voterstatus'
            },
            
            ]
    });
    $('#createresident').click(function() {
        $('#submit').val("create-resident");
        $('#lastname').val('Last Name');
        $('#residentform').trigger("reset");
        $('#modelHeading').html("Create Resident Data");
        $('#residentmodal').modal('show');
    });
    $('body').on('click', '.editResident', function() {
        var resident_id = $(this).data('id');
        $.get(config.routes.resident + '/' + resident_id + '/edit', function(data) {
            $('#modelHeading').html("Modify Resident Data");
            $('#submit').val("Edit Resident");
            $('#residentmodal').modal('show');
            $('#resident_id').val(data.id);
            $('#lastname').val(data.lastname);
      
          //  $('#author').val(data.author);
        })
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        $(this).html('Save');
        $(this).html('Submit');


        $.ajax({
            data: $('#residentform').serialize(),
            url: config.routes.resident_store,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                $('#residentmodal').modal('hide');
                $('#residentform').trigger("reset");
               
                table.draw();

            },
            error: function(data) {
                console.log('Error:', data);
                
                $('#submit').html('Save Changes');
            }
        });
    });

    $('body').on('click', '.deleteresident', function () {
       
        var book_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: config.routes.resident_store +'/'+book_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});




var dropdown = document.getElementsByClassName("#dropdown-btns");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}


jQuery(document).ready(function($) {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
})




function filterGlobal() {
    $('.resident-table').DataTable().search(
        $('#global_filter').val()
    ).draw();
}

function filterschedule() {
    $('#table_schedule').DataTable().search(
        $('#global_filter').val()
    ).draw();
}

function filterunschedule() {
    $('#table_unschedule').DataTable().search(
        $('#global_filter').val()
    ).draw();
}

function filterscheduletoday() {
    $('#table_today').DataTable().search(
        $('#global_filter').val()
    ).draw();
}

function filtersettled() {
    $('#settled').DataTable().search(
        $('#global_filter').val()
    ).draw();
}


$(document).ready(function() {



    $('#table_unschedule').DataTable({
        sDom: 'lrtip'
    });
    $('#table_schedule').DataTable({
        sDom: 'lrtip'
    });
    $('#table_today').DataTable({
        sDom: 'lrtip'
    });
    $('#settled').DataTable({
        sDom: 'lrtip'
    });
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
        filterschedule();
        filterunschedule();
        filterscheduletoday();
        filtersettled();
    });

    $('#manage_account').DataTable();


    $('#official').DataTable();

    $('#region').DataTable();




    $("#residentform").submit(function(e) {
        e.preventDefault();

        var action_url = '';
        action_url = '{{route(resident.add) }}';

        $.ajax({
            url: action_url,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                alert("saved");
                var html = '';
                if (data.errors) {
                    alert("saved");
                    html = '<div class="alert alert-danger">';

                }
                if (data.success) {
                    console.log("saved");
                    alert("saved");
                    $('#resident').DataTable().ajax.reload();

                }
            }


        });

    });


    /*

     $.ajax({
       type: "POST",
       url: "/resident/add",
       data: $('#residentform').serialize(),
       success: function(response){
         console.log(response)
         alert("Data Saved");
         $('#residentmodal').modal('hide');
       //  table.DataTable().ajax.reload();

       },
       error: function(error){
       //  $('#residentmodal').modal('hide');

         console.log(error)
         alert("Data Not Saved");
         $('#resident').DataTable().ajax.reload();

       }


     });

    */


});

function schedules(evt, settle) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {


        tabcontent[i].style.display = "none";

    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(settle).style.display = "block";
    evt.currentTarget.className += " active";
}




window.onload = function() {

    const dropdownshow = document.querySelector("#dropdown-btns");

    if (dropdownshow.classList.contains('active')) {

        dropdownshow.style.display = "block";



    }



    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    var xvent = document.getElementById('schedule').style.display = "block";
    //xvent.evt.currentTarget.className = " active";


}

$('#resident-modal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})