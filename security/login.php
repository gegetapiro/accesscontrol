<?php
session_start();
if (isset($_POST["invio"])) {
    $puntatore = fopen("testi/pasx.txt", "r");
    $trovato = 0;
    while ((!feof($puntatore)) && (!$trovato)) {
        $linea = fgets($puntatore);
        $trovato = stristr($linea, $_POST["userid"]);
        $puntatore++;
    }
    fclose($puntatore);
    list($nomeutente, $password) = split("~:~", $linea);
    if (($trovato)  && ($_POST["passwd"] == trim($password))) {
        $_SESSION["autorizzato"] = 1;
        $destinazione = "inizia.php";
    } else {
        $destinazione = "destroy.php";
    }
    echo '<script language=javascript>document.location.href="' . $destinazione . '"</script>';
} else {
    // HTML 
?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <html>

    <head>
        <title>Prova Login php</title>
        <meta name="Generator" content="EditPlus">
        <meta name="Author" content="">
        <meta name="Keywords" content="">
        <meta name="Description" content="">
    </head>

    <body>
        <form method=post action="login.php">
            <table width="300" cellpadding="4" cellspacing="1" border="0">
                <tr>
                    <td colspan="2" align="left">
                        <u>inserite nome utente e password</u>:
                    </td>
                </tr>
                <tr>
                    <td>
                        nome utente:
                    </td>
                    <td>
                        <input type="text" name="userid">
                    </td>
                </tr>
                <tr>
                    <td>
                        password:
                    </td>
                    <td>
                        <input type="password" name="passwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="invio" value="invio">
                        &nbsp;&nbsp;
                        <input type="reset" name="cancella" value="cancella">
                    </td>
                </tr>
            </table>
            <br>
        </form>
    </body>

    </html>
<? //fine HTML
}
?>