@extends('frontend.layouts.master')

@section('title')
    {{ $setting->site_name }} || Vendors
@endsection


@section('content')

<!--============================BREADCRUMB START==============================-->
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>vendors</h4>
                    <ul>
                        <li><a href="{{ route('home.page') }}">home</a></li>
                        <li><a href="javascript:;">vendors</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================BREADCRUMB END==============================-->



<!--============================VENDORS START==============================-->

<section id="wsus__product_page" class="wsus__vendors">
    <div class="container">
        <div class="row">
      
            <div class="col-xl-12">
                <div class="row">
            
                    @foreach ($vendor as $item)
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__vendor_single">
                            <img src="{{ asset($item->banner) }}" alt="vendor" class="img-fluid w-100">
                            <div class="wsus__vendor_text">
                                <div class="wsus__vendor_text_center">
                                    <h4 class="mb-3">{{ $item->shop_name }}</h4>
                            
                                    <a href="javascript:;"><i class="far fa-phone-alt"></i>
                                        +{{ $item->phone }}</a>
                                    <a href="javascript:;"><i class="fal fa-envelope"></i>
                                        {{ $item->email }}</a>
                                    <a href="{{ route('vendor.product', $item->id) }}" class="common_btn">visit store</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-12">
                @if ($vendor->hasPages())
                {{ $vendor->links() }}
            @endif
            </div>
        </div>
    </div>
</section>

<!--============================VENDORS END ==============================-->
@endsection




