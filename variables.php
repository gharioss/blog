<?php session_start(); ?>
<?php
try {
    // On se connecte à MySQL
    $db = new PDO('mysql:host=localhost;dbname=blog_php;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// show posts
if (isset($_SESSION['IS_LOGGED'])) {
    $stmt1 = $db->prepare("SELECT id_post, title, content, pseudo FROM post LEFT JOIN users ON post.id_users = users.id_users WHERE post.id_users = $_SESSION[IS_LOGGED] ORDER BY post.id_post DESC");
    $stmt1->execute();
}

// insert in posts
if (isset($_REQUEST['submit'])) {
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];

    $stmt2 = $db->prepare("INSERT INTO post (title, content, id_users) VALUES(:title, :content, :id_users)");
    $stmt2->bindParam(':title', $title);
    $stmt2->bindParam(':content', $content);
    $stmt2->bindParam(':id_users', $_SESSION['IS_LOGGED']);
    $stmt2->execute();

    // $smst3 = $mysqlClient->prepare("INSERT INTO $_SESSION[theme] (messages, currentDate, id_users) VALUES (:message, now(), :id_users)");
    //         // $smst3->bindParam(':theme',$_SESSION['theme']);
    //         $smst3->bindParam(':message', $msg);
    //         $smst3->bindParam(':id_users', $_SESSION['IS_LOGGED']);
    //         $smst3->execute();
    //     }
    header('Location: main.php?info=added');
    exit();
}

// select post where clicked
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $stmt3 = $db->prepare("SELECT * FROM post WHERE id_post = $id");
    $stmt3->execute();
}

//update a certain post
if (isset($_REQUEST['update'])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];

    $stmt4 = $db->prepare("UPDATE post SET title = :title, content = :content WHERE id_post = $id");
    $stmt4->bindParam(':title', $title);
    $stmt4->bindParam(':content', $content);
    $stmt4->execute();

    header('Location: main.php?info=updated');
    exit();
}

// delete a certain post
if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];

    $stmt3 = $db->prepare("DELETE FROM post WHERE id_post = $id");
    $stmt3->execute();

    header('Location: main.php?info=deleted');
    exit();
}

//register
if (isset($_REQUEST['register'])) {
    $email = $_REQUEST['email'];
    $pseudo = $_REQUEST['pseudo'];
    $pwd = $_REQUEST['password'];
    $age = $_REQUEST['age'];
    $encrypt_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt5 = $db->prepare("INSERT INTO users (pseudo, email, password, age) VALUES(:pseudo, :email, :password, :age)");
    $stmt5->bindParam(':pseudo', $pseudo);
    $stmt5->bindParam(':email', $email);
    $stmt5->bindParam(':password', $encrypt_pwd);
    $stmt5->bindParam(':age', $age);
    $stmt5->execute();
    $id = $db->lastInsertId();
    $_SESSION['IS_LOGGED'] = $id;
    $_SESSION['username'] = $pseudo;

    header('Location: main.php');
    exit();
}

//login
if (isset($_REQUEST['login'])) {
    $pseudo = $_REQUEST['pseudo'];
    $pwd = $_REQUEST['password'];

    $stmt6 = $db->prepare("SELECT pseudo, password, id_users FROM users WHERE pseudo = :pseudo");
    $stmt6->bindParam(':pseudo', $pseudo);
    $stmt6->execute();
    $user = $stmt6->fetchAll();

    if (isset($user[0]) && $user[0]["password"] == password_verify($pwd, $user[0]["password"]) && $user[0]["pseudo"] == $pseudo) {
        $_SESSION['IS_LOGGED'] = $user[0]['id_users'];
        $_SESSION['username'] = $pseudo;

        header('Location: main.php');
        exit();
    }
}
// select post where clicked
if (isset($_SESSION['IS_LOGGED'])) {
    $stmt7 = $db->prepare("SELECT id_post, title, content, pseudo FROM post LEFT JOIN users ON post.id_users = users.id_users WHERE post.id_users != $_SESSION[IS_LOGGED]  ORDER BY post.id_post DESC");
    $stmt7->execute();
}

if (isset($_REQUEST['writeComment'])) {
    $comment = $_REQUEST['comment'];
    $id_post = $_REQUEST['id'];

    $stmt8 = $db->prepare("INSERT INTO comment (comments, id_users, id_post) VALUES(:comment, :id_users, :id_post)");

    $stmt8->bindParam(':comment', $comment);
    $stmt8->bindParam(':id_users', $_SESSION['IS_LOGGED']);
    $stmt8->bindParam(':id_post', $id_post);
    $stmt8->execute();
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $stmt9 = $db->prepare("SELECT id_comment, comment.id_users, comments, pseudo FROM comment LEFT JOIN users ON comment.id_users = users.id_users WHERE comment.id_post = $id ORDER BY id_comment DESC");
    $stmt9->execute();
}


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $stmt10 = $db->prepare("SELECT * FROM comment WHERE id_comment = $id");
    $stmt10->execute();
}
//update a certain post
if (isset($_REQUEST['updateComment'])) {
    $id = $_REQUEST['id'];
    $comment = $_REQUEST['comment'];

    $stmt11 = $db->prepare("UPDATE comment SET comments = :comment WHERE id_comment = $id");
    $stmt11->bindParam(':comment', $comment);
    $stmt11->execute();

    header('Location: main.php?info=updatedC');
    exit();
}
if (isset($_REQUEST['deleteC'])) {
    $id = $_REQUEST['idd'];

    $stmt3 = $db->prepare("DELETE FROM comment WHERE id_comment = $id");
    $stmt3->execute();

    header('Location: main.php?info=updatedC');
    exit();
}
if (isset($_REQUEST['search'])) {
    $search = $_REQUEST['searchBar'];

    $stmt12 = $db->prepare("SELECT * FROM post INNER JOIN users ON users.id_users = post.id_users WHERE users.pseudo LIKE '$search%' ORDER BY post.id_post DESC");
    $stmt12->execute();
}
