<!-- resources/views/contact_info.blade.php -->

<div class="py-2 px-5">
    @foreach ($contactInfos as $contactInfo)
        <div>
            <div>Email: {{ $contactInfo->email }}</div>
            <div>Telephone Number: {{ $contactInfo->telephone_number }}</div>
            <div>Cellphone Number: {{ $contactInfo->cellphone_number }}</div>
            <div>Home Address: {{ $contactInfo->home_address }}</div>
            <div>Country: {{ $contactInfo->country }}</div>
            <div>City: {{ $contactInfo->city }}</div>
            <div>Province: {{ $contactInfo->province }}</div>
            <div>Region: {{ $contactInfo->region }}</div>
            <div>Postal Code: {{ $contactInfo->postal_code }}</div>
            <div>LinkedIn Account Link: {{ $contactInfo->linkedin_account_link }}</div>
        </div>
        <hr>
    @endforeach
</div>