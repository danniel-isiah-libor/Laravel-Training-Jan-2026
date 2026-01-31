<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <x-alert />

        <x-page-title title="Register Page" subtitle="create your account" />

        <x-input-field :firstName="$first_name" :lastName="$last_name" />
    </body>

</html>
