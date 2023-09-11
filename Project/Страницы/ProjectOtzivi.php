<html>
    <head>
        <title>Отзывы</title>
    <link rel="stylesheet" href="OtziviPage.css" type="text/css" />
    </head>
<body>
    <?php
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
        //отображение отзывов
        $conn = new mysqli("localhost", "root", "root", "project");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM otziv";
if($result = $conn->query($sql)){
    foreach($result as $row){
        echo "<div class='recepiePreview'>";
            echo "<div class='referencetext'>Рецепт: " . $row["reference"] . "</div><br>";
            echo "<div class='nametext'>Отценка пользователей: " . $row["rating"] . "</div><br>";
            echo "<div class='author'>Автор: " . $row["logino"] . "</div><br>";
            echo "<div class='discription'>Отзыв: " . $row["texta"] . "</div><br>";
        echo"</div>";
        }       
    $result->free();
}
else
{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
    ?>
    <script>
        function on() {
            document.getElementById("overlay").style.opacity = "1";
            document.getElementById("overlay").style.visibility = "visible";
            }
            function off() {
            document.getElementById("overlay").style.opacity = "0";
            document.getElementById("overlay").style.visibility = "hidden";
            }
            
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
    <div class="menu">
    <input type="button" value="О нас" class="menuButton" onclick="document.location='About.php'">
    <input type="button" value="Новости" class="menuButton" onclick="document.location='ProjectNews.php'">
    <input type="button" value="Рецепты" class="menuButton" onclick="document.location='ProjectRcepies.php'">
    <input type="button" value="Отзывы" class="menuButton"> 
    <input type="button" value="ВОЙТИ" class="EnterButton" onclick="enton()">
    <img src="картинки для оформления сайта/logonew3.png" class="logo" onclick="document.location='Project.php'"> 
    </div>
    <?php
    $conn = new mysqli("localhost", "root", "root", "project");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users where isregister=1";
    if($result = $conn->query($sql)){
        foreach($result as $row){
            if($row["isregister"]!==0)
            {
    echo "<input type='button' value='ДОБАВИТЬ ОТЗЫВ' class='OtzivsButton' onclick='on()'>";
            }
        }
    }
    ?>
    <div class="cube">
        <div class="bottom">
Добро пожаловать на сайт SwEEt.by<br>
Данный сайт является книгой<br> 
рецептов сладких блюд с<br> 
возможностью добавления новых<br><br>
Присылайте ваши рецепты
        </div>
        <img src="картинки для оформления сайта/pngegg1.png" class="im2">
        <img src="картинки для оформления сайта/i.png" class="im3">
        <form id="overlay" method="post" action="Bank.php">
            <textarea type="text" placeholder="Текст отзыва" id="overlayField1" name="OtzivText"></textarea>
            <select id="overlayField2" name="NazvaRecepie">
                <option selected disabled hidden>Выбор рецепта</option>
            <?php
            $conn = new mysqli("localhost", "root", "root", "project");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM recepies";
            if($result = $conn->query($sql)){
                foreach($result as $row){
            echo "<option>".$row["nazva"]."</option>";
                }
                $result->free();
            }
            else
            {
            echo "Ошибка: " . $conn->error;
            }
            $conn->close();
            ?>
            </select>
            <?php
            $conn = new mysqli("localhost", "root", "root", "project");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM users where isregister=1";
            if($result = $conn->query($sql)){
                foreach($result as $row){
            echo "<input type='text' value=".$row["logina"]." id='overlayField3' name='OtzivLogin' readonly>";
                }
                $result->free();
            }
            else
            {
            echo "Ошибка: " . $conn->error;
            }
            $conn->close();
            ?>
            <input type="text"  placeholder="Отценка от 1 до 5" id="overlayField4" name="Mark" pattern="[0-6]{1}"></textarea>
            <input type="button" value="X" class="closeOverlayButton" onclick="off()">
            <input type="submit" value="Сохранить" class="sendrequest">
        </form>
        <img src="картинки для оформления сайта/pngegg.png" class="im1">
    </div>
    <form id="entoverlay" method="post" action="Bank.php">
        <div class="text1">Логин</div><input type="text" id="entoverlayField1" name="login"><div class="text2">Введите свой<br> псевдоним</div>
        <div class="text1">Пароль</div><input type="text" id="entoverlayField2" name="password"><div class="text2">Введите свой<br> пароль из букв<br> и цифр</div>
        <input type="button" value="X" class="closeentOverlayButton" onclick="entoff()">
        <div class="text3">Нет аккаунта? Не беда, нажмите кнопку<br></div><input type="button" value="Зарегистрироваться" class="regbtn" onclick="regon()">
        <input type="submit" value="Войти" class="entbtn">
    </form>
    <form id="regoverlay" method="post" action="Bank.php">
        <div class="text1">Логин</div><input type="text" id="entoverlayField1" name="reglogin"><div class="text2">Введите свой<br> псевдоним</div>
        <div class="text1">Пароль</div><input type="text" id="entoverlayField2" name="regpassword"><div class="text2">Введите свой<br> пароль из букв<br> и цифр</div>
        <div class="text1">Пароль</div><input type="text" id="entoverlayField3" name="regpassword2"><div class="text2">Повторите<br>пароль</div>
        <input type="button" value="X" class="closeentOverlayButton" onclick="regoff()">
        <input type="submit" value="Зарегистрироваться" class="regbtn2">
    </form>
</body>
</html>