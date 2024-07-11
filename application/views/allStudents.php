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
    <table border="1">
        <tr>
            <td>ID</td>
            <td>FULLNAME</td>
            <td>AGE</td>
            <td>EMAIL</td>
            <td>DATE</td>
            <td colspan="2">ACTIONS</td>
        </tr>
        <?php
        if ($allStudents->num_rows() > 0) :
            foreach ($allStudents->result() as $student) :
        ?>
                <tr>
                    <td> <?php echo $student->id ?> </td>
                    <td> <?php echo $student->fullName ?> </td>
                    <td> <?php echo $student->age ?> </td>
                    <td> <?php echo $student->email ?> </td>
                    <td> <?php echo $student->date ?> </td>
                    <td>
                        <a href="<?php echo site_url(uri: 'Crud/editUser/' . $student->id) ?>">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url(uri: 'Crud/deleteUser/' . $student->id) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <h3>There are no Students.</h3>
        <?php endif; ?>
    </table>
    <br>
    <a href="<?php echo site_url('Crud') ?>">Add Student</a>
</body>

</html>