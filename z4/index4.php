<?php 
session_start();

if (!isset($_SESSION['loggedin']))
{
    header('Location: index3.php');
    exit();
}


if($_SESSION["brute_force"] == true) {

    $link = mysqli_connect("sql200.epizy.com", "epiz_32755305", "De2wZ7MYlv", "epiz_32755305_z4");
    $ipadres = $_SERVER["REMOTE_ADDR"];

    if(!$link) { 
        echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error();
        }

    mysqli_query($link, "SET NAMES 'utf8'");
    $result = mysqli_query($link, "SELECT * FROM burglary");
    $rekord = mysqli_fetch_array($result);
    echo $result;
    echo $rekord;

    echo "<h3 style='color: red;'>Ktoś wieloktortnie próbował włamać sie na twoje konto!</h3>";

    unset($_SESSION["brute_force"]);
    mysqli_close($link);
}

        $link = mysqli_connect("sql200.epizy.com", "epiz_32755305", "De2wZ7MYlv", "epiz_32755305_z4");
        $ipaddress = $_SERVER["REMOTE_ADDR"];
        
        function ip_details($ip) {
        $json = file_get_contents ("http://ipinfo.io/{$ip}/geo");
        $details = json_decode ($json);
        return $details;
        }

        if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
        mysqli_query($link, "SET NAMES 'utf8'");
        $result = mysqli_query($link, "SELECT * FROM users WHERE (username='$user') and (password='$pass')");
        $rekord = mysqli_fetch_array($result); 
        $id = $rekord['id'];

        function get_browser_name($user_agent)
        {
            if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
            elseif (strpos($user_agent, 'Edge')) return 'Edge';
            elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
            elseif (strpos($user_agent, 'Safari')) return 'Safari';
            elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
            elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
        
            return 'Other';
        }
        $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

        echo '<script type="text/JavaScript"> 
                screenResolution = window.innerWidth + "x" + window.innerHeight;
                document.cookie="screenResolution="+screenResolution;
                browserResolution = window.screen.width + "x" + window.screen.height;
                document.cookie="browserResolution="+browserResolution;
                colors = screen.colorDepth;
                document.cookie="c="+c;
                language = navigator.language;
                document.cookie="language="+language;
                javaEnabled = navigator.javaEnabled();
                document.cookie="javaEnabled="+javaEnabled;
                cookieEnabled = navigator.cookieEnabled;
                document.cookie="cookieEnabled="+cookieEnabled;
            </script>';

                $screenResolution = $_COOKIE["screenResolution"];
                $_COOKIE["screenResolution"] = "";
                $browserResolution = $_COOKIE["browserResolution"];
                $_COOKIE["browserResolution"] = "";
                $colors = $_COOKIE["c"];
                $_COOKIE["c"] = "";
                $language = $_COOKIE["language"];
                $_COOKIE["language"] = "";
                $javaEnabled= $_COOKIE["javaEnabled"];
                $_COOKIE["javaEnabled"] = "";
                $cookieEnabled = $_COOKIE["cookieEnabled"];
                $_COOKIE["cookieEnabled"] = "";

                $sql = "INSERT INTO goscieportalu (id,
                ipaddress, 
                browser, 
                screenResolution, 
                browserResolution, 
                colors, 
                language, 
                javaEnabled, 
                cookieEnabled) 
                VALUES (
                    '$id',
                    '$ipaddress',
                    '$browser', 
                    '$screenResolution', 
                    '$browserResolution',
                    '$colors',
                    '$language',
                    '$javaEnabled',
                    '$cookieEnabled')";

        echo '</br></br><a href="katalog.php">Twój katalog</a></br>';


        if(mysqli_query($link, $sql)){
            echo "<br>Dane zostały zapisane";
        } else{
            echo "ERROR: Nie zapisono danych" . mysqli_error($link);
        }
        
        mysqli_close($link);

        
        mysqli_close($link);

?>