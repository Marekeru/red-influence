<section id="team">
    <p class="text1">Team</p>
    <div class="container">
        <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $members = \App\Models\Member::all();
                    $chunkedMembers = $members->chunk(3);
                    $isFirst = true;
                @endphp
                @foreach ($chunkedMembers as $chunk)
                    <div class="carousel-item @if ($isFirst) active @endif">
                        <div class="row">
                            @foreach ($chunk as $member)
                                <div class="col-4 text-center">
                                    <div class="team-member">
                                        <img src="{{ asset('uploads/members/'.$member->image) }}" alt="{{ $member->name }}" class="img-fluid member-img mb-2">
                                        <div class="member-info">
                                            <h5>{{ $member->name }}</h5>
                                            <p>
                                                SOCIAL MEDIA<br>
                                                CONTENT CREATION<br>
                                                ADULT CREATOR<br>
                                                SUPPORT<br>
                                                CEO
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @php
                        $isFirst = false;
                    @endphp
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev" onclick="moveSlide(-1)">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next" onclick="moveSlide(1)">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<script>
    function moveSlide(direction) {
        var carousel = document.querySelector('#teamCarousel');
        var carouselInstance = new bootstrap.Carousel(carousel);
        carouselInstance.to(carouselInstance._activeIndex + direction);
    }
</script>
