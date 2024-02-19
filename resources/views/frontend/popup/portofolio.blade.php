<div class="row align-items-center">
    <div class="col-lg-6">
        <div class="portfolio-popup-thumbnail">
            <div class="image">
                <img class="w-100" src="{{ $data->image->path }}" alt="slide">
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="text-content">
            <h3>
                <span>{{ $data->category }}</span> {{ $data->name }}
            </h3>
            <p>
                {!! str_replace("\r\n", "<br>", $data->description) !!}
            </p>
            @if (!empty($data->url))
                <div class="button-group mt--20">
                    <a href="{{ $data->url }}" class="rn-btn" target="_BLANK">
                        <span>VIEW PROJECT</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M13 4.5L19.4393 10.9393C20.0251 11.5251 20.0251 12.4749 19.4393 13.0607L13 19.5"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="bevel" stroke-width="2" d="M19.5 12L3.5 12"/></svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
