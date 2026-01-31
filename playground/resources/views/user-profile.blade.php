<div>
    {{-- Fullname: {{ $fullName }} --}}
    <x-user-data label="Full Name" :value="$fullName" />


    {{-- Email: {{ $email }} --}}
    <x-user-data label="Email" :value="$email" />


    <x-user-data label="Username" :value="$userName" />
    {{-- Username: {{ $userName }} --}}



    {!! $render !!}
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</div>
