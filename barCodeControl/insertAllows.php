<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["usersession"] != "sessionOK") {
    header("Location: login.html");
} else {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <title>Inserisci lavoratori</title>
    </head>

    <body>
        <script>
            function getdata() {
                /*  ########## commento per inserimento in github provvisorio ############### */
                let fiscalcode = $("#fiscalCode").val();
                let nome = $("#nome").val();
                let cognome = $("#cognome").val();
                let azienda = $("#azienda").val();
                let note = $("#note").val();
                let accesskind = $("#accesskind").val();
                $.ajax({
                    url: "insert.php",
                    type: "post",
                    data: {
                        fiscalcode: fiscalcode,
                        nome: nome,
                        cognome: cognome,
                        azienda: azienda,
                        note: note,
                        accesskind: accesskind

                    },
                    success: function(msg) {
                        alert(msg);
                        location.reload(true);
                    }

                });

            }
        </script>
        <ul>
            <li class="evidenced"><a href="insertAllows.php">INSERIMENTO NUOVO LAVORATORE AMMESSO</a></li>
            <li><a href="../index.php">VISUALIZZA LAVORATORI PRESENTI</a></li>
            <li><a href="../showallows.php">VISUALIZZA LAVORATORI AMMESSI</a></li>
            <li><a href="index.php">TIMBRATORE</a></li>
            <li><a href="../logout.php">LOGOUT</a></li>
        </ul>
        <form class="formallowinput">
            <input type="text" id="fiscalCode" name="fiscalCode" placeholder="CODICE FISCALE"><br /><br />
            <input type="text" id="nome" name="nome" placeholder="NOME"><br /><br />
            <input type="text" id="cognome" name="cognome" placeholder="COGNOME"><br /><br />
            <input type="text" id="azienda" name="azienda" placeholder="AZIENDA"><br /><br />
            <label for="accesskind">Tipologia di Visitatore</label><br>
            <select id="accesskind">
                <option value="lavoratore_autorizzato">Lavoratore autorizzato</option>
                <option value="visitatore">Visitatore</option>
                <option value="autista_fornitore">Autista/Fornitore</option>
                <option value="tecnico manutentore">Tecnico manutentore</option>
            </select>
            <br /><br />
            <input type="text" id="note" name="note" placeholder="NOTE"><br /><br />
            <input type="button" id="sendbut" onclick="getdata()" value="REGISTRA">
        </form>
    </body>

    </html>
<?php
}
?>