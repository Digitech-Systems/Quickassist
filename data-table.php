<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="DataTables-1.10.3/media/css/jquery.dataTables.css">
<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="DataTables-1.10.3/media/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "ajax": {
            "url": "data/arrays_custom_prop.txt",
            "dataSrc": "demo"
        }
    } );
} );</script>
</head>

<body>

<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>