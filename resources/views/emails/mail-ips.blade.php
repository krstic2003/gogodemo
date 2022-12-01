<html>
    <body style="margin:0;padding:0;width:100%;height:100%;font-family:Arial;">
        <div style="background-color:#6C6187;width:100%;margin:0;padding:100px 0;top:0;position:relative;">
            <div style="width:70%;max-width:600px;margin:0 auto;background-color:#ffffff;">
                <table style="border-bottom:2px solid yellow;background-color:#ececea;width:100%;">
                    <tr>
                        <td style="width:30%;padding-top:15px;">
                            <img src="{{ url('/img') }}/logo.png" alt="">
                        </td>
                        <td style="width:70%;padding-top:15px;padding-left:15px;">
                            <h2 style="color:#6C6187">GoGoBook knjige fotografija</h2>
                            <h3 style="color:grey">Kreiraj svoju priču u slikama.</h3>
                        </td>
                    </tr>
                </table>
                <div style="padding:30px;">
                    <h1 style="border-bottom:2px solid grey;padding-bottom:7px;">Nova porudžbina</h1>
                    Poštovani <strong>{{ $name }}</strong>,
                    <p>{{ $body }}</p>
                    <p>Na sledećem <a href="{{ url('/generate-ips') }}/{{ $bookid }}/{{ $orderid }}"><strong>linku</strong></a> možete generisati IPS QR kod.</p>
                    <br><br>
                    ---<br>
                    Srdačan pozdrav,
                    <h2 style="color:#6C6187;margin:10px 0;">GoGoBook Tim</h2>
                    <a href="{{ url('/') }}">www.gogobook.com</a>
                </div>
                <div style="border-top:2px solid yellow;background-color:#ececea;width:100%;text-align:right;padding:7px 10px;color:grey;box-sizing:border-box;">Copyright © 2022 <a href="{{ url('/') }}">www.gogobook.com</a>. Sva prava zadržana.</div>
            </div>
        </div>
    </body>
</html>