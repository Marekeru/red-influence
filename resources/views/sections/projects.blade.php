<section id="projects" class="py-10">
    <p class="heading">Projects</p>

    @php
        $original = \App\Models\Project::all()->toArray();
        $merged  = array_merge($original, $original);
        $projects = collect($merged);
    @endphp

    <div class="swiper-container">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach($projects as $project)

                    <div class="swiper-slide {{ $loop->odd ? 'top' : 'bottom' }}">
                        <div class="red-box-top"></div>
                        <video src="{{ asset('uploads/projects/'.$project['video']) }}" preload="metadata" loading="lazy" autoplay muted loop playsinline>
                        </video>
                        <div class="red-box-bottom"></div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!--<div class="swiper-pagination"></div>-->
        </div>
        <div class="box-bottom"></div>
    </div>
</section>

