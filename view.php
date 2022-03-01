<?php include('variables.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Blog | Index</title>
</head>

<body>
    <?php include(__DIR__ . '/global/header.php'); ?>
    <div class="container">
        <?php foreach ($stmt3 as $i) : ?>
            <div class="bg-dark p-5 rounded-lg text-white text-center mt-5">
                <h1><?php echo $i['title']; ?></h1>

                <?php if ($_SESSION['IS_LOGGED'] == $i['id_users']) : ?>
                    <div class="d-flex mt-2 justify-content-center align-items-center">
                        <a href="edit.php?id=<?php echo $i['id_post']; ?>" class="btn btn-light btn-sm">Edit</a>

                        <form>
                            <input type="text" hidden name="id" value="<?php echo $i['id_post']; ?>">
                            <button class="btn btn-danger btn-sm ml-2" name="delete">Delete</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <p class="mt-5 pl-3"><?php echo $i['content']; ?></p>
        <?php endforeach; ?>

        <form method="POST">
            <div class="mb-3">
                <textarea name="comment" class="form-control" placeholder="Ajouter un commentaire" rows="2"></textarea>
            </div>
            <button name="writeComment" class="btn btn-dark mb-3">Ajouter</button>
        </form>

        <?php foreach ($stmt9 as $i) : ?>
            <p><?php echo $i['pseudo']; ?></p>
            <p><?php echo $i['comments']; ?></p>
            <?php if ($_SESSION['IS_LOGGED'] == $i['id_users']) : ?>
                <div class="d-flex mt-2 justify-content-center align-items-center">
                    <a href="editComment.php?id=<?php echo $i['id_comment']; ?>" class="btn btn-light btn-sm">Edit</a>

                    <form>
                        <input type="text" hidden name="idd" value="<?php echo $i['id_comment']; ?>">
                        <button class="btn btn-danger btn-sm ml-2" name="deleteC">Delete</button>
                    </form>
                </div>
            <?php endif; ?>
            <hr>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>