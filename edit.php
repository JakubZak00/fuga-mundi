<?php 
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $name = $_POST['first_name'];
    $title = $_POST['title']; 
    $content = $_POST['content'];

    $sql = "UPDATE `item` SET `name`='$name',`title`='$title',`content`='$content' WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    if($result){
        header("Location: forum.php?msg=Post edytowany pomyślnie");
    }else{
        echo "Błąd: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Świat    Motoryzacji</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f1e285ca4f.js" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bar" style="background-color: #212529;">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img
                    src="https://swiatmotoryzacji.com/wp-content/themes/newscustom-child/images/logo_pl.svg"
                    alt="Świat Motoryzacji" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#Article">Artykuły</a></li>
                    <li class="nav-item"><a class="nav-link" href="forum.php">Forum</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Eksperci</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="text-center mt-5">
            <h3>Edytuj post</h3>
            <p class="text-muted">Edytuj informację i kliknij zmień</p>
        </div>
        <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM `item` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vh; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Imię</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $row['name'] ?>">
                    </div>

                </div>
                <div class="mb-3">
                        <label class="form-label">Tytuł:</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>"
                </div>
                <div class="mb-3">
                        <label class="form-label">Treść:</label>
                        <textarea type="text" class="form-control" name="content" ><?php echo $row['content'] ?></textarea>
                </div>
                <div>
                    <button type= "submit" class="btn btn-success" name="submit">Zmień</button>
                    <a href="forum.php" class="btn btn-danger">Anuluj</a>
                </div>
            </form>
        </div>

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>