<html>
    <head>
        <title>SwEEt</title>
    <link rel="stylesheet" href="MainPage.css" type="text/css" />
    </head>
<body>
    <?php
    
    //загрузка новостей
    $conn = new mysqli("localhost", "root", "root", "project");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM news LIMIT 3";
        if($result = $conn->query($sql)){
        foreach($result as $row){
            echo "<div class='newsblock'>";
                echo "<img src="."картинки_для_новостей/".$row["img"]." class='image'>";
                echo "<div class='text4'>" . $row["text"] . "</div><br>";
            echo "</div>";
            }
        $result->free();
        }else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
    //отображение части рецептов
    $conn = new mysqli("localhost", "root", "root", "project");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM recepies LIMIT 3";
        echo"<br>";
if($result = $conn->query($sql)){
    foreach($result as $row){
        echo "<div class='recepiePreview'>";
            echo "<img src=".'/'.$row["photo"]." class='photo'>";
            echo "<div class='nametext'>" . $row["nazva"] . "</div><br>";
            echo "<div class='author'>Автор: " . $row["author"] . "</div><br>";
            echo "<textarea type='text' class='discription' rows=10 cols=70 readonly>".$row["ingridients"]."</textarea><br>";
        echo "</div>";
        }       
    $result->free();
}
else
{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
    //отображение результатов авторизации
    $conn = new mysqli("localhost", "root", "root", "project");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT logina FROM users WHERE isregister=1";
        echo"<br>";
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

    $conn = new mysqli("localhost", "root", "root", "project");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM otziv LIMIT 3";
if($result = $conn->query($sql)){
    foreach($result as $row){
        echo "<div class='recepiePreview2'>";
            echo "<div class='referencetext'>Рецепт: " . $row["reference"] . "</div><br>";
            echo "<div class='nametext2'>Отценка пользователей: " . $row["rating"] . "</div><br>";
            echo "<div class='author2'>Автор: " . $row["logino"] . "</div><br>";
            echo "<div class='discription2'>Отзыв: " . $row["texta"] . "</div><br>";
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
            function PhotoAded(input){
                let file=input.files[0];
                let url=URL.createObjectURL(file);
                let image=document.getElementById("recepiePreview").children=document.getElementById("photo");
                image.src=url;
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
    <input type="button" value="Отзывы" class="menuButton" onclick="document.location='ProjectOtzivi.php'"> 
    <input type="button" value="ВОЙТИ" class="EnterButton" onclick="enton()">
    <img src="картинки для оформления сайта/logonew3.png" class="logo"> 
    </div>
    <input type="button" value="Остальные новости" class="NewsButton" onclick="document.location='ProjectNews.php'">
    <input type="button" value="Остальные рецепты" class="RecepiesButton"onclick="document.location='ProjectRcepies.php'">
    <input type="button" value="Остальные отзывы" class="OtzivButton"onclick="document.location='ProjectOtzivi.php'">
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
    echo "<input type='button' value='ДОБАВИТЬ РЕЦЕПТ' class='AddButton' onclick='on()'>";
            }
        }
    }
    ?>
        <form id="overlay" method="post" action="Bank.php">
            <textarea type="text" placeholder="Название" id="overlayField1" name="Nazva"></textarea>
            <textarea type="text" placeholder="Автор" id="overlayField2" name="Author"></textarea>
            <textarea type="text" placeholder="Ингридиенты" id="overlayField3" name="Ingrid"></textarea>
            <textarea type="text" placeholder="Способ приготовления" id="overlayField4" name="Wayofcook"></textarea>
                <div class="cube2">
                    <input type="file" placeholder="Фото" name="image" accept="image/*" class="photoAdder" id="addPhoto" oninput="PhotoAded(this)">  
                </div>
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
    <div class="footer">
    <div class="smltxt">
        &#9742; 877-255-7945<br>
        &#64; info@form.com<br>
        &#64; vk.com/SwEEtby<br>
        &#64; instagram/SwEEtby<br>
        Ждем ваших рецептов
        </div>
    </div>
</body>
</html>