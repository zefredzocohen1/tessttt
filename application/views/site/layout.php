<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php $this->load->view('site/head'); ?>
</head>
<body>
<div id="wrapper">
    <header>
        <?php $this->load->view('site/header'); ?>
    </header>
    <?php if (isset($temp) && !empty($temp)) {
        $this->load->view($temp, isset($data) ? ($data) : NULL);
    } ?>
    <footer>
        <?php $this->load->view('site/footer'); ?>
    </footer>
</div>
</body>