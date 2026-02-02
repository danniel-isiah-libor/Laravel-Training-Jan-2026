<div>
    <x-user-data label="Fullname" :value="$fullName" />

    <br>

    <x-user-data label="Email" :value="$email" />

    <br>

    <x-user-data label="Username" :value="$userName" />

    <br>

    {!! $render !!}

    <?php
    echo $render;
    ?>
</div>