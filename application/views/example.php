<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?php echo base_url();?>">
<title><?php echo isset($meta_title)?htmlspecialchars($meta_title):''; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/jquery-ui.theme.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/styles.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/responsive.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/bookroom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/listroom.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/postnews.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/login.css"/> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/animate.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/fotorama.css"> <!-- 3 KB -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/fill-price-jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/fill-price-jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/style3.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/datepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/site/css/style-pannel.css">
<link rel="stylesheet" type="text/css" href="<?php base_url();?>public/site/css/book.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php base_url();?>public/site/css/widget_embed_191.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    var url = "<?php echo base_url();?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/fotorama.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/starview.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/site/js/jquery.query-object.js"></script>
<!--<script type="text/javascript" src="<?php //echo base_url();?>public/site/js/web.js"></script>-->
<form>
    
</form>

<a href="#myModal" role="button" class="btn btn-custom" data-toggle="modal">Open Contact Form</a>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Contact Form</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal bv-form" id="contactform" name="commentform" method="post" action="your_php_file" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" novalidate="novalidate">
               <div class="form-group has-feedback has-error">
                    <label class="control-label col-md-4" for="first_name">First Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" data-bv-notempty="" data-bv-notempty-message="You're required to fill in a first name!" data-bv-field="first_name"><i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="first_name" style=""></i>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="first_name" data-bv-result="INVALID" style="">You're required to fill in a first name!</small></div>
                </div>
                <div class="form-group has-feedback has-error">
                    <label class="control-label col-md-4" for="last_name">Last Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" data-bv-notempty="" data-bv-notempty-message="You've forgotten to provide your last name!" data-bv-field="last_name"><i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="last_name" style=""></i>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="last_name" data-bv-result="INVALID" style="">You've forgotten to provide your last name!</small></div>
                </div>
                <div class="form-group has-feedback has-error">
                    <label class="control-label col-md-4" for="email">Email Address</label>
                    <div class="col-md-6">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" data-bv-notempty="" data-bv-notempty-message="An email address is mandatory" data-bv-field="email"><i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="email" style=""></i>
                    <small class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="VALID" style="display: none;">Please enter a valid email address</small><small class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="INVALID" style="">An email address is mandatory</small></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="comment">Question or Comment</label>
                    <div class="col-md-6">
                        <textarea rows="6" class="form-control" id="comments" name="comments" placeholder="Your question or comment here"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" value="Submit" class="btn btn-custom pull-right" id="send_btn" disabled="disabled">Send</button>
                    </div>
                </div>
            </form>
        </div><!-- End of Modal body -->
        </div><!-- End of Modal content -->
        </div><!-- End of Modal dialog -->
    </div>
<script>
$('#contactform').bootstrapValidator();
</script>