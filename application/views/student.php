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

    <?php echo form_open(action: 'crud/newUser') ?>
    <label for="">Full Name:</label>
    <?php
    echo form_input(data: 'fullName', value: '', extra: 'class="myclass"');
    ?> <br><br>
    <label for="">Email:</label>
    <?php
    echo form_input(data: 'email', value: '', extra: 'class="myclass"');
    ?> <br><br>
    <label for="">Password:</label>
    <?php
    echo form_input(data: 'password', value: '', extra: 'class="myclass"');
    ?> <br><br>
    <label for="">Age:</label>
    <?php
    echo form_input(data: 'age', value: '', extra: 'class="myclass"');
    ?> <br><br>
    <?php
    echo form_submit(data: 'mysubmit', value: 'Submit', extra: '');
    ?>
    <?php echo form_close() ?>
</body>

</html>