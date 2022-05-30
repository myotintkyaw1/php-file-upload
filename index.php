<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
if (isset($_POST['submit'])) {

    if (!empty($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_tmp = $_FILES['upload']['tmp_name'];
        $target_dir = "uploads/${file_name}";
        if ($file_size <= 10000000) {
            move_uploaded_file($file_tmp, $target_dir);

            $message = '<p class="text-success">Uploaded file</p>';
        } else {
            $message = '<p class="text-danger">File is too large</p>';
        }
    } else {
        $message = '<p class="text-danger">Please choose a file</p>';
    }
}
100
?>

<body>
    <div class="container">

        <h1 class="mt-3">File Upload with PHP</h1>
        <p class="text-muted">Maximum file size: 10 MB (only imgages & txt files)</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="w-50 mt-3">
            <input type="file" class="form-control mb-3" name="upload">
            <?php echo $message ?? null ?>
            <input type="submit" value="Submit" class="form-control" name="submit">
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>