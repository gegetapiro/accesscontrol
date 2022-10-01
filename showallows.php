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
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Soggetti ammessi al cantiere</title>
    </head>

    <body>
        <script>
            function deleteAllow(whattodel) {
                $.ajax({
                    url: "deleteAllow.php",
                    type: "POST",
                    data: {
                        whattarec: whattodel
                    },
                    success: function(msg) {
                        alert(msg);
                        location.reload(true);
                    }
                });
            }
            $.getJSON("allowWorkers.php", function(thedata) {
                $.each(thedata.ammessi, function(i, elem) {
                    var rowNew = "<tr><td>" + elem.id + "</td><td>" + elem.codiceFiscale + "</td><td>" +
                        elem.nome + "</td><td>" + elem.cognome + "</td><td>" + elem.azienda + "</td><td>" +
                        elem.note + "</td><td>" + elem.workerkind + "</td>" +
                        "<td><input type='button' value='CANCELLA' onclick='deleteAllow(" + elem.id + ")' /></td></tr>";
                    $(rowNew).appendTo("#jsondataallows");
                });
            });
        </script>
        <ul>
            <li><a href="barCodeControl/insertAllows.php">INSERIMENTO NUOVO LAVORATORE AMMESSO</a></li>
            <li><a href="index.php">VISUALIZZA LAVORATORI PRESENTI</a></li>
            <li class="evidenced"><a href="showallows.php">VISUALIZZA LAVORATORI AMMESSI</a></li>
            <li><a href="barCodeControl/index.php">TIMBRATORE</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
        <div id="userlist" class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Codice Fiscale</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Azienda</th>
                        <th>Note</th>
                        <th>Tipologia utente</th>
                        <th>Modifica</th>
                        <th>Cancella</th>
                    </tr>

                </thead>
                <tbody id="jsondataallows">

                </tbody>
    </body>

    </html>
<?php
}
?>