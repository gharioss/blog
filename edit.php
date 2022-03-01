<?php include('variables.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Blog | Create</title>
</head>

<body>

    <?php include(__DIR__ . '/global/header.php'); ?>
    <?php foreach ($stmt3 as $i) : ?>
        <div class="container mt-5">
            <form method="GET">
                <input type="text" hidden name="id" value="<?php echo $i['id_post']; ?>">
                <input type="text" name="title" placeholder="Blog Title" class="form-control bg-dark text-white my-3 text-center" value="<?php echo $i['title']; ?>">
                <textarea name="content" class="form-control bg-dark text-white my-3"><?php echo $i['content']; ?></textarea>
                <button name="update" class="btn btn-dark">Update</button>
            </form>
        </div>
    <?php endforeach; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>