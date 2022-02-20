<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Form</title>
</head>

<body>

    <?= session()->getFlashdata('error') ?>
    <?= service('validation')->listErrors() ?>

    <?= form_open_multipart('home/upload') ?>
    
    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="upload" />

    </form>



    <!-- <form action=" " method="post" enctype="multipart/form-data">
       
        <input type="file" name="userfile" /> 
        <input type="submit" name="submit" value="Create news item" />
    </form>   -->

</body>

</html>