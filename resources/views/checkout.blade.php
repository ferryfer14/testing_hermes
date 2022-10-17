<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layout.css');
    {{ Html::style('css/timeline.css') }}
    <title>Checkout</title>
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
                                                <div class="inner-circle"></div>
                                            </div>
                                        </div>
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
                                    </div>
                                </div>
                            </div>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($product as $p)
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <img src="{{ asset('/images/soklin.jpg') }}" height="150px"
                                                    width="150px">
                                            </div>
                                            <div class="col-md-5 text-left justify-content-left">
                                                <p>
                                                    {{ $p->product_name }}
                                                </p>
                                                <div class="row align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="number" readonly name="qty"
                                                                placeholder="qty" id="qty" value="2"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        PCS
                                                    </div>
                                                </div>
                                                <p>
                                                    Rp. {{ number_format($p->price * 2, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $subtotal += $p->price * 2;
                                @endphp
                            @endforeach
                            <div class="d-flex justify-content-center">
                                <div class="col-md-4 mt-5">
                                    <div class="border border-dark text-center">
                                        <input type="text" hidden value="{{ $subtotal }}" id="subtotal" />
                                        <p>Total : Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
                                    </div>
                                    <button class="form-control btn-primary mt-2 confirm">CONFIRM</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.js');
    {{ Html::script('js/checkout.js') }}
</body>

</html>
