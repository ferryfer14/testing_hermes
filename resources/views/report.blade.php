<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layout.css');
    {{ Html::style('css/timeline.css') }}
    <title>Report</title>
</head>

<body>
    <div class="container">
        <div id="product-row" class="row justify-content-center align-items-center">
            <div id="product-column">
                <div class="card">
                    <div class="card-body text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Transaction</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $document_num = '';
                                    $i = 0;
                                @endphp
                                @foreach ($transaction as $t)
                                    @if ($document_num != $t->document_number)
                                        @if ($i != 0)
                                            </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th scope="row">{{ $t->document_code . $t->document_number }}</th>
                                            <td>{{ $t->user }}</td>
                                            <td>{{ $t->total }}</td>
                                            <td>{{ Date('d-m-Y', strtotime($t->date)) }}</td>
                                            <td>{{ $t->product_name }}x{{ $t->quantity }}<br />
                                            @else
                                                {{ $t->product_name }}x{{ $t->quantity }}<br />
                                    @endif
                                    @php
                                        $i++;
                                        $document_num = $t->document_number;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.js');
    {{ Html::script('js/product.js') }}
</body>

</html>
