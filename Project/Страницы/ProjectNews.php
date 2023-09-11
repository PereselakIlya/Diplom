<html>
    <head>
        <title>Новости</title>
        <link rel="stylesheet" href="NewsPage.css" type="text/css" />
    </head>
    <body>
        <?php
        $conn = new mysqli("localhost", "root", "root", "project");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM news";
if($result = $conn->query($sql)){
    foreach($result as $row){
        echo "<div class='newsblock'>";
            echo "<img src="."картинки_для_новостей/".$row["img"]." class='image'>";
            echo "<div class='text'>" . $row["text"] . "</div><br>";
        echo "</div>";
        }
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
//отображение результатов авторизации
$conn = new mysqli("localhost", "root", "root", "project");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT logina FROM users WHERE isregister=1";
if($result = $conn->query($sql)){
    foreach($result as $row){
        echo "<input type='button' value=".$row["logina"]." class='UserButton'>";
        echo "<form action='ExitFromAccountScript.php'>";
                echo "<input type='submit' value='Выйти из аккаунта' class='ExitButton'>";
                echo "</form>";
        }
    $result->free();
    }else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
        ?>
        <script>
            function regon() {
            document.getElementById("regoverlay").style.opacity = "1";
            document.getElementById("regoverlay").style.visibility = "visible";
            }
            function regoff() {
            document.getElementById("regoverlay").style.opacity = "0";
            document.getElementById("regoverlay").style.visibility = "hidden";
            }
            function enton() {
            document.getElementById("entoverlay").style.opacity = "1";
            document.getElementById("entoverlay").style.visibility = "visible";
            }
            function entoff() {
            document.getElementById("entoverlay").style.opacity = "0";
            document.getElementById("entoverlay").style.visibility = "hidden";
            }
        </script>
            <div class="cube">
                <div class="bottom">
                Мы с нетерпением ждем <br>
                ваших кулинарных шедевров.<br>
                Вы можете связаться с нами <br>
                при помощи<br>
                </div>
                <div class="smltxt">
                &#9742; 877-255-7945<br>
                &#64; info@form.com<br>
                &#64; vk.com/SwEEtby<br>
                &#64; instagram/SwEEtby<br>
                Ждем ваших рецептов
                </div>
                <img src="картинки для оформления сайта/pngegg1.png" class="im2">
                <img src="картинки для оформления сайта/i.png" class="im3">
                <img src="картинки для оформления сайта/pngegg.png" class="im1">
            </div>
            <div class="menu">
            <p class="TitleText">Новости</p>
                <input type="button" value="О нас" class="menuButton" onclick="document.location='About.php'">
                <input type="button" value="Новости" class="menuButton">
                <input type="button" value="Рецепты" class="menuButton" onclick="document.location='ProjectRcepies.php'">
                <input type="button" value="Отзывы" class="menuButton" onclick="document.location='ProjectOtzivi.php'">
                <input type="button" value="ВОЙТИ" class="EnterButton" onclick="enton()">   
                <img src="картинки для оформления сайта/logonew3.png" class="logo" onclick="document.location='Project.php'"> 
            </div>
            <form id="entoverlay" method="post" action="Bank.php">
        <div class="textr1">Логин</div><input type="textr" id="entoverlayField1" name="login"><div class="textr2">Введите свой<br> псевдоним</div>
        <div class="textr1">Пароль</div><input type="textr" id="entoverlayField2" name="password"><div class="textr2">Введите свой<br> пароль из букв<br> и цифр</div>
        <input type="button" value="X" class="closeentOverlayButton" onclick="entoff()">
        <div class="textr3">Нет аккаунта? Не беда, нажмите кнопку<br></div><input type="button" value="Зарегистрироваться" class="regbtn" onclick="regon()">
        <input type="submit" value="Войти" class="entbtn">
    </form>
    <form id="regoverlay" method="post" action="Bank.php">
        <div class="textr1">Логин</div><input type="textr" id="entoverlayField1" name="reglogin"><div class="textr2">Введите свой<br> псевдоним</div>
        <div class="textr1">Пароль</div><input type="textr" id="entoverlayField2" name="regpassword"><div class="textr2">Введите свой<br> пароль из букв<br> и цифр</div>
        <div class="textr1">Пароль</div><input type="textr" id="entoverlayField3" name="regpassword2"><div class="textr2">Повторите<br>пароль</div>
        <input type="button" value="X" class="closeentOverlayButton" onclick="regoff()">
        <input type="submit" value="Зарегистрироваться" class="regbtn2">
    </form>
    </body>
</html>