<?php include('variables.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Blog | Main</title>
</head>

<body>
    <?php include(__DIR__ . '/global/header.php'); ?>
    <div class="container mt-5">
        <?php if (isset($_REQUEST['info'])) : ?>
            <?php if ($_REQUEST['info'] == 'added') : ?>
                <div class="alert alert-success" role="alert">
                    This post has been added successfully !
                </div>
            <?php elseif ($_REQUEST['info'] == 'updated') : ?>
                <div class="alert alert-success" role="alert">
                    This post has been updated successfully !
                </div>
            <?php elseif ($_REQUEST['info'] == 'deleted') : ?>
                <div class="alert alert-danger" role="alert">
                    This post has been deleted !
                </div>
            <?php elseif ($_REQUEST['info'] == 'deletedComment') : ?>
                <div class="alert alert-danger" role="alert">
                    This comment has been deleted !
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="text-center">
            <a href="create.php" class="btn btn-outline-dark">+ Create a new post</a>
        </div>
    </div>


    <div class="row">
        <?php foreach ($stmt1 as $i) : ?>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <div class="card text-white bg-dark mt-5">
                    <div class="card-body" style="width: 18rem;">
                        <h5 class="card-title"><?php echo $i['pseudo']; ?></h5>
                        <h5 class="card-title"><?php echo $i['title']; ?></h5>
                        <p class="card-text"><?php echo $i['content']; ?></p>
                        <a href="view.php?id=<?php echo $i['id_post']; ?>" class="btn btn-light">Read more... </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>