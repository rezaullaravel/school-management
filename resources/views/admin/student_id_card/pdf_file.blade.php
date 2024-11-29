<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .id-card {
                width: 400px;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 20px;
                margin: 0 auto;
                margin-bottom: 25px;
            }
            .id-card img {
                width: 100%;
                border-radius: 5px;
            }
            .id-card .details {
                margin-top: 20px;
            }
            .id-card .details table {
                width: 100%;
            }
            .id-card .details table tr {
                border-bottom: 1px solid #ccc;
            }
            .id-card .details table tr:last-child {
                border-bottom: none;
            }
            .id-card .details table td {
                padding: 5px 0;
            }
        </style>
    </head>

    <body>

        @foreach ($data as $student)
        <div class="id-card">
            <img src="{{ public_path($student->image) }}" alt="Student Image" width="100px">
            <div class="details">
                <table>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Reg:</strong></td>
                        <td>{{ $student->registration }}</td>
                    </tr>
                    <tr>
                        <td><strong>Class:</strong></td>
                        <td>{{ $student->clas->class_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Roll Number:</strong></td>
                        <td>{{ $student->roll }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
    </body>
</html>
