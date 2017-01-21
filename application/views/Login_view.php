<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Administrator Login</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/asset_plesir/js/bootstrap.min.js'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/asset_plesir/js/jquery.min.js'); ?>" />
   <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/asset_plesir/css/bootstrap.min.css'); ?>" />
   <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/asset_plesir/css/login.css'); ?>" />
   <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/asset_plesir/js/login.js'); ?>" />
 </head>
 <body>
  <div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row">                
            <div class="iconmelon">
              <img class='logo'  src='<?php echo base_url('assets/asset_plesir/img/logoindstuff.png'); ?>' >
            </div>
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">User Login</div>
            </div>     

            <div class="panel-body" >
              
              
                <?php echo validation_errors(); ?>
                <?php echo form_open('verifylogin'); ?>

                <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="password">
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" value="Login" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Sign in</button> 						
                        </div>
                    </div>

                </form>     
				
            </div>   
			
        </div>  
		

    </div>
</div>

</html>