<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php $this->load->view('admin/head'); ?>
</head>
<body>

<div id="wrapper">
    <div id="left_content">
        <div id="leftSide">
            <!--sidebar-->
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
    </div>
    <div id="rightSide">
        <div class="container-fluid">
            <div class="row">
                <div class="topNav">
                    <!--header-->
                    <?php $this->load->view('admin/header'); ?>
                </div>
                <!-- content -->
                <?php 
                    if (isset($temp) && !empty($temp)) {
                        $this->load->view($temp, isset($data) ? ($data) : NULL);
                    } 
                ?>
                <!-- end content -->

                <div class="clear"></div>
                <div class="clear mt30"></div>
                <div id="footer" class="col-md-12">
                    <!-- Footer -->
                    <?php $this->load->view('admin/footer'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(function(){
            $("#titleCheck").change(function() {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
            });
        });
    });
</script>
</body>
</html>
