<section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset('assets/img/categories/cat-1.jpg') }}">
                                <h5><a href="#">{{$category->type}}</a></h5>
                            </div>
                        </div>

                    @endforeach




                </div>
            </div>
        </div>
    </section>
