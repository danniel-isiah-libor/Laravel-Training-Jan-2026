<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <h1>Register Page</h1>

    {{ $first_name }}
    {{ $last_name }}
    {{-- Using ":" to preserve the data type --}}
    <x-input-field :firstName="$first_name" :lastName="$last_name" />
</body>

</html>
