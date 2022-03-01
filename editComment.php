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

    <div class="container mt-5">
        <?php foreach ($stmt10 as $i) : ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" hidden name="id" value="<?php echo $i['id_comment']; ?>">
                    <textarea name="comment" class="form-control" placeholder="Ajouter un commentaire" rows="2"><?php echo $i['comments']; ?></textarea>
                </div>
                <button name="updateComment" class="btn btn-dark mb-3">Ajouter</button>
            </form>
        <?php endforeach; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>