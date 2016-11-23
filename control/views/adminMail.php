<?php
/**
 * @author maher
 * @copyright 2012
 */
 
 

?>





<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-summernote/summernote.css">
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->


	
			

<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						 Widget settings form goes here
					</div>
					<div class="modal-footer">
						<button type="button" class="btn blue">Save changes</button>
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		<?php echo $title?>
		</h3>
		<!-- END PAGE HEADER-->












            <div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Fill our the following form:
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							
                            <form method="get" action=""  class="form-horizontal">
                                <div class="form-body">
                                <input type="hidden" name="p" value="userMail" />
                                    <div class="form-group ">
										<label class="control-label col-md-3">User Group 
										</label>
										<div class="col-md-6">
											<select class="form-control" name="type">
                                                <option value="">All Users Group</option>
                                                <?php foreach($types as $type){ ?>
                                                <option value="<?php echo $type['id']?>" <?php if($_GET['type'] == $type['id']){echo 'selected=""';} ?>><?php echo $type['name']?></option>
                                                <?php } ?>
            								</select>
                                        </div>
                                        <div class="col-md-2">
                                        <input type="submit" value="Filter"  class="btn green" />
                                        </div>
									</div>
                                </div>
                            </form>
                            
                            <form action="" method="post" class="form-horizontal">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<?php if($success){ ?>
                                    <div class="alert alert-success display">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<?php } ?>
                                    
                                    
                                    
                                    
                                    <div class="form-group <?php if($errors['to']){ ?>has-error<?php } ?>">
										<label class="control-label col-md-3">Name <span class="required">
										* </span>
										</label>
										<div class="col-md-8">
											<textarea cols="40" class="form-control"  name="to"><?php if($default['to']){ echo $default['to']; }else{ echo $emailsInString; }?></textarea>
										    <?php if($errors['to']){ ?>
                                            <span class="help-block">Please correct the error </span>
            							    <?php } ?>
                                        </div>
									</div>
                                    
                                    
                                    <div class="form-group <?php if($errors['subject']){ ?>has-error<?php } ?>">
            							<label class="control-label col-md-3" >Title <span class="required">
            							* </span></label>
            							<div class="col-md-8">
            								<input type="text" name="subject" class="form-control" value="<?php if($default['subject']){ echo $default['subject']; }else{ echo SITE_NAME;}?>" class="input" />
            								<?php if($errors['subject']){ ?>
                                            <span class="help-block">Please correct the error </span>
            							    <?php } ?>
                                        </div>
            						</div>
                                    
                                    
                                    <div class="form-group <?php if($errors['message']){ ?>has-error<?php } ?>">
            							<label class="control-label col-md-3" >Message <span class="required">
            							* </span>
                                        </label>
            							<div class="col-md-8">
            								<textarea class="wysihtml5 form-control" rows="8" name="message"><?php echo $default['message']?></textarea>
                                            <?php if($errors['message']){ ?>
                                            <span class="help-block">Please correct the error </span>
            							    <?php } ?>
            							</div>
            						</div>
                                    
                                    
									
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<input type="submit" class="btn green" value="Submit" />
											<input type="reset" class="btn default" value="Reset" />
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
                            
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>























</div>
</div>


<script>

var FormValidation = function () {

    // basic validation
    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    name: {
                        required: true
                    },mobile: {
                        required: true
                    },email: {
                        required: true,
                        email: true
                    },password: {
                        required: true
                    },type: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },
                /*
                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                }
                */
            });


    }




    return {
        //main function to initiate the module
        init: function () {

            handleValidation1();

        }

    };

}();


jQuery(document).ready(function() {   
ComponentsEditors.init();
});

/*

rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    number: {
                        required: true,
                        number: true
                    },
                    digits: {
                        required: true,
                        digits: true
                    },
                    creditcard: {
                        required: true,
                        creditcard: true
                    },
                    occupation: {
                        minlength: 5,
                    },
                    select: {
                        required: true
                    },
                    select_multi: {
                        required: true,
                        minlength: 1,
                        maxlength: 3
                    }
*/

</script>
<!-- END JAVASCRIPTS -->



			


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/components-editors.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

















