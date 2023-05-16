<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Contacts</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact['Name'] }}</td>
                    <td>{{ $contact['EmailAddress'] ?? 'N/A' }}</td>
                    <td>{{ $contact['Phones'][0]['PhoneAreaCode'] ?? 'N/A' }} {{ $contact['Phones'][0]['PhoneNumber'] ?? 'N/A' }}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
</body>
</html>