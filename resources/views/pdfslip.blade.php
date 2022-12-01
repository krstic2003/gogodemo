<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Uplatnica</title>
    <style>
        *{ font-family: DejaVu Sans !important;}
    </style>
</head>

<body>
    <h2 style="text-align:left;">Nalog za uplatu</h2>
    <table>
        <tr>
            <td>
                Uplatilac:<br>
                <textarea id="uplatilac" name="uplatilac" rows="3" cols="36" wrap="hard" maxlength="110" autofocus="">{{ $to_name }}</textarea><br>
                Svrha uplate:<br>
                <textarea id="svrha" name="svrha" rows="3" cols="36" wrap="hard" maxlength="110">Uplata po fakturi</textarea><br>
                Primalac:<br>
                <textarea cols="36" rows="3" name="primalac" id="primalac" wrap="hard" maxlength="110">{{ $company }}</textarea><br>
            </td>
            <td style="vertical-align:top;" colspan="2">
                <table>
                    <tr>
                        <td >Šifra plaćanja:<br> <input style="width:50px" type="text" value="121"></td>
                        <td>Valuta:<br> <input style="width:50px" type="text" value="RSD"></td>
                        <td>Iznos:<br> <input type="text" value="{{ $price }}"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding-top:28px; ">Račun:<br> <input style="width:100%;" type="text" value="{{ $account }}"></td>
                    </tr>
                    <tr>
                        <td style="padding-top:28px;">Model:<br> <input style="width:50px" type="text" value="&nbsp;"></td>
                        <td style="padding-top:28px;" colspan="2">Poziv na broj:<br> <input type="text" value="&nbsp;"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-top:28px;">
                ___________________________ <br>
                pečat i potpis uplatioca
            </td>
            <td style="padding-top:28px;">
                ___________________________ <br>
                mesto i datum prijema
            </td>
            <td style="padding-top:28px;">
                ___________________________ <br>
                datum valute
            </td>
        </tr>
    </table>
</body>
</html>