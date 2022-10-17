<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layout.css');
    {{ Html::style('css/timeline.css') }}
    <title>Product</title>
</head>

<body>
    <div class="container">
        <div id="product-row" class="row justify-content-center align-items-center">
            <div id="product-column">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                        <div class="timeline-step">
                                            <div class="timeline-content" data-toggle="popover" data-trigger="hover">
                                                <div class="inner-circle-now"></div>
                                            </div>
                                        </div>
                                        <div class="timeline-step">
                                            <div class="timeline-content" data-toggle="popover" data-trigger="hover">
                                                <div class="inner-circle"></div>
                                            </div>
                                        </div>
                                        <div class="timeline-step">
                                            <div class="timeline-content" data-toggle="popover" data-trigger="hover">
                                                <div class="inner-circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($product as $p)
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <img src="{{ asset('/images/soklin.jpg') }}" height="150px"
                                                    width="150px">
                                            </div>
                                            <div class="col-md-5 text-left">
                                                <p>
                                                    {{ $p->product_name }}
                                                    <br />
                                                    @if ($p->discount != 0)
                                                        <s>Rp. {{ number_format($p->price, 0, ',', '.') }}</s><br />
                                                        Rp.
                                                        {{ number_format($p->price - ($p->price * $p->discount) / 100, 0, ',', '.') }}
                                                    @else
                                                        Rp. {{ number_format($p->price, 0, ',', '.') }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <button id="{{ $p->id }}"
                                                    class="form-control btn-primary buy">BUY</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                <div class="col-md-4 mt-5">
                                    <button class="form-control btn-primary checkout">CHECKOUT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.detail_product');
    @include('layout.js');
    {{ Html::script('js/product.js') }}
</body>

</html>
