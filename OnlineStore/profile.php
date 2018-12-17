<script>
    function extend() {
        var col = document.getElementById("ext");
        if (col.style.display === "block") {
            col.style.display = "none";
        } else {
            col.style.display = "block";
        }
    }
</script>
<div class="profile">
    <fieldset style="border:3pt darkblue; border-style: groove ">
        <legend>
            <h4>Bonjour Hi
                <?php if (isset($_SESSION['name'], $_SESSION['type'])) {
                    echo ", " . $_SESSION['name']; ?>
            </h4>
        </legend>
        <div style="font-size:16pt;color:blue;background-color: blanchedalmond">
        Account:
        <?php
        echo " " . $_SESSION['un'] . "<br>";

        echo $_SESSION["type"];
        ?>
        
        <br>
        <br>
        <button onclick="extend()">Profile</button>
        </div>
        <div id="ext" style="display:none;background-color: blanchedalmond">
            <?php
            echo "Tel: " . $_SESSION['tel'] . "<br>";
            echo "Email: " . $_SESSION['email'] . "<br>";
            echo "Address: " . $_SESSION['address'] . "<br>";
            ?>
        
        </div>
        <br>
        <br>
        <a class="log" href="logout.php">Logout</a>
        <?php

    } else { ?>
        </h4>
        </legend>
        <a class="log" href="login.php " style="padding-right: 5% ">Login</a>
        <a class="log" href="register.php " style="padding-left:5% ">Register</a>
        <br>
        <br>
        <div style="background-color:blanchedalmond">
            <h3>Welcome To</h3>
            <h3>Bluetooth Online Store</h3>
        </div>
        <?php 
    } ?>
        <br>
        <h5><a href="mailto:1@gmail.com ">Email to Us</a></h5>
    </fieldset>
</div>