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
$(document).ready(function() {


  $('#resident').DataTable({sDom: 'lrtip'});
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
   xvent.evt.currentTarget.className = " active";


  }
