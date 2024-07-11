<html>

<head>
    <title>CRUD</title>
</head>

<body>
    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>

    <?php echo form_open(action: 'crud/updateUser') ?>
    <label for="">Full Name:</label>
    <?php
    echo form_input('fullName', $stdRecord[0]['fullName'], 'class="myclass"');
    echo form_hidden('id', $stdRecord[0]['id'], 'class="myclass"');
    ?> <br><br>

    <label for="">Email:</label>
    <?php echo form_input('email', $stdRecord[0]['email'], 'class="myclass"'); ?> <br><br>

    <label for="">Age:</label>
    <?php echo form_input('age', $stdRecord[0]['age'], 'class="myclass"'); ?> <br><br>

    <?php echo form_submit('myupdate', 'Update', '');
    ?>
    <?php echo form_close() ?>
</body>

</html>