<html>
    <head>
        <title>О нас</title>
    <link rel="stylesheet" href="AboutPage.css" type="text/css" />
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
<div class="menu">
    <input type="button" value="О нас" class="menuButton">
    <input type="button" value="Новости" class="menuButton" onclick="document.location='ProjectNews.php'">
    <input type="button" value="Рецепты" class="menuButton" onclick="document.location='ProjectRcepies.php'">
    <input type="button" value="Отзывы" class="menuButton" onclick="document.location='ProjectOtzivi.php'"> 
    <input type="button" value="ВОЙТИ" class="EnterButton" onclick="enton()">
    <img src="картинки для оформления сайта/logonew3.png" class="logo" onclick="document.location='Project.php'"> 
    </div>
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
        <div class='newsblock'>
        <img src="картинки для оформления сайта/tykvennye-keksy-s-izyumom-th.jpg" class="image">
        <div class="text4">Готовить никогда<br> не было просто,<br> мы надеемся что<br> наш сайт сможет<br> облегчить данный<br> процесс для вас </div> 
        </div>
        <div class='newsblock'>
        <img src="картинки для оформления сайта/e89f9a54e52b35e269f3d94b25e46ffd.jpg" class="image">
        <div class="text4">Благодаря<br> возможности<br> добавления в<br> рецепты текстовых и<br> аудио инструкций вы<br> легко сможете<br> приготовить<br> понравившееся вам<br> блюдо</div>
        </div>
        <div class='newsblock'>
        <img src="картинки для оформления сайта/Vypechka-iz-vishni.jpg" class="image">
        <div class="text4">При помощи системы<br> оценивания вы<br> вместе с другими<br> пользователями<br> сможете отсеять<br> невкусные или<br> непривлекательные<br> рецепты</div>
        </div>
        <div class="cube2">
        <div class="bottom2">
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
        <img src="картинки для оформления сайта/pngegg1.png" class="im22">
        <img src="картинки для оформления сайта/i.png" class="im32">
        <img src="картинки для оформления сайта/pngegg.png" class="im12">
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
    <img src="картинки для оформления сайта/pngegg.png" class="im1">
</body>
</html>