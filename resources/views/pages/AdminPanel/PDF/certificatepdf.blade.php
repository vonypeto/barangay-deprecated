<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 </head>
<body class="login-page" style="background: white">



    <div class="row">
        <div class="column-right text-right" >
           <img style="width: 120px" id="logo1create1" class="logo1create1" src="{{  Storage::url($layout->logo_1 ?? 'Logo not set')  }}">
        </div>
        <div class="column-center text-center" >
           <p id="heading2" style='font-size:19px;font-family: "Times New Roman, Times, serif";'> REPUBLIC OF THE PHILIPPINES<br>
              {{ $layout->municipality ?? 'Municipality not set'  }}<br>
              {{ $layout->province ?? 'Province not set'  }}<br>
              <b ><u>   {{ $layout->barangay ?? 'Barangay not set'  }}</u></b>
           </p>
           <div id="punong2" style='font-size:22px;font-family: "Times New Roman, Times, serif";padding:0px'><b>   {{ $layout->office ?? 'Office not set'  }}</b>
           </div>
           <div style='font-size:24px;font-family: "Times New Roman, Times, serif;padding:0px'><u><b>C E R T I F I C A T I O N</b></u>
           </div>
        </div>
        <div class="column-left text-left" >
           <img style="width: 120px" id="logo2create2" class="logo2create" src="http://{{  request()->getHost()}}{{  Storage::url($layout->logo_2 ?? 'Logo not set')  }}">
        </div>
     </div>
     <div class="box">
        <img  id="logobackground2" class="background-opacity text-center" style="height: 450px;margin-left: 30%;margin-top: 40px" src="{{  Storage::url($layout->logo_2 ?? 'background logo not set')  }}">
        <div class="row text">
           <div class="column-body-left text-center " >
              <img id="punongbarangay2" style="width: 120px" src="{{  Storage::url($layout->punongbarangay ?? '2X2 PIC of punong barangay not set')  }}">
              <div class="form-group" style='font-size:16px;font-family: "Times New Roman, Times, serif;'>
                 @if(count($puno))
                 @foreach ($puno as $puno)
                 <p ><b>{{ $puno->name }}</b><br>{{ $puno->position }}</p>
                 @endforeach
                 @endif
                 @if(count($brgy_official))
                 @foreach ($brgy_official as $brgy_official)
                 <p ><b>{{ $brgy_official->name }}</b><br>{{ $brgy_official->position }}</p>
                 @endforeach
                 @endif
              </div>
           </div>
           <div class="column-body-right text-left " style="padding-left:5px">
              <br>
              <br>
              <br>
              <br>
              <span style=" font-size: 17px ; font-family: Arial, Helvetica, sans-serif;"><b>TO WHOM MAY IT CONCERN:</b></span>
              <br>
              <br>
              <br>
              <div >
                 <p style="text-indent: 10px; font-size: 17px ; font-family: Arial, Helvetica, sans-serif; text-align: justify;text-justify: inter-word; padding-right:2px;">
                   THIS IS TO CERTIFY THAT ______________________, _____ years old, ______ and a resident of <span id="firstcontent">THIS IS A TEST :Barangay San Vicente, Sto, Domingo, Albay is known to be a good moral character and law-abiding citizen in the community.</span>
                 </p>
                 <br>
                 <p id="secondcontent">
                     This certification is being issued upon the request of the above-named person for whatever legal purpose it may serve him best.
                 </p>
                 <br>
                 <p >
                    <b> DONE AND ISSUED</b> this  ___ day of _______________ at the <span id="thirdcontent">office of the punong Barangay....</span>
                 </p>
                 <br>
              </div>
              <div class="row">
                 <br>
                 <br>
                 <div class="column-inside-left">
                    &nbsp
                 </div>
                 <div class="text-center column-inside-right " style="font-size: 17px ; font-family: Arial, Helvetica, sans-serif;  ">
                    <span>APPROVE BY:<br></span>
                    @if(count($approve))
                    @foreach ($approve as $approve)
                    <span style="text-transform: uppercase;
                       display: inline-block;">{{ $approve->name }}</span><br><span>{{ $approve->position }}<span>
                    @endforeach
                    @endif
                 </div>
              </div>
              <footer><span><i>***This is a computer-generated document. No signature is required***</i></span></footer>
           </div>
        </div>
     </div>




</body>






</html>

<style>

.box{
        position: relative;
       /* Make the width of box same as image */
    }
    .box .text{
        position: absolute;
        z-index: 999;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 0%; /* Adjust this value to move the positioned div up and down */
        text-align: center;
        width: 100%; /* Set the width of the positioned div */
    }
.background-opacity {
  opacity: 0.5;
  position:absolute;
  display: block;
  margin-left: auto;
  margin-right: auto;

    max-width: 100%;
}
    * {
      box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column-left {
      float: left;
      width: 20%;
      padding: 0px;
      height: 190px; /* Should be removed. Only for demonstration */
    }
    .column-center {
      float: left;
      width:60%;
      padding: 0px;
      height: 190px; /* Should be removed. Only for demonstration */
    }
    .column-right {
      float: left;
      width: 20%;

      height: 190px; /* Should be removed. Only for demonstration */
    }
    .column-body-left {
      float: left;
      width: 33%;

      height: 818px; /* Should be removed. Only for demonstration */
    }
    .column-body-right {
      float: left;
      width: 61%;


      height: 818px; /* 818pxShould be removed. Only for demonstration */
    }

    .column-inside-left {
      float: left;
      width: 60%;

    }
    .column-inside-right {
      float: right;
      width: 40%;

    }
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    </style>

<!----------------
    <div class="container-fluid " style="width:100%">
	<div class="row">


		<div class="col-md-12 text-center">
			<div class="row">

				<div class="col-md-3 text-right">
                    <img  style="width: 100PX"src="{{ url('/logo/logo1.png') }}">


                </div>

				<div class="col-md-6 ">
                    BARANGAY NAME
                </div>

				<div class="col-md-3 text-left">
                    <img  style="width: 100px"src="{{ url('/logo/logo2.png') }}">
                </div>

			</div>
		</div>
    </div>


		<div class="col-sm-12">
			<div class="row">


				<div class="col-sm-4 " >
                    <p>KAGAWAD<p>
                </div>

				<div class="col-sm-8" >
                    <p>LOREM IPSUM<p>
                </div>



			</div>
		</div>

</div>

-->
