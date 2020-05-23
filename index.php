<?php
$errors = [];
$first_name = isset($_GET['first_name'])?$_GET['first_name']:'';
if (isset($_GET['last_name'])){
    $last_name = $_GET['last_name'];
    if ($last_name == ''){
        $errors[] = 'نام خانوادگی را وارد کنید';
    }
}else{
    $last_name = '';
};
if (isset($_GET['gender'])){
    $gender =  $_GET['gender'];
}else{
    $gender = false;
};
if (empty($gender) && isset($_GET['last_name'])){
    $errors[] = 'جنسیت انتخاب نشده است';
}


$fav_musics = isset($_GET['musics']);
$fav_movies = isset($_GET['movies']);
$fav_sports = isset($_GET['sports']);

if (empty($fav_musics) && empty($fav_movies) &&empty($fav_sports) && isset($_GET['last_name'])){
    $errors[] = 'حداقل یک علاقه مندی وارد کنید';
}

$city = isset($_GET['city'])?$_GET['city']:'';

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Forms</title>
</head>
<body>
    <div class="container">
        <?php
        if (count($errors) > 0) {
            echo "<ul class='list-group'>";
            foreach ($errors as $error) {
                echo "<li class='list-group-item list-group-item-danger'>$error</li>";
            }
            echo "</ul>";
        }
        ?>
        <form class="form">
            <h1 class="text-center m-4">Advance Form</h1>
            <div class="mt-3 mb-3">
                <label for="first_name">First Name: </label>
                <input id="first_name" name="first_name" type="text" value="<?= $first_name ?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="last_name">Last Name: </label>
                <input id="last_name" name="last_name" type="text" value="<?= $last_name ?>">
            </div>
            <div>
                <label for="male">Male</label>
                <input id="male" type="radio" name="gender" value="male" <?php if ($gender == 'male'){echo 'checked';} ?> >
            </div>
            <div>
                <label for="female">Female</label>
                <input id="female" type="radio" name="gender" value="female" <?php if ($gender == 'female'){echo 'checked';} ?>>
            </div>
            <div>
                <h3>Favorite</h3>
                <label for="musics">Musics</label>
                <input type="checkbox" name="musics" value="1" id="musics" <?= $fav_musics == 1?'checked':''; ?> >

                <label for="movies">Movies</label>
                <input type="checkbox" name="movies" value="1" id="movies" <?= $fav_movies == 1?'checked':''; ?>>

                <label for="sports">Sports</label>
                <input type="checkbox" name="sports" value="1" id="sports" <?= $fav_sports == 1?'checked':''; ?>>
            </div>
            <div>
                <select name="city" id="city" class="custom-select">
                    <option <?= $city == 'shiraz'? 'selected':''; ?>  value="shiraz">Shiraz</option>
                    <option <?= $city == 'tehran'? 'selected':''; ?>  value="tehran">Tehran</option>
                    <option <?= $city == 'tabriz'? 'selected':''; ?>  value="tabriz">Tabriz</option>
                </select>
            </div>
            <button class="btn btn-success mb-3 mt-3">Send</button>
        </form>
    </div>
    <!--script-->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>