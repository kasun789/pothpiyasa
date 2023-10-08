<?php

$templateString = "
<!DOCTYPE html>
<html lang='en' style='margin:0'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>

<body style='margin:0; width: 100vw;'>
    <h1 style='text-align:center'>Donor Report</h1>";

    $templateString .= sprintf("<p style ='position:absolute; left:46px; font-size: 18px; '> Generated by : %s </p> <p style ='position:absolute; left:540px; font-size: 18px; '>Date : %s</p>",Auth::profileName(),date('Y-m-d'));

    $templateString .= "
    <table style='overflow-x: auto; transform:scale(0.85); white-space:nowrap; text-align: center; border:2px solid black; margin-left:10%; margin-top:6%;'>
        <tr>
            <th
                style='border-bottom: 1px solid #1395ed; padding: 12px 25px; font-size: 16px; letter-spacing: 0.8px; background-color: #1395ed; color: white;'>
                Name</th>
            <th
                style='border-bottom: 1px solid #1395ed; padding: 12px 25px; font-size: 16px; letter-spacing: 0.8px; background-color: #1395ed; color: white;'>
                Address</th>
            <th
                style='border-bottom: 1px solid #1395ed; padding: 12px 25px; font-size: 16px; letter-spacing: 0.8px; background-color: #1395ed; color: white;'>
                TeleNo</th>
            <th
                style='border-bottom: 1px solid #1395ed; padding: 12px 25px; font-size: 16px; letter-spacing: 0.8px; background-color: #1395ed; color: white;'>
                Email(S)</th>
            
        </tr>";

        foreach ($rows as $row):
        $templateString .= sprintf("<tr>
            <td style='font-size: 18px; padding: 12px; background: #D9D9D9;'>
                %s
            </td>
            <td style='font-size: 18px; padding: 12px; background: #D9D9D9;'>
                %s
            </td>
            <td style='font-size: 18px; padding: 12px; background: #D9D9D9;'>
                %s 
            </td>
            <td style='font-size: 18px; padding: 12px; background: #D9D9D9;'>
                %s 
            </td>

        </tr>", $row->Name, $row->Address, $row->TeleNo, $row->Email);

        endforeach;
        $templateString .="
    </table>
</body>

</html>";