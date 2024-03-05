@extends('company.layouts.master')

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="row">
                                    @foreach ($plugins as $plugin)
                                        <div class="col-md-4 text-center mb-3">
                                            <div class="card py-3">
                                                <form action="{{ route('company.plugin.active') }}" method="POST">
                                                    @csrf
                                                    <h4 class="text-info">{{ $plugin->name }}</h4>
                                                    <input type="hidden" value="{{ $plugin->id }}" name="plugin_id">
                                                    <input type="hidden" value="{{ auth()->user()->id }}"
                                                        name="company_id">

                                                    @if ($plugin->companyPlugins)
                                                        <a type="submit" class="btn btn-danger"
                                                            href="{{ route('company.plugin.deactivate', $plugin->companyPlugins->id) }}">Dactivate</a>
                                                    @else
                                                        <button type="submit"
                                                            class="activate btn btn-primary">Activate</button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
