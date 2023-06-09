<!DOCTYPE html>
<html>

<head>
    <title>Hi</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

        *,
        *:before,
        *:after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #105469;
            font-family: 'Open Sans', sans-serif;
            align-items: center;
        }

        table {
            background: #012B39;
            border-radius: 0.25em;
            border-collapse: collapse;
            margin: 1em;
        }

        th {
            border-bottom: 1px solid #364043;
            color: #E2B842;
            font-size: 0.85em;
            font-weight: 600;
            padding: 0.5em 1em;
            text-align: left;
        }

        td {
            color: #fff;
            font-weight: 400;
            padding: 0.65em 1em;
        }

        .disabled td {
            color: #4F5F64;
        }

        tbody tr {
            transition: background 0.25s ease;
        }

        tbody tr:hover {
            background: #014055;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID
                <th>First Name
                <th>Last Name
                <th>Goes By
                <th>Gender
                <th>Class
                <th>Alive
        </thead>
        <tbody>
            <tr>
                <td>1
                <td>Malcolm
                <td>Reynolds
                <td>Mal, Cap'n
                <td>M
                <td>Captain
                <td>Yes
            <tr>
                <td>2
                <td>Zoe
                <td>Washburn
                <td>Zoe
                <td>F
                <td>First Mate
                <td>Yes
            <tr class="disabled">
                <td>3
                <td>Hoban
                <td>Washburn
                <td>Wash
                <td>M
                <td>Pilot
                <td>No
            <tr>
                <td>4
                <td>Kaylee
                <td>Frye
                <td>Kaylee
                <td>F
                <td>Mechanic
                <td>Yes
            <tr>
                <td>5
                <td>Jayne
                <td>Cobb
                <td>Jayne
                <td>M
                <td>Muscle
                <td>Yes
            <tr class="disabled">
                <td>6
                <td>[unknown]
                <td>Book
                <td>Shepherd
                <td>M
                <td>Passenger
                <td>No
            <tr>
                <td>7
                <td>Simon
                <td>Tam
                <td>Simon
                <td>M
                <td>Passenger
                <td>Yes
            <tr>
                <td>8
                <td>River
                <td>Tam
                <td>River
                <td>F
                <td>Passenger
                <td>Yes
        </tbody>
    </table>
</body>

</html>
