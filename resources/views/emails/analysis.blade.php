@component('mail::message')
    # Poštovani,

    Nova analiza je napisana od strane autora: {{$user->first_name . ' ' . $user->last_name}}
    Status: {{$analysis->status}}
    Title: {{$analysis->title}}
    Created at: {{$analysis->created_at}}

    Prijatan dan,
    CSA
@endcomponent
