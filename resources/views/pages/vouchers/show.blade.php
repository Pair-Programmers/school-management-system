<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .fullWidth {
            width: 100%;
        }

        .voucherBorder {
            border: 1px solid;
        }

        .leftAlign {
            text-align: left;
        }

        .centerAlign {
            text-align: center;
        }

        .rightAlign {
            text-align: right;
        }

        .bottomLine {
            border-bottom: 2px solid black;
        }

        .aboveLine {
            border-top: 2px solid black;
        }
        .coloumnLeftLine{
            border-left: 1px solid;
        }

        .coloumnRighLine{
            border-right: 1px solid;
        }

        .feeTable {
            border-collapse: collapse;
            width: 100%;
        }
        .feeTable td, .feeTable th {
            border: 1px solid black;
        }
        .feeTable tr:first-child th {
            border-top: 0;
        }
        .feeTable tr:last-child td {
            border-bottom: 0;
        }
        .feeTable tr td:first-child,
        .feeTable tr th:first-child {
            border-left: 0;
        }
        .feeTable tr td:last-child,
        .feeTable tr th:last-child {
            border-right: 0;
        }

    </style>
</head>

<body>
    <table class="fullWidth" style="border-spacing: 5px;">
        <tr>
            <td>
                <table class="fullWidth voucherBorder">
                    <tr>
                        <th>Student Copy</th>
                    </tr>
                    <tr>
                        <th style="font-size: 25px;">{{$school->name}}</th>
                    </tr>
                    <tr class="centerAlign ">
                        <td>{{$school->tagline}}</td>
                    </tr>
                    <tr class="centerAlign">
                        <th>{{$school->campus_name}}</th>
                    </tr>
                    <tr class="centerAlign">
                        <td>{{$school->phone}}</td>
                    </tr>
                    <tr class="centerAlign">
                        <td class="bottomLine">{{$school->email}}</td>
                    </tr>

                    <tr class="centerAlign">
                        <td class="bottomLine">
                            <table class="fullWidth">
                                <tr>
                                    <td class="leftAlign"><b>Reg. No:</b>{{$student->registration_no}}</td>
                                    <td class="rightAlign"><b>Voucher:</b>{{$voucher->email}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="leftAlign"><b>Student:</b>{{$student->name}}</td>
                                </tr>
                                <tr>
                                    <td class="leftAlign"><b>Class:</b> {{$student->name}}</td>
                                    <td class="rightAlign"><b>Academic Year:</b> {{$student->name}}</td>
                                </tr>
                                <tr>
                                    <td class="leftAlign"><b>Issued Date:</b>{{$voucher->created_at}}</td>
                                    <td class="rightAlign"><b>Due Date:</b>{{$voucher->due_date}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="feeTable">
                                <tr>
                                    <th class="leftAlign ">No.</th>
                                    <th class="leftAlign">Particulars</th>
                                    <th class="rightAlign">Amount</th>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">1</td>
                                    <td class="leftAlign">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">2</td>
                                    <td class="leftAlign ">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">3</td>
                                    <td class="leftAlign ">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="rightAlign " style="font-size: 20px;">
                        <td class="aboveLine"><b>TOTAL:</b> 34656456</td>
                    </tr>

                    <tr>
                        <th class="leftAlign aboveLine">Note*</th>
                    </tr>

                    <tr>
                        <td class="bottomLine">
                            {{$school->voucher_note}}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Issued By:</b> Maria Anwar
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Accountant:</b>____________________
                        </td>
                    </tr>

                </table>
            </td>
            <td>
                <table class="fullWidth voucherBorder">
                    <tr>
                        <th>Student Copy</th>
                    </tr>
                    <tr>
                        <th style="font-size: 25px;">{{$school->name}}</th>
                    </tr>
                    <tr class="centerAlign ">
                        <td>{{$school->tagline}}</td>
                    </tr>
                    <tr class="centerAlign">
                        <th>{{$school->campus_name}}</th>
                    </tr>
                    <tr class="centerAlign">
                        <td>{{$school->phone}}</td>
                    </tr>
                    <tr class="centerAlign">
                        <td class="bottomLine">{{$school->email}}</td>
                    </tr>

                    <tr class="centerAlign">
                        <td class="bottomLine">
                            <table class="fullWidth">
                                <tr>
                                    <td class="leftAlign"><b>Reg. No:</b>{{$student->registration_no}}</td>
                                    <td class="rightAlign"><b>Voucher:</b>{{$voucher->email}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="leftAlign"><b>Student:</b>{{$student->name}}</td>
                                </tr>
                                <tr>
                                    <td class="leftAlign"><b>Class:</b> {{$student->name}}</td>
                                    <td class="rightAlign"><b>Academic Year:</b> {{$student->name}}</td>
                                </tr>
                                <tr>
                                    <td class="leftAlign"><b>Issued Date:</b>{{$voucher->created_at}}</td>
                                    <td class="rightAlign"><b>Due Date:</b>{{$voucher->due_date}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="feeTable">
                                <tr>
                                    <th class="leftAlign ">No.</th>
                                    <th class="leftAlign">Particulars</th>
                                    <th class="rightAlign">Amount</th>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">1</td>
                                    <td class="leftAlign">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">2</td>
                                    <td class="leftAlign ">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">3</td>
                                    <td class="leftAlign ">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="rightAlign " style="font-size: 20px;">
                        <td class="aboveLine"><b>TOTAL:</b> 34656456</td>
                    </tr>

                    <tr>
                        <th class="leftAlign aboveLine">Note*</th>
                    </tr>

                    <tr>
                        <td class="bottomLine">
                            {{$school->voucher_note}}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Issued By:</b> Maria Anwar
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Accountant:</b>____________________
                        </td>
                    </tr>

                </table>
            </td>
            <td>
                <table class="fullWidth voucherBorder">
                    <tr>
                        <th>Student Copy</th>
                    </tr>
                    <tr>
                        <th style="font-size: 25px;">{{$school->name}}</th>
                    </tr>
                    <tr class="centerAlign ">
                        <td>{{$school->tagline}}</td>
                    </tr>
                    <tr class="centerAlign">
                        <th>{{$school->campus_name}}</th>
                    </tr>
                    <tr class="centerAlign">
                        <td>{{$school->phone}}</td>
                    </tr>
                    <tr class="centerAlign">
                        <td class="bottomLine">{{$school->email}}</td>
                    </tr>

                    <tr class="centerAlign">
                        <td class="bottomLine">
                            <table class="fullWidth">
                                <tr>
                                    <td class="leftAlign"><b>Reg. No:</b>{{$student->registration_no}}</td>
                                    <td class="rightAlign"><b>Voucher:</b>{{$voucher->email}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="leftAlign"><b>Student:</b>{{$student->name}}</td>
                                </tr>
                                <tr>
                                    <td class="leftAlign"><b>Class:</b> {{$student->name}}</td>
                                    <td class="rightAlign"><b>Academic Year:</b> {{$student->name}}</td>
                                </tr>
                                <tr>
                                    <td class="leftAlign"><b>Issued Date:</b>{{$voucher->created_at}}</td>
                                    <td class="rightAlign"><b>Due Date:</b>{{$voucher->due_date}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="feeTable">
                                <tr>
                                    <th class="leftAlign ">No.</th>
                                    <th class="leftAlign">Particulars</th>
                                    <th class="rightAlign">Amount</th>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">1</td>
                                    <td class="leftAlign">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">2</td>
                                    <td class="leftAlign ">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                                <tr class="centerAlign">
                                    <td class="leftAlign ">3</td>
                                    <td class="leftAlign ">Fees</td>
                                    <td class="rightAlign">235634</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="rightAlign " style="font-size: 20px;">
                        <td class="aboveLine"><b>TOTAL:</b> 34656456</td>
                    </tr>

                    <tr>
                        <th class="leftAlign aboveLine">Note*</th>
                    </tr>

                    <tr>
                        <td class="bottomLine">
                            {{$school->voucher_note}}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Issued By:</b> Maria Anwar
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Accountant:</b>____________________
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>
