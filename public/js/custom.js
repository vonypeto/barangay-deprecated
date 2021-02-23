/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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


jQuery(document).ready(function($){
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
})

function alertOne() {
    alertNumber("one");
}


window.onload = function() {

$(document).ready(function() {
  $('#resident_table').DataTable( {
      "pagingType": "full_numbers"
  } );
} );

}


function filterGlobal () {
  $('#resident').DataTable().search(
      $('#global_filter').val()
  ).draw();
}

function filterschedule () {
    $('#table_schedule').DataTable().search(
        $('#global_filter').val()
    ).draw();
  }
  function filterunschedule () {
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






  //$('div.table-container').load(url)




$(document).ready(function() {

    $('#sampsle').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 5,
        ajax:{

            url: '{{ route("sample.index") }}'
        },columns: [
        {
            data: 'action',
            name: 'action',
            orderable:false
        },

        { data: 'lastname',
          name: 'lastname',
        }]

    });


    var table = $('#sample').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('sample.index') }}",
        columns: [
            {data: 'action', name: 'action', orderable: false, searchable: false},

            {data: 'lastname', name: 'lastname'},

        ]
    });
    //$('resident').DataTable().ajax.reload();
/*



    var table = $('#resident').DataTable({
        sDom: 'lrtip',
        "ajax" : {
            "url" : "{{ route('resident') }}",
            "type" : "GET",
            "dataType" :"dataType: 'json'"
        },"columns" : [ {


            "defaultContent" : "<a href='#' class='btn btn-primary btn-xs pr-4 pl-4'><i class='fa fa-folder fa-lg'></i>  </a><a href='#' class='btn btn-info btn-xs pr-4 pl-4'><i class='fa fa-pencil fa-lg'></i> </a>"
        },{"data" : "lastname"
        },{"data" : "firstName"
        }, {"data" : "middlename"
       }, {"data" : "alias"
        }, {"data" : "civilstatus"

        }, {"data" : "mobile_no"
        }, {"data" : "birthday"
        }, {"data" : "gender"
        }, {"data" : "voterstatus"
        } ],
        "sDom": 'lfrtip'

    });
*/



  $('#table_unschedule').DataTable({sDom: 'lrtip'});
  $('#table_schedule').DataTable({sDom: 'lrtip'});
  $('#table_today').DataTable({sDom: 'lrtip'});
  $('#settled').DataTable({sDom: 'lrtip'});
 $('input.global_filter').on( 'keyup click', function () {
      filterGlobal();
      filterschedule();
      filterunschedule();
      filterscheduletoday();
      filtersettled();
  } );

  $('#manage_account').DataTable();
/*
$('#ressident').DataTable({
  searching: false,
  paging: true,
  global_filter: true,
  globalSearching: true,
  info: true,
  initComplete: function () {
    $('input.global_filter').on( 'keyup click', function () {
      filterGlobal();
  } );


  }


});
*/
 // $('#resident').DataTable({
 // searching: true,
 // paging: true,
 // info: true});


 $('#official').DataTable();

 $('#region').DataTable();













 $("#residentform").submit(function(e) {
  e.preventDefault();

  var action_url = '';
  action_url = '{{route(resident.add) }}';

  $.ajax({
    url: action_url,
    method: "POST",
    data:$(this).serialize(),
    dataType:"json",
    success:function(data){
        alert("saved");
        var html = '';
        if(data.errors){
            alert("saved");
            html = '<div class="alert alert-danger">';

        }
        if(data.success){
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


} );

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







window.onload = function(){

  const dropdownshow = document.querySelector("#dropdown-btns");

  if(dropdownshow.classList.contains('active')){

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

   var xvent =document.getElementById('schedule').style.display = "block";
   //xvent.evt.currentTarget.className = " active";


  }

  $('#resident-modal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })





