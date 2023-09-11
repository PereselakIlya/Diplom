<html>
    <head>
        <title>Рецепты</title>
        <link rel="stylesheet" href="RecepiesPage.css" type="text/css" />
    </head>
    <body>
    <?php
        $conn = new mysqli("localhost", "root", "root", "project");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM recepies  JOIN users on author=logina;";
        $sql2 ="SELECT * FROM users where isregister=1";
if($result = $conn->query($sql)){
    foreach($result as $row){
        echo "<div class='recepiePreview'>";
            echo "<img src=".'../'.$row["photo"]." class='photo'>";
            echo "<div class='nametext'>" . $row["nazva"] . "</div><br>";
            echo "<div class='author'>Автор: " . $row["author"] . "</div><br>";
            echo "<textarea type='text' class='discription' rows=10 cols=70 readonly>".$row["ingridients"]."</textarea><br>";
            echo "<input type='button' value='Показать полностью' class='showButton' onclick='on2(\"".$row["rid"]."\")'>";
            echo "<span id=".$row["rid"].">";
                echo "<img src=".'/'.$row["photo"]." id='photo2'>";
                echo "<div id='overlay2Field1'>" . $row["nazva"] . "</div><br>";
                echo "<div id='overlay2Field2'>Автор: " . $row["author"] . "</div><br>";
                echo "<textarea type='text' id='overlay2Field3' rows=5 cols=70 readonly>".$row["ingridients"]."</textarea><br>";
                echo "<div id='overlay2Field4'>" . $row["wayofcooking"] . "</div><br>";
                echo "<input type='button' value='Свернуть' class='closeOverlayButton2' onclick='off2(\"".$row["rid"]."\")'>";
                echo "</span>";
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
            function on() {
            document.getElementById("overlay").style.opacity = "1";
            document.getElementById("overlay").style.visibility = "visible";
            }
            function off() {
            document.getElementById("overlay").style.opacity = "0";
            document.getElementById("overlay").style.visibility = "hidden";
            }
            function on2(id) {
            let elem =document.getElementById(id);
            elem.style.opacity = "1";
            elem.style.visibility = "visible";
            }
            function off2(id) {
            let elem =document.getElementById(id);
            elem.style.opacity = "0";
            elem.style.visibility = "hidden";
            }
            function on3() {
            document.getElementById("overlay2").style.opacity = "1";
            document.getElementById("overlay2").style.visibility = "visible";
            }
            function off3() {
            document.getElementById("overlay2").style.opacity = "0";
            document.getElementById("overlay2").style.visibility = "hidden";
            }
            function PhotoAded(input){
                let file=input.files[0];
                let url=URL.createObjectURL(file);
                let image=document.getElementById("recepiePreview").children=document.getElementById("photo");
                image=url;
            }
            
            function RecepieSaver(){
                let nameinput=document.getElementById("overlayField1");
                    document.getElementById("nametext").innerHTML=nameinput.value;
                let authorinput=document.getElementById("overlayField2");
                    document.getElementById("author").innerHTML=authorinput.value;
                let ingridienstinput=document.getElementById("overlayField3");
                    document.getElementById("discription").innerHTML=ingridienstinput.value;
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
            function search(){
                let b=document.getElementsByClassName("recepiePreview");
                let a=document.getElementById("searchField");
                let reg=new RegExp(a.value,'gi');
                Array.from(b).forEach(function(item,i,b){
                    if(b[i].children[1].textContent.match(reg)==null)
                    {
                        b[i].remove();
                    }
                });
            }
            </script>
    <div class="menu">
    <input type="button" value="О нас" class="menuButton" onclick="document.location='About.php'">
    <input type="button" value="Новости" class="menuButton" onclick="document.location='ProjectNews.php'">
    <input type="button" value="Рецепты" class="menuButton">
    <input type="button" value="Отзывы" class="menuButton" onclick="document.location='ProjectOtzivi.php'">
    <input type="button" value="ВОЙТИ" class="EnterButton" onclick="enton()">
    <img src="картинки для оформления сайта/logonew3.png" class="logo" onclick="document.location='Project.php'">   
    </div>
    <input type="text" placeholder="Введите название рецепта" id="searchField">
        <input type="button" value="Найти рецепт" id="searchButton" onclick="search()">
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
    echo "<input type='button' value='ДОБАВИТЬ ОТЗЫВ' class='OtzivsButton' onclick='on3()'>";
            }
        }
    }
    ?>
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
    <?php
            $conn = new mysqli("localhost", "root", "root", "project");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM users where isregister=1";
            if($result = $conn->query($sql)){
                foreach($result as $row){
            echo "<input type='text' value=".$row["logina"]." id='overlayField2' name='Author' readonly>";
                }
                $result->free();
            }
            else
            {
            echo "Ошибка: " . $conn->error;
            }
            $conn->close();
            ?>
        
            <textarea type="text" placeholder="Ингридиенты" id="overlayField3" name="Ingrid"></textarea>
            <textarea type="text" placeholder="Способ приготовления" id="overlayField4" name="Wayofcook"></textarea>
        <div class="cube2">
            <input type="file" value="Фото" name="image" accept="image/*" class="photoAdder" id="addPhoto" oninput="PhotoAded(this)">  
            <input type="button" value="ДОБАВИТЬ" class="AddImgButton" onclick="RecepieSaver()">
        </div>
    <input type="button" value="X" class="closeOverlayButton" onclick="off()">
    <input type="submit" value="Сохранить" class="sendrequest">
        </form>
        <form id="overlay2" method="post" action="Bank.php">
            <textarea type="text" placeholder="Текст отзыва" id="overlayField12" name="OtzivText"></textarea>
            <select id="overlayField22" name="NazvaRecepie">
                <option selected disabled hidden>Выбор рецепта</option>
            <?php
            $conn = new mysqli("localhost", "root", "root", "project");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM recepies";
            if($result = $conn->query($sql)){
                foreach($result as $row){
            echo "<option value=".$row["nazva"].">".$row["nazva"]."</option>";
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
            echo "<input type='text' value=".$row["logina"]." id='overlayField32' name='OtzivLogin' readonly>";
                }
                $result->free();
            }
            else
            {
            echo "Ошибка: " . $conn->error;
            }
            $conn->close();
            ?>
            <input type="text"  placeholder="Отценка от 1 до 5" id="overlayField42" name="Mark" pattern="[0-6]{1}"></textarea>
            <input type="button" value="X" class="closeOverlayButton2" onclick="off3()">
            <input type="submit" value="Сохранить" class="sendrequest2">
        </form>
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