<html>

<head>
    <h1>CodeIgniter 3</h1>
</head>

<body>
    <h2>Welcome to CI 3 Form Helper!</h2>
    <?php
    // echo form_open(action: 'home/login');
    // echo form_open_multipart(action: 'home/login', attributes: 'method="get"');
    // $myarr = array('type' => 'text', 'name' => 'name', 'class' => 'myclass');
    // echo form_input($myarr);

    // $option = array('one' => 'one', 'two' => 'two');
    // echo form_dropdown('myoption', $option, 'two', array('class' => 'myclass'));

    // $textarea = array('name' => 'mytextarea', 'value' => '', 'class' => 'myclass', 'rows' => 4, 'columns' => 5, 'placeholder' => 'Enter here...');
    // echo form_textarea($textarea);

    // $checkbox = array('name' => 'mycheckbox', 'value' => '1', 'checked' => true, 'class' => 'myclass');
    // echo form_checkbox($checkbox);

    // echo form_radio('radioname', 'male', true);
    // echo form_radio('radioname', 'female', false);

    // echo form_submit('mysubmit', 'My First Form');
    // echo form_upload('myfilename');
    // echo form_close();
    ?>
    <?php echo validation_errors(); ?> 
    <?php echo form_open_multipart(action: 'home/user') ?>
    <input type="text" value="fullName" placeholder="Enter your full name:">
    <input type="text" value="email" placeholder="Enter your email:">
    <input type="password" value="password" placeholder="Enter your password:">
    <input type="password" value="confpassword" placeholder="Confirm your password:">

    <!-- <input type="file" name="myimg"> -->
    <button type="submit">Submit</button>
    <?php echo form_close(); ?>
</body>

</html>