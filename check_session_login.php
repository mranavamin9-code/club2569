<?php
    if (isset($_SESSION['lognum'])) {
        $avatar = "avatar-online";
        $login_icon = '<img src="images/login_profile.png" alt class="w-px-40 h-auto rounded-circle" />';
        if ($_SESSION['lognum'] == 1) {
            echo "<script langquage='javascript'>\n";
            echo " window.location=\"index_stu.php\"\n";
            echo "</script>\n";
        }
        if ($_SESSION['lognum'] == 2) {
            echo "<script langquage='javascript'>\n";
            echo " window.location=\"index_tea.php\"\n";
            echo "</script>\n";
        }
        if ($_SESSION['lognum'] == 3) {
            echo "<script langquage='javascript'>\n";
            echo " window.location=\"index_emp.php\"\n";
            echo "</script>\n";
        }
    } else {
        $avatar = "";
        $login_icon = '<img src="images/nologin_profile.png" alt class="w-px-40 h-auto rounded-circle" />';
    }
?>