
@php
    $sliders = App\Models\Slider::all();
    $active = true;
@endphp

<ul class="slider">
    @foreach ($sliders as $slider)
    <li class="{{ $active ? 'active':'' }}">
        <div class="banner-w3ls-1" style="background-image: url('{{ asset($slider->image) }}');">
        </div>
    </li>
    @php
        $active = false;
    @endphp
    @endforeach
</ul>
{{-- <ul class="pager">
    <li data-index="0" class="active"></li>
    <li data-index="1"></li>
    <li data-index="2"></li>
    <li data-index="3"></li>
    <li data-index="4"></li>
</ul> --}}
<div class="banner-text-posi-w3ls">
    <div class="banner-text-whtree">
        <h3 class="text-capitalize text-white p-4">Education is the backbone of a nation!</b>
        </h3>
        <p class="px-4 py-3 text-dark">Your bright future is our mission!</p>
        {{-- <a href="about.html" class="button-agiles text-capitalize text-white mt-sm-5 mt-4">read more</a> --}}
    </div>
</div>
