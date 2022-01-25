@extends('frontend.layouts.layout-form')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

        </style>
    </head>

        <div class="from-control">
            <h2>Merit</h2>
            <h1>You Just able Once to View Marks
            </h1>
            <table>
                <tr>
                    <th>Total marks</th>
                    <th>Total Obtain Marks</th>
                    <th>Student Merit</th>
                </tr>
                <tr>
                    <td>{{ $total_marks }}</td>
                    <td>{{ $total_obtain_mark }}</td>
                    <td>{{ $student_merit_total }}</td>
                </tr>

            </table>
        </div>

  

    </html>

@endsection
