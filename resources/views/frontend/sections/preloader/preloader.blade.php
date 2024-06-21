@isset ($preloader)
    @php
        $word = $preloader->preloader_text;
        $letters = str_split($word);
    @endphp
        <!-- preloader -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                @foreach ($letters as $letter)
                    <span data-text-preloader="{{ $letter }}" class="letters-loading">
                      {{ $letter }}
                    </span>
                @endforeach
            </div>
            <p class="text-center">{{ $preloader->subtitle }}</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- preloader -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                    <span data-text-preloader="X" class="letters-loading">
                       X
                    </span>
                <span data-text-preloader="M" class="letters-loading">
                       M
                    </span>
                <span data-text-preloader="O" class="letters-loading">
                       O
                    </span>
                <span data-text-preloader="Z" class="letters-loading">
                       Z
                    </span>
                <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
@endisset
