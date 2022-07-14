<div class="row">
    @foreach ($products as $index => $p)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{ asset('uploads') }}/{{ $p->img }}">
                    <ul class="product__hover">
                        <li><a href="#"><img src="{{ asset('mainassets/img/icon/heart.png') }}" alt=""></a>
                        </li>
                        <li><a href="/product-details/{{ $p->id }}"><img
                                    src="{{ asset('mainassets/img/icon/search.png') }}" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>{{ $p->ProdName }}</h6>
                    <form action="/cart/order" method="POST">
                        @csrf
                        <input name="idPd" value="{{ $p->id }}" hidden>
                        <button type="submit" name="add" class="add-cart btn btn-primary p-1">+ Add To
                            Cart</button>
                    </form>
                    <div class="rating">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h5>{{ $p->prix }}</h5>
                </div>
            </div>
        </div>
    @endforeach
</div>
