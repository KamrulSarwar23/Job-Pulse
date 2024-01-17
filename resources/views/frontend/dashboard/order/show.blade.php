@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shipping_method);
    $coupon = json_decode($order->coupon);
@endphp


@extends('frontend.dashboard.layouts.master')

@section('title')
    {{ $setting->site_name }} || Orders Invoice
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('frontend.dashboard.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>User-Order-invoice</h3>


                        <!--============================INVOICE PAGE START ==============================-->

                        <div class="wsus__invoice_area">
                            <div class="invoice-print">
                                <div class="wsus__invoice_header">
                                    <div class="wsus__invoice_content">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                <div class="wsus__invoice_single">
                                                    <h5>Billing Information</h5>
                                                    <h6>{{ $address->name }}</h6>
                                                    <p>{{ $address->email }}</p>
                                                    <p>{{ $address->phone }}</p>
                                                    <p>{{ $address->address }}, {{ $address->city }}, {{ $address->state }},
                                                        {{ $address->zip_code }} <br> {{ $address->country }}</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                <div class="wsus__invoice_single text-md-center">
                                                    <h5>shipping information</h5>
                                                    <h6>{{ $address->name }}</h6>
                                                    <p>{{ $address->email }}</p>
                                                    <p>{{ $address->phone }}</p>
                                                    <p>{{ $address->address }}, {{ $address->city }},
                                                        {{ $address->state }},
                                                        {{ $address->zip_code }} <br> {{ $address->country }}</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4">
                                                <div class="wsus__invoice_single text-md-end">
                                                    <h5>Order Id #{{ $order->invoice_id }}</h5>
                                                    <h6>Order Status:
                                                        {{ config('order-status.order_status_admin')[$order->order_status]['status'] }}
                                                    </h6>
                                                    <p>Payment Method: {{ $order->payment_method }}</p>
                                                    <p>Payment Status: @if ($order->payment_status == 1)
                                                            Completed
                                                        @else
                                                            Pending
                                                        @endif
                                                    </p>
                                                    <p>Transaction Id : {{ $order->transaction->transaction_id }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wsus__invoice_description">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>

                                                    <th class="name">
                                                        product
                                                    </th>

                                                    <th class="amount">
                                                        Vendor
                                                    </th>

                                                    <th class="amount">
                                                        amount
                                                    </th>

                                                    <th class="quentity">
                                                        quentity
                                                    </th>
                                                    <th class="total">
                                                        total
                                                    </th>
                                                </tr>
                                                @php
                                                    $total = 0; // Move this line outside the loop
                                                @endphp
                                                @foreach ($order->orderProduct as $product)
                                                    @php
                                                        $variants = json_decode($product->variants);

                                                        $total += $product->unit_price * $product->qty;
                                                    @endphp
                                                    <tr>
                                                        <td class="name">
                                                            <p>{{ $product->product_name }}</p>
                                                            @foreach ($variants as $key => $item)
                                                                <span>{{ $key }} : {{ $item->name }}
                                                                    {{ $setting->currency_icon }}{{ $item->price }}</span>
                                                            @endforeach
                                                        </td>

                                                        <td class="amount">
                                                            {{ $product->vendor->shop_name }}
                                                        </td>

                                                        <td class="amount">
                                                            {{ $setting->currency_icon }}{{ $product->unit_price }}
                                                        </td>

                                                        <td class="quentity">
                                                            {{ $product->qty }}
                                                        </td>

                                                        <td class="total">
                                                            {{ $setting->currency_icon }}{{ ($product->unit_price + $product->variants_total) * $product->qty }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="wsus__invoice_footer">
                                    <p><span>Sub Total:</span>{{ @$setting->currency_icon }}{{ @$order->sub_total }} </p>

                                    @if (!empty($coupon->discount))
                                    <p><span>Coupon:</span>{{ @$setting->currency_icon }}{{ @$coupon->discount ? @$coupon->discount : 0}} </p>
                                    @endif

                                    @if (!empty($coupon->discount))
                                    <p><span>Shipping Fee:</span>{{ @$setting->currency_icon }}{{ @$shipping->cost }} </p>
                                    @endif

                                   
                                    <p><span>Total Amount:</span>{{ @$setting->currency_icon }}{{ @$order->amount }} </p>
                                </div>
                            </div>

                            <div class="col-md-12 text-end mt-3">
                                <button class="btn btn-success print-invoice">Print</button>
                            </div>
                        </div>

                        <!--============================INVOICE PAGE END==============================-->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $('.print-invoice').on('click', function() {
            let printBody = $('.invoice-print');
            let originalContents = $('body').html();

            $('body').html(printBody.html());
            window.print();

            $('body').html(originalContents);
        })
    </script>
@endpush
