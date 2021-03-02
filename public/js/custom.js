$(function() {

    var selectAge = document.getElementById("selectAge");
    var contents;
    for (let i = 0; i <= 100; i++) {
        if(i == 0 ){
            if(i == 0 ){

                contents += "<option>-Select Age- </option>";
            }

        }

      contents += "<option>" + i + "</option>";
    }
    selectAge.innerHTML = contents;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //show default datatable
    $('#manage_account').DataTable();
    $('#official').DataTable();
    $('#region').DataTable();
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

    // resident show table
    var table = $('.resident-table').DataTable({
        processing: true,
        dom: 'lrtip',
        serverSide: true,
        ajax: config.routes.resident,
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            },{
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },{data: 'resident_id',name: 'resident_id', "visible": false,
            },{data: 'lastname',name: 'lastname'
            },{data: 'firstname',name: 'firstname'
            },{data: 'middlename',name: 'middlename'


            },{data: 'mobile_no',name: 'mobile_no'

            },{data: 'gender',name: 'gender'

            },
            ]
    });
     //Resident module CreateResident
    $('#createresident').click(function() {
        $('#submit').val("create-resident");
        $('#lastname').val('Last Name');
        $('#residentform').trigger("reset");
        $('#modelHeading').html("Create Resident Data");
        $('#residentmodal').modal('show');

    });

    //Resident module ResidentEdit
    $('body').on('click', '.editResident', function() {


        var resident_id = $(this).data('id');


        $.get(config.routes.resident + '/' + resident_id + '/edit', function(data) {
            $('#modelHeading').html("Modify Resident Data");
            $('#submit').val("Edit Resident");
            $('#residentmodal').modal('show');
            $('#resident_id').val(data.resident_id);
            $('#lastname').val(data.lastname);
            $('#firstname').val(data.firstname);
            $('#middlename').val(data.middlename);
            $('#alias').val(data.alias);
            $('#birthday').val(data.birthday);
            $('#selectAge').val(data.age);
            $('#birthplace').val(data.birth_of_place);
            $('input[name^="gender"][value="'+data.gender+'"').prop('checked',true);
            $('#voterstatus').val(data.voterstatus);
            $('#civilstatus').val(data.civilstatus);
            $('#citizenship').val(data.citizenship);
            $('#telephone').val(data.telephone_no);
            $('#mobile').val(data.mobile_no);
            $('#area').val(data.area);
            $('#height').val(data.height);
            $('#weight').val(data.weight);
            $('#email').val(data.email);
            $('#PAG_IBIG').val(data.PAG_IBIG);
            $('#PHILHEALTH').val(data.PHILHEALTH);
            $('#SSS').val(data.SSS);
            $('#TIN').val(data.TIN);
            $('#spouse').val(data.spouse);
            $('#father').val(data.father);
            $('#mother').val(data.mother);
            $('#address_1').val(data.address_1);
            $('#address_2').val(data.address_2);

          //  $('#author').val(data.author);
        });


    });
    //Resident module viewmodal
    $('body').on('click', '.viewresident', function() {
        var resident_id = $(this).data('id');


        //Blotter table
        $(".blotter-resident").dataTable().fnDestroy();
        var table = $('.blotter-resident').DataTable({
            processing: true,
            dom: 'lrtip',
            serverSide: true,
            ajax: 'resident/person/'+ resident_id +'/blotter',
            columns: [
                {data: 'blotter_id',name: 'blotter_id'

                },

                ],
                success : function(response){
                    var data = JSON.parse(JSON.stringify(response));
                    console.log(data);
                }
        });

       $.get(config.routes.resident + '/' + resident_id + '/edit', function(data) {

            $('#modelHeading').html("View Resident Data");
            $('#submit').val("Edit Resident");
            $('#residentviewmodal').modal('show');
            $('#resident_idv').val(data.resident_id);

            $('#lastnamev').val(data.lastname);


        });

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

        var resident_id = $(this).data("id");

        if (confirm("Are You sure want to delete !")) {
            $.ajax({
                type: "DELETE",
                url: config.routes.resident_store +'/'+resident_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

    //Bulk Delete check all
    $('#check-all').click(function(){
         $('.checkBoxClass').prop('checked', $(this).prop('checked'));
    });
    function validate() {
        alert(1);
        if (document.getElementById('checked').checked) {
            alert("checked");
        } else {
            alert("You didn't check it! Let me check it for you.");
        }
    }
    // Bulk Delete Current Select
    $('#bulkdelete').click(function(e){
        e.preventDefault();

        var total=0;
        $("input:checkbox[name=ids]:checked").each(function(){
            total += 1;
        });


        if (confirm("Number of Data to Delete: " + total)) {
        $("input:checkbox[name=ids]:checked").each(function(){
            var resident_id = $(this).data("id");


           $.ajax({
            type: "DELETE",
            url: config.routes.resident_store +'/'+resident_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

        });
      }

    });

});


//drop down button navbar side
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

//Filter search bar
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
    //
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
        filterschedule();
        filterunschedule();
        filterscheduletoday();
        filtersettled();
    });

    $("#residentforms").submit(function(e) {
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
// Tab Content active
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
//Drop down active navbar side
window.onload = function() {
    const dropdownshow = document.querySelector("#dropdown-btns");
    if (dropdownshow.classList.contains('active')) {
        dropdownshow.style.display = "block"
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



//RESIDENT DATA FILTERS //MODAL
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  }
//Mobile
setInputFilter(document.getElementById("mobile"), function(value) {
    return /^\d*\.?\d*$/.test(value);
  });

/*
//telephone
setInputFilter(document.getElementById("telephone"), function(value) {
  return /^\d*\.?\d*$/.test(value);
});

//Weight
setInputFilter(document.getElementById("PAG_IBIG"), function(value) {
    return /^\d*\.?\d*$/.test(value);
  })
  //Height
setInputFilter(document.getElementById("PHILHEALTH"), function(value) {
    return /^\d*\.?\d*$/.test(value);
  })
  //Mobile
setInputFilter(document.getElementById("SSS"), function(value) {
    return /^\d*\.?\d*$/.test(value);
  })
  //Mobile
setInputFilter(document.getElementById("TIN"), function(value) {
    return /^\d*\.?\d*$/.test(value);
  })

*/

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 45 && charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
