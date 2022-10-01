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
        <title>modifica record</title>
    </head>

    <body>

        <script>
            function getnowExit() {
                var d_ex = new Date();
                alert(d_ex);
                var month_ex = d_ex.getMonth() + 1;
                var ora_ex = d_ex.getHours();
                var minuti_ex = d_ex.getMinutes();

                if (month_ex < 10) {
                    month_ex = "0" + month_ex;
                }

                var day_ex = d_ex.getDate();
                if (day_ex < 10) {
                    day_ex = "0" + day_ex;
                }
                if (minuti_ex < 10) {
                    minuti_ex = "0" + minuti_ex;
                }

                $("#exit").val(ora_ex);
                $("#minutiuscita").val(minuti_ex);
                alert(minuti_ex);
            }
        </script>
        <div class="table-wrapper">
        </div>
        <tbody>
            <div class="inserttab">
                <label for="date">DATA<input class="theinput" id="date" type="text" placeholder="dd/mm/aaaa"></label><input type="button" onclick=" getnowExit()" value="ADESSO USCITA" /><br /><br />
                <label for="entry">ENTRATA</label>
                <span id="entrytime">
                    <select id="entry">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select> :
                    <select id="entryminutes">
                        <script type="text/javascript">
                            for (var i = 0; i <= 59; i++) {
                                if (i < 10) {
                                    i = "0" + i;
                                }
                                document.write("<option value='" + i + "'>" + i + "</option>");
                            }
                        </script>
                    </select></span><br /><br />
                <label for="exit">USCITA</label>
                <span id="exittime">
                    <select id="exit">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select> :
                    <select id="minutiuscita">
                        <script type="text/javascript">
                            for (var i = 0; i <= 59; i++) {
                                if (i < 10) {
                                    i = "0" + i;
                                }
                                document.write("<option value='" + i + "'>" + i + "</option>");
                            }
                        </script>
                    </select></span><br /><br />
                <label for="greenpass">GREENPASS</label>
                <select id="greenpass">
                    <option value="si">SI</option>
                    <option value="no">NO</option>
                </select><br /><br />
                <label for="name">NOME</label><input id="name" type="text"><br /><br />
                <label for="surname">COGNOME</label><input id="surname" type="text"><br /><br />
                <label for="company">AZIENDA</label><input id="company" type="text"><br /><br />
                <label for="goal">MOTIVO</label><input id="goal" type="text"><br /><br />
                <label for="referent">REFERENTE</label><input id="referent" type="text"><br /><br />
                <label for="countrynum">TARGA</label><input id="countrynum" type="text"><br /><br />
                <label for="notes">NOTE</label><input id="notes" type="text"><br /><br />
                <input type="button" value="INVIA" id="sender" name="sender" onclick="insertnew()" />
            </div>
    </body>

    </html>
<?php
}
?>