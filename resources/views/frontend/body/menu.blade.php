<div class="menu-bar">
    <div class="nav-area">
        <nav class="navbar navbar-expand-lg navbar-light bg-light btco-hover-menu menubar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i> <span
                                class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($subCategories as $key1 => $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $key1 }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdown_menu3">
                                <div class="col-8">
                                    @foreach ($category as $key2 => $subCategory)
                                        <ul>
                                            <li><a
                                                    href="{{ route('view.section', ['subCategory' => $subCategory->title]) }}">{{ $subCategory->title }}</a>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>

            </div>
        </nav>
    </div>
</div>
