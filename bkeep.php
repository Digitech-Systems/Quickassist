<?php include("html-head.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
        $("#AddNewModal").modal('show');

});
</script>
</head>
<body>

<nav id="myNavbar" class="navbar navbar-default navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="quick-home.php">Quick Assist</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="quick-home.php">Home</a></li>
                    <li><a role="button" data-toggle="modal" data-target="#AddNewModal">Add</a></li>
                    
                   
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $user['uname']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Settings</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav><!--end of titel nav bar-->




<!-- Add New Modal -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <form action="pbook-add.php" method="post" enctype="multipart/form-data" role="form"  class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Create New Ledger</h4>
        </div>
        <div class="modal-body">
       
<fieldset>
<div class="form-group">
            <label class="control-label col-xs-4" >Transaction Type</label>
            <div class="col-xs-8">
            <input type="date" value="<?php echo $GLOBALS['dates']['today'];?>" name="tran-date" id="tran-date" class="form-control">
            </div>
          </div><!--end of form group-->

<div class="form-group">
            <label class="control-label col-xs-4" >Transaction Type</label>
            <div class="col-xs-8">
            <input type="date" value="<?php echo $GLOBALS['dates']['today'];?>" name="tran-date" id="tran-date" class="form-control">
            </div>
          </div><!--end of form group-->


</fieldset>

        </div>
        <!--end of modal body-->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="submit" Value="Add" class="btn btn-primary" />
        </div>
        <!--end of modal footer-->
      </form>
    </div>
    <!--end of modal content--> 
  </div>
</div><!--end of add new modal-->
<?php include("html-footer.php"); ?>
