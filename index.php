<?php
require_once "Car.php";
$car = new Car();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vlad</title>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="post">
    <input type="datetime-local" name="date">
    <input type="submit" value="Поиск дохода"><br>
</form>

<?php
if (isset($_POST["date"])) {
    $car->costInDate($_POST["date"]);
}
?>

<form action="" method="post">
    <input type="text" name="race">
    <input type="submit" value="Поиск автомобиля с меньшим пробегом"><br>
</form>

<?php
if (isset($_POST["race"])) {
    $car->lessRace($_POST["race"]);
}
?>

<form action="" method="post">
    <input type="hidden" name="car">
    <input type="submit" value="Все машины"><br>
</form>

<?php
if (isset($_POST["car"])) {
    $car->carNames();
}
?>
<hr>
<div id="content"></div>
<input type="button" value="Сохранить" onclick="add()">
<input type="button" value="Загрузить" onclick="get()">
</body>
</html>

