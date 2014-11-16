
<?php 
include("html-head.php");
?>
<script>
$("document").ready(function() {
    

/*$("#num").keypress = function (e) {

	}
*/
$('#num').keypress(function(e){
	var aa = $(this).val();
	var a = aa.substr(0,1);
	a = parseInt(a);

	if (a > 7)
	{	alert("h");
		return false;
	}
		
 	if(e.which == 56){ 
		alert($(this).val().indexOf('.'))
	} // end of function when . is pressed
})

/*$('#num').keypress(function (event) {
	
	
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }

    var text = $(this).val();

    if ((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2)) {
        event.preventDefault();
    }
});
*/}); // end of document.ready
</script>
</head>
<body>
Enter a number from 0.00 to 70.00
<input type="text" maxlength="5" name="num" id="num">

</body>
</html>