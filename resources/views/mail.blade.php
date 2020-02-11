<html>
<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
<style type="text/css">body,td,th {
    font-family: Verdana, Geneva, sans-serif;
    font-size: 16px;
    color: #333;
}
a {
    font-size: 16px;
    color: #57b9b4;
    font-weight: bold;
}
a:link {
    text-decoration: none;
}
a:visited {
    text-decoration: none;
    color: #57b9b4;
}
a:hover {
    text-decoration: none;
    color: #57b9b4;
}
a:active {
    text-decoration: none;
    color: #57b9b4;
}
</style>
<table border="0" bordercolor="#7856A4" cellpadding="5" cellspacing="0" style="width:600px;" width="600">
    <tbody style="color:#fff; font-family: Arial, sans-serif; font-size: 18px;">
        <tr>
            <td>
            <table cellpadding="0" cellspacing="0" height="383" id="Table_01" width="100%">
                <tbody style="font-family: Arial, sans-serif; font-size: 14px; color:#333;">
                    <tr>
                        <td style="text-align:center; height: 100px; padding: 0 20px;">

                        <h3><span style="color:#7856A4">Your Appointment is <b>{{ $datas['status'] }}</b> </span><br />
                        &nbsp;</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 20px;">
                        <hr />
                        <div>
                            <br />
                            <div style="
                                font-size: 14px;
                                margin: 0px;
                                width: 100%;
                                height: 100%;
                                position: relative;">
                                <h4 style="color:#E85A71;">Appointment Details</h4>

                                <p style="color:#222;text-align: left;">Hello {{ $datas['customer_name'] }}, </p>

                                <p style="color:#222;margin-bottom: 0;">Your appointment on <b> {{ $datas['date_time'] }} </b>has <b>{{ $datas['status'] }}</b>, <b> {{ $datas['staff_name'] }} </b> will be your provider for <b>"{{ $datas['service_name'] }}"</b>.</p>

                                <p style="color:#222;margin-bottom: 0;">{{ $datas['note'] }}</p>

                                <p style="color:#222;margin-bottom: 0;">Thank you</p>
                            </div>
                        </div>

                        <p><br />
                        <span style="color:#7855a5; font-size:18px;">Made By: Sergio Lio Applicant</span></p>

                        <hr /></td>
                    </tr>
                    <tr>
                        <td align="center" height="191" style="padding: 0 20px;" valign="top">

                        <div style="color:#999; font-size:14px;">
                        <p>This is an automated email. Please do not respond.</p>
                        </div>

                        <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td height="2" style="text-align:center; padding: 0 20px;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
