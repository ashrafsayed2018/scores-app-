<div>
     <div class="btn_wrap">
        <span>شارك الموقع</span>
        <div class="share-wrapper">
            @foreach ($socialShare as $name =>  $share)
                @if ($name == "facebook")
                <a href="{{ $share }}">
                    <i class="fab fa-{{ $name }}-f text-2xl leading-4 {{ $name }}"></i>
                </a>
                @else
                <a href="{{ $share }}">
                    <i class="fab fa-{{ $name }} text-2xl leading-4 {{ $name }}"></i>
                </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
