<div class="left-body">
    @php
        $notice_board = App\Models\Notice::orderBy('id', 'DESC')->get()->take(5);
    @endphp

    <div class="notice-board">
        <img src="{{ asset('/') }}frontend/assets/image/globe.png" class="img-fluid">
        <div class="notice-list">
            <div class="title">
                <b>নোটিশ বোর্ড</b>
            </div>
            <div class="notices">
                <ul>
                    @foreach ($notice_board as $item)
                        <li><i class="fa fa-caret-right"></i><a
                                href="{{ route('view.notice', ['notice' => $item->title]) }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="all-notices">
                    <a href="#">সকল নোটিশ</a>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="about_institute">
        <div class="sec-title">
            <b>প্রতিষ্ঠান সম্পর্কে</b>
        </div>
        <div class="sec-text">
            <p>সিরাজগঞ্জ জেলার শাহজাদপুরা উপজেলার স্বনামধন্য প্রতিষ্ঠান  শাহ্জাদপুর ইন্সটিটিউট অব ইঞ্জিনিয়ারিং এন্ড টেকনোলজি এই এলাকার মানুষের উচ্চ শিক্ষার সুব্যবস্থা করার মানসে এই এলাকারই কৃতি সন্তান বিশিষ্ট ব্যবসায়ী ও শিক্ষানুরাগী মোঃ মুকুল হোসেন প্রতিষ্ঠা করেন, শাহ্জাদপুর ইন্সটিটিউট অব ইঞ্জিনিয়ারিং এন্ড টেকনোলজি  প্রতিষ্ঠালগ্ন থেকেই এই প্রতিষ্ঠানের লক্ষ্য ছিলো শিক্ষার আলো ছড়িয়ে দেওয়া এবং এই কাজটি সঠিক ভাবেই পালন করে যাচ্ছে এই প্রতিষ্ঠানটি।ঠান।</p>
        </div>
    </div> --}}

    <div class="section-box">
        <div class="row">
            @foreach ($subCategories as $key => $category)
                @if ($key == 'আমাদের সম্পর্কে')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>{{ $key }}</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/1.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key == 'প্রশাসনিক তথ্য')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>প্রশাসনিক তথ্য</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/2.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key == 'শিক্ষক ও কর্মচারী')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>শিক্ষক ও কর্মচারী</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/3.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key == 'একাডেমিক')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>একাডেমিক তথ্য</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/4.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key == 'পরীক্ষা')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>পরীক্ষা সংক্রান্ত তথ্য</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/5.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key == 'ফলাফল')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>ফলাফল</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/6.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key == 'গ্যালারী')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>গ্যালারী</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/7.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key == 'ভর্তি সংক্রান্ত তথ্য')
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="box-single">
                            <div class="box-title">
                                <b>ভর্তি সংক্রান্ত তথ্য</b>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon">
                                            <img src="{{ asset('/') }}frontend/assets/image/icons/3.jpg">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="list">
                                            <ul>
                                                @foreach ($category as $item)
                                                    <li><i class="fa fa-caret-right"></i><a
                                                            href="{{ route('view.section', ['subCategory' => $item->title]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


</div>
