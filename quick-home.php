<?php include("html-head.php"); ?>
<style>
#build-main {
	border: 1px solid grey;
}
#board {
	border:0px solid;
margin:auto;
margin-bottom:0px;
margin-top:20px;
width:400px;
height:120px;	

}
#board img {
	height:150px;
	width:400px;
}
#board p {
	text-align:center;
	font-weight:bolder;
	font-size:30px;
	margin-top:-125px;
	
}
}
#build-top {
	height: 20px;
	text-align:center;
	font-size:12px;
	padding:10px;
	}

div.sect {
	height:40px;
	text-align:center;
	font-weight:800;
	width:170px;
	margin:15px 30px;
	}
div.sect:hover {
	opacity:0.6;
}

#build-main {
	
	border:30px ridge #2B60DE;
	border-left:50px solid #157DEC ;
	border-right:50px solid #157DEC;
	width:450px;
	margin:auto;
	border-top-left-radius:40px;
	border-top-right-radius:40px;
}
#build-head {
	border:30px ridge;
	border-left:30px outset;
	border-right:30px inset;
	border-bottom:none;
}
div.dv-icon p {
font-weight:bold;
color: white;
}
#build-bottom{
	border:2px solid grey;
	height:60px;
}
#build-hd {
border:10px green ridge;
height:210px;
border-radius:400px 400px 0px 0px;	
width:450px;
margin:auto;
background-color:#571B7E;
background-image:url(images/wind.jpg);
}
#build-hd1 {
border:10px green ridge;
height:130px;
border-radius:400px 400px 0px 0px;	
width:275px;
margin:70px 80px 0px 80px;
	background-color:#F88017;
	background-image:url(images/wind.jpg);
}
#build-hd1 p {
	text-align:center;
	vertical-align:text-bottom;
	border:0px solid red;
	font-weight:900;
	font-size:26px;
	padding-top:60px;
	color:white;


}
#build-body-a
{
	border-left:60px ridge;
	border-right:60px groove;
	height:445px;
	background-image:url(images/wind-strip.jpg);
	padding-top:20px;
}
body {
	background-color: #E8A317;
	background: radial-gradient(#FFDB58, #FBB917);
}
#build-bottom {

		border:0px solid black;
		padding:0px;
		text-align:center;
}
#gate {
	border-top:20px ridge grey;
	border-right:20px inset grey;
	border-left:20px outset grey;
	}
	#build-bottom #gate button{

		border:2px groove;
	}
	#clock {
		float:right;
			}
</style>
</head>
<body>
<div class=" container-fluid">
<!--
	<div id="build-hd">
          
      <div id="build-hd1" class="col-lg-12  col-md-12 col-sm-12"> 
<p style="vertical-align:text-bottom">
Digitech Systems

</p>
      </div><!--end of build head-->
<!--
    </div> 
-->
<div id="clock"> <embed src="images/analog-simple-white.swf" width="200" height="200"></embed>
<br />
<embed src="images/calculator.swf" width="250" height="250"></embed>
</div><!--end of clock and calculator-->
<div id="board" >
<img src="images/board-1.png" />
<p>Digitech Systems</p>
</div>
  <div id="build-main">
    <div id="build-head">
      <div id="build-top" class="col-lg-12  col-md-12 col-sm-12"></div>
    </div>
    <!--end of building head-->
    
    <div id="build-body">
    	<div id="build-body-a">
    <a href="pbook-home.php">
      <div class="col-md-12 col-sm-12 btn btn-info btn-lg sect">
      <div class="dv-icon"><p>Directory</p></div>
      </div>
    </a>
    <a href="cloud.php">
      <div class="col-md-12 col-sm-12 btn btn-lg btn-info sect">
            <div class="dv-icon"><p>Drive</p></div>
      </div>
      </a>
      <a href="clock.php">
      <div class="col-md-12 col-sm-12 btn btn-info btn-lg sect">
            <div class="dv-icon"><p>Scheduler</p></div>
      </div>
      </a>
      <a href="#">
      <div class="col-md-12 col-sm-12 btn btn-info btn-lg sect">
            <div class="dv-icon"><p>Staff</p></div>
      </div>
      </a>
      <a href="#">
      <div class="col-md-12 col-sm-12 btn btn-info btn-lg sect">
            <div class="dv-icon"><p>Bookmarks</p></div>
      </div>
      </a>
       <br  clear="all"/>       <br  clear="all"/>

             

      <div id="body-bott">
        <div class="col-md-2"></div>
     <div id="gate" class="col-md-8"><button class="btn btn-success btn-md" style="margin-left:-12px;" >Exit</button>
     &nbsp;
<button class="btn btn-danger btn-md" style="margin-right:-20px;" >Exit</button><br clear="all" />
<br clear="all" />
  </div><!--end of gate-->
      <div class="col-md-2"></div>
      </div><!--end of body-bott-->
      </div><!--end of build body a -->
    </div>
    <!--end of build body-->
    <!--<div id="build-bottom" class="col-sm-12">
    <div class="col-md-3"></div>
    
    <div id="gate" class="col-md-6"><button class="btn btn-success btn-md" style="margin-left:-20px;" >Exit</button>
     &nbsp;&nbsp;
<button class="btn btn-danger btn-md" style="margin-right:-20px;" >Exit</button><br clear="all" />
<br clear="all" />
  </div>
	<div class="col-md-3"></div>
    
    </div>
    <!--end of building bottom--> 
    
</div><!--end of main building--> 
<br clear="all" />
</div>
<!--end of container fluid-->

<?php include("html-footer.php");  ?>
