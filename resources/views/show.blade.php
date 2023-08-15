<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com/"></script>

    <style>
        .dataTables_info{
            background: red;
        }
    </style>

</head>
<body class="bg-gray-50">
   <div class="container w-auto  p-16 mx-auto">
    <div class=" mx-18 ">
        <table id="example" class="text-sm display w-full bg-white table-auto shadow-lg text-center mb-10 mt-7 text-gray-500 " style="width:100%">
            <thead class="text-xs w-10 text-gray-300 uppercase   bg-gray-800  ">
                <tr>
                    <th scope="col" class="px-6 py-3 ">ticket_id</th>
                    <th scope="col" class="px-6 py-3 border border-white">ticket_number</th>
                    <th scope="col" class="px-6 py-3 border border-white">Rating</th>
                    <th scope="col" class="px-6 py-3 border border-white">Status</th>
                    <th scope="col" class="px-6 py-3 border border-white">Comments</th>
                    <th scope="col" class="px-6 py-3 border border-white">Date</th>
                </tr>
            </thead>
           
            <tbody> 
                @foreach ($feedback as $feedback)
                <tr>
                    <td class="px-6 py-4">{{ $feedback->ticket_number }}</td>
                    <td class="px-6 py-4">{{ $feedback->ticket_id }}</td>
                    <td class="px-6 py-4">{{ $feedback->rating }}</td>
                    <td class="px-6 py-4">{{ $feedback->status }}</td>
                    <td class="px-6 py-4">{{ $feedback->comments }}</td>
                    <td class="px-6 py-4">{{ $feedback->date }}</td>
                
                </tr>
                @endforeach
            </tbody>


            <tfoot>
                <tr>
                    <<th>ticket_id</th>
                    <th>ticket_number</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Comments</th>
                    <th>Date</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
   
</body>

<script>
    new DataTable('#example')
    
</script>
</html>
