<div class="left-body">

    <div class="leftbody-single-box">
        <div class="left-body-boxtitle">
            <b>অধ্যক্ষের বার্তা</b>
        </div>
        @if (!empty($principal->image))
        <div class="box-image">
            <img src="{{  asset($principal->image) }}" class="img-fluid" alt="Principal Image">
        </div>
        @else

        @endif
        <div class="designation">
            <span>অধ্যক্ষ</span>
        </div>
        <div class="subtitle">
            <span>{{ $setting->title }}</span>
        </div>
        <div class="box-link">
            @if (!empty($principal->id))
            <a href="{{ route('view.principalDescription', [$principal->id]) }}">বার্তা....</a>
            @else

            @endif
        </div>
    </div>


    <div class="leftbody-single-box">
        <div class="left-body-boxtitle">
            <b>গুরুত্বপূর্ণ লিংক</b>
        </div>
        <div class="feature">
            <a href="http://www.ntrca.gov.bd
            " target="_blank">
                <li><i class="fa fa-caret-right"></i> বেসরকারি শিক্ষক নিবন্ধন ও প্রত্যয়ন কতৃপক্ষ (এনটিআরসিএ)</li>
            </a>
            <a href="https://dshe.gov.bd
            " target="_blank">
                <li><i class="fa fa-caret-right"></i> মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</li>
            </a>
            <a href="https://moedu.gov.bd
            " target="_blank">
                <li><i class="fa fa-caret-right"></i> শিক্ষা মন্ত্রণালয়</li>
            </a>
            <a href="https://rajshahieducationboard.gov.bd/
            " target="_blank">
                <li><i class="fa fa-caret-right"></i> রাজশাহী শিক্ষা বোর্ড</li>
            </a>
            <a href="https://bteb.gov.bd
            " target="_blank">
                <li><i class="fa fa-caret-right"></i> কারিগরি শিক্ষা বোর্ড</li>
            </a>
            <a href="https://deo.dhaka.gov.bd
            " target="_blank">
                <li><i class="fa fa-caret-right"></i> জেলা শিক্ষা অফিস</li>
            </a>
            <a href="https://www.nu.ac.bd" target="_blank">
                <li><i class="fa fa-caret-right"></i> জাতীয় বিশ্ববিদ্যালয়</li>
            </a>
            <a href="http://xiclassadmissiongovbd.com
            " target="_blank">
                <li><i class="fa fa-caret-right"></i> এইচএসসি অ্যাডমিশন</li>
            </a>
        </div>
    </div>

    <div class="leftbody-single-box">
        <div class="left-body-boxtitle">
            <b>গুগল ম্যাপ</b>
        </div>
        <div class="map">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d621.8092580882015!2d89.59416879001553!3d24.17855807285115!2m2!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdd9b0f3193417%3A0x7ea6f6c388c2b472!2sShahzadpur%20Institute%20of%20engineering%20%26%20technology!5e1!3m2!1sen!2sbd!4v1709747071192!5m2!1sen!2sbd"
                width="300" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>

    <div class="leftbody-single-box">
        <div class="left-body-boxtitle">
            <b>ফেইসবুক পেইজ</b>
        </div>
        <div class="map">
            <div class="fb-page" data-href="https://www.facebook.com/sietpolytechnic12" data-tabs="timeline"
                data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
                data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/sietpolytechnic12" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/sietpolytechnic12">Shahzadpur Institute of Engineering &
                        Technology</a>
                </blockquote>
            </div>
            Page</a>
        </div>
    </div>


    <div class="leftbody-single-box">
        <div class="left-body-boxtitle">
            <b>জাতীয় সংগীত</b>
        </div>
        <div class="map">
            <iframe width="180" height="150" src="https://www.youtube.com/embed/SjefET6W3q4"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>


</div>
