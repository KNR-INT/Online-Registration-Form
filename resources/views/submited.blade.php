<!DOCTYPE html>
<html>

<head>
    @include('head')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        h2 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 2px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="justify-content-center">
            <h2><b>Submitted Application</b></h2>
        </div>
        <div class="card-body table-responsive p-1">
            <table class="table table-bordered table-hover" id="Applications">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Application No</th>
                        <th>Download Application</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->class }}</td>
                        <td>{{ $item->application_no }}</td>
                        <td>
                        @if($item->class == 'Grade 1' || $item->class == 'Grade 2' || $item->class == 'Grade 3' || $item->class == 'Grade 4' || $item->class == 'Grade 5' || $item->class == 'Grade 6' || $item->class == 'Grade 7' || $item->class == 'Grade 8' || $item->class == 'Grade 9' || $item->class == 'Grade 11')
                            <a href="{{ url('download_forms') }}/a?class={{ $item->link_class }}&appli_id={{ $item->id }}"class="d-block">Download Application Form & Admit Card</a>
                        @else
                            <a href="{{ url('download_forms') }}/a?class={{ $item->link_class }}&appli_id={{ $item->id }}"class="d-block">Download Application Form</a>
                        @endif
                        <a href="{{ url('download_fee_reciepts') }}/a?class={{ $item->link_class }}&appli_id={{ $item->id }}"class="d-block">Download Fee Receipt</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
</head>

</html>
@include('footer')


