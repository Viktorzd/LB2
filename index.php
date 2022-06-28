<!DOCTYPE HTML>
<html>

<head>
    <title>Lab2</title>
    <script>
        function func1() {
            let key = document.getElementById("carrier").value;
            let value = localStorage.getItem(key);
            document.getElementById("localStorage").innerHTML = value;
        }

        function func2() {
            let key = document.getElementById("actor").value;
            let value = localStorage.getItem(key);
            document.getElementById("localStorage").innerHTML = value;
        }

        function func3() {
            let key = document.getElementById("date").value;
            let value = localStorage.getItem(key);
            document.getElementById("localStorage").innerHTML = value;
        }
    </script>
</head>

<body>
    <h3>Задорожний Віктор. КІУКІу-20-1</h3>
    <form method="GET" action="">
        <p>Фильмы по носителю <select name="carrier" id="carrier" onchange="func1()">
                <?php
                include 'conn.php';
                $carrier = $db->distinct("carrier");

                foreach ($carrier as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
                ?>
            </select>
            <button> ОК </button>
        </p>
    </form>


    <form method="GET" action="">
        <p>Фильмы по актеру<select name="actor" id="actor" onchange="func2()">
                <?php
                include 'conn.php';
                $actor = $db->distinct("actor");

                foreach ($actor as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
                ?>
            </select>
            <button> ОК </button>
        </p>
    </form>


    <form method="GET" action="">
        <p>Фильмы по дате
            <select name="date" id="date" onchange="func3()">
                <?php
                include 'conn.php';
                $carrier = $db->distinct("date");
                foreach ($carrier as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
                ?>
        </p>
        </select>
        <button> ОК </button>
    </form>
<p>Локальное хранилище</p>
<p id="localStorage"></p>
<p>Результат запроса</p>
</body>

</html>

<?php
include "conn.php";
if (isset($_GET['carrier'])) {
    $carrier = $_GET['carrier'];
    $cursor = $db->find(['carrier' => $carrier]);
    $result = "<p>Носитель - $carrier" . ": </p>";
    $result .= "<table border =1>";
    $result .= "<tr><th>Жанр</th><th>Актеры</th><th>Фильм</th><th>Дата выпуска</th><th>Страна</th><th>Карьер</th></tr>";
    foreach ($cursor as $document) {
        $film = $document['title'];
        $genre = $document['genre'];
        $date = $document['date'];
        $country = $document['country'];
        $carrier = $document['carrier'];
        $actor = $document['actor'];
        if (is_object($genre)) {
            $genre = (array)$genre;
            $genre = (implode(',</br> ', $genre));
        }
        if (is_object($actor)) {
            $actor = (array)$actor;
            $actor = (implode(',</br> ', $actor));
        }
        $result .= "<tr><td>$genre</td><td>$actor</td><td>$film</td><td>$date</td><td>$country</td><td>$carrier</td></tr>";
    }
    $result .= "</table>";
    echo ($result);
    echo "<script>localStorage.setItem('$carrier', '$result')</script>";
}
if (isset($_GET['actor'])) {
    $actor = $_GET['actor'];
    $key = $actor;
    $cursor = $db->find(['actor' => $actor]);
    $result = "<p>Актер $actor" . ": </p>";
    $result .= "<table border =1>";
    $result .= "<tr><th>Жанр</th><th>Актеры</th><th>Фильм</th><th>Дата выпуска</th><th>Страна</th><th>Карьер</th></tr>";
    foreach ($cursor as $document) {
        $film = $document['title'];
        $genre = $document['genre'];
        $date = $document['date'];
        $country = $document['country'];
        $carrier = $document['carrier'];
        $actor = $document['actor'];
        if (is_object($genre)) {
            $genre = (array)$genre;
            $genre = (implode(',</br> ', $genre));
        }
        if (is_object($actor)) {
            $actor = (array)$actor;
            $actor = (implode(',</br> ', $actor));
        }
        $result .= "<tr><td>$genre</td><td>$actor</td><td>$film</td><td>$date</td><td>$country</td><td>$carrier</td></tr>";
    }
    $result .= "</table>";
    echo $result;
    echo "<script>localStorage.setItem('$key', '$result')</script>";
}
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $cursor = $db->find(['date' => $date]);
    $result = "<p>Дата: $date" . ": </p>";
    $result .= "<table border =1>";
    $result .= "<tr><th>Жанр</th><th>Актеры</th><th>Фильм</th><th>Дата выпуска</th><th>Страна</th><th>Карьер</th></tr>";
    foreach ($cursor as $document) {
        $film = $document['title'];
        $genre = $document['genre'];
        $date = $document['date'];
        $country = $document['country'];
        $carrier = $document['carrier'];
        $actor = $document['actor'];
        if (is_object($genre)) {
            $genre = (array)$genre;
            $genre = (implode(',</br> ', $genre));
        }
        if (is_object($actor)) {
            $actor = (array)$actor;
            $actor = (implode(',</br> ', $actor));
        }
        $result .= "<tr><td>$genre</td><td>$actor</td><td>$film</td><td>$date</td><td>$country</td><td>$carrier</td></tr>";
    }
    $result .= "</table>";
    echo $result;
    echo "<script>localStorage.setItem('$date', '$result')</script>";
}
?>