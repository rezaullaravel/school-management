<div class="banner-area">
    <div class="slider" id="slider1">
        @php
            $sliders = App\Models\Slider::all();

        @endphp

        @foreach ($sliders as $slider)
            <div
                style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset($slider->image) }}); background-position: center; background-size: cover;">
            </div>
        @endforeach

        <a href="/" style="position: absolute; top:6px; height: 80px; width:80px; left:6px; z-index:999;"><img
                src="{{ asset($setting->logo) }}" class="img-fluid rounded"></a>
        <span class="titleBar">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $setting->title }}
                <br>
                <p style="padding-left: 15rem;  margin-top: 10px; font-size:17px;">
                    স্থাপিত : {{ $setting->date }}</p>
            </span><br>
        </span>
    </div>
</div>
