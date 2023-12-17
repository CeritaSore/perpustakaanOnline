@extends('frontend.index')
@section('container')
    {{-- banner --}}
    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    <div class="main-slider pattern-overlay">
                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">Life of the Wild</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
                                    ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
                                    urna, a eu.</p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
                                            class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div><!--banner-content-->
                            <img src="images/main-banner1.jpg" alt="banner" class="banner-image">
                        </div><!--slider-item-->

                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">Birds gonna be Happy</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
                                    ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
                                    urna, a eu.</p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
                                            class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div><!--banner-content-->
                            <img src="images/main-banner2.jpg" alt="banner" class="banner-image">
                        </div><!--slider-item-->

                    </div><!--slider-->

                    <button class="next slick-arrow">
                        <i class="icon icon-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>

    </section>
    {{-- quoute --}}
    <section id="quotation" class="align-center pb-5 mb-5">
        <div class="inner-content">
            <h2 class="section-title divider">Quote of the day</h2>
            <blockquote data-aos="fade-up">
                <q>“The more that you read, the more things you will know. The more that you learn, the more places
                    you’ll go.”</q>
                <div class="author-name">Dr. Seuss</div>
            </blockquote>
        </div>
    </section>
@endsection
