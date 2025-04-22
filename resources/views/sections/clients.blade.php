<section id="clients">
    <p class="text1">Clients</p>

    <div class="logo-content-wrapper">
        @php
            $clients = \App\Models\Client::all();
            $half = ceil($clients->count() / 2);
            $topRow = $clients->slice(0, $half);
            $bottomRow = $clients->slice($half);
        @endphp

        <div class="logo-row row-top">
            @foreach($topRow as $client)
                <img src="{{ asset('uploads/clients/'.$client->image) }}" alt="Client Logo">
            @endforeach
            @foreach($topRow as $client)
            <img src="{{ asset('uploads/clients/'.$client->image) }}" alt="Client Logo">
            @endforeach
        </div>

        <div class="logo-row row-bottom">
            @foreach($bottomRow as $client)
                <img src="{{ asset('uploads/clients/'.$client->image) }}" alt="Client Logo">
            @endforeach
            @foreach($bottomRow as $client)
            <img src="{{ asset('uploads/clients/'.$client->image) }}" alt="Client Logo">
            @endforeach
        </div>
    </div>
</section>
