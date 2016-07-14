<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php $this->load->view('admin/head_auth'); ?>
</head>
<body class="nobg loginPage">
<div id="wrapper">
    <?php if (isset($temp) && !empty($temp)) {
        $this->load->view($temp, isset($data) ? ($data) : NULL);
    } ?>
<div id="footer">
    <?php $this->load->view('admin/footer_auth'); ?>
</div>
</div>
</body>