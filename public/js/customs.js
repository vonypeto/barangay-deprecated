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

