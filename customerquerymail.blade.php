<x-mail::message>
# Hi {{$request['name']}},
   Thank you for your interest in our property.
   You have some query on our property,
   Your query : {{$request['message']}}
   Query property type and sales-type : {{$request['type']}}
   Your query related answer, {{$request['replymessage']}}


<x-mail::button :url="/property-listing">
View property
</x-mail::button>

Thanks,<br>
{{ $request['ownername'] }}
</x-mail::message>
