@component('mail::message')
    # Dobrodošli,

    U prilogu Vam dostavljamo kod za ulazak u aplikaciju: {{$password}}
    {{--@component('mail::button', ['url' => ''])
    Button Text
    @endcomponent--}}

    Hvala na ukazanom poverenju,
    EACS
@endcomponent
