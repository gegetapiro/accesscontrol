<?php
session_start();
if ($_SESSION["usersession"] != "sessionOK") {
    header("Location: login.html");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <title>Inserimento autorizzati</title>
    </head>

    <body>

        <script>
            function putemploye(inputtype) {
                let codfisc = $(inputtype).val();
                $.ajax({
                    url: "compareCF.php",
                    type: "POST",
                    data: {
                        codfisc: codfisc
                    },
                    success: function(msgresponse) {
                        // alert(" response = " + msgresponse);

                        // location.reload(true);
                        document.getElementById("showresult").style.visibility = "visible";
                        $("#showresult").html(msgresponse);
                        $("#codicefiscalemanual").val("");
                    }
                });

            }

            function changeinputtype(whattabut) {
                if (whattabut == 0) {
                    document.getElementById("inputautomatic").style.display = "none";
                    document.getElementById("inputkeyboard").style.display = "block";

                }
                if (whattabut == 1) {
                    document.getElementById("inputautomatic").style.display = "block";
                    document.getElementById("codicefiscale").focus();
                    document.getElementById("inputkeyboard").style.display = "none";

                }




            }
        </script>

        <ul>
            <li><a href="insertAllows.php">INSERIMENTO NUOVO LAVORATORE AMMESSO</a></li>
            <li><a href="../index.php">VISUALIZZA LAVORATORI PRESENTI</a></li>
            <li><a href="../showallows.php">VISUALIZZA LAVORATORI AMMESSI</a></li>
            <li class="evidenced"><a href="index.php">TIMBRATORE</a></li>
        </ul>
        <!-- <div class="titlecontainer">
        <h2 class="title">CONTROLLO CODICE FISCALE ED INSERIMENTO PRESENZE LAVORATORI</h2>
    </div> -->


        <form id="inputautomatic">
            <input type="button" value="PASSA AD INSERIMENTO DA TASTIERA" onclick="changeinputtype(0)">
            <br><br>
            <label for="codicefiscale">Inserisci codice fiscale <input type="text" id="codicefiscale" maxlength="16" oninput="putemploye('#codicefiscale')"></label>
        </form>
        <form id="inputkeyboard">
            <input type="button" value="PASSA AD INSERIMENTO AUTOMATICO" onclick="changeinputtype(1)">
            <br><br>
            <label for="codicefiscalemanual">Inserisci codice fiscale <input type="text" id="codicefiscalemanual" maxlength="16"></label>
            <input type="button" onclick="putemploye('#codicefiscalemanual')" value="INVIA">
        </form>
        <div>
            <br><br>
            <div id="showresult"></div>
            <br><br>


        </div>
        <script>
            document.getElementById("codicefiscale").focus();
        </script>
    </body>
    <!-- ########### studia ##################
https://qabiria.com/it/risorse/blog/cosa-e-markdown-come-si-usa
######################################################### -->

    </html>
<?php
}
?>