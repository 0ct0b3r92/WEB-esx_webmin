@extends("layouts")

@section("content")

    <div class="row">
        <div class="col-md-12 my-5 text-center">
            <div class="text-danger">
                <i class="batch-icon batch-icon-link-alt batch-icon-xxl"></i>
                <i class="batch-icon batch-icon-search batch-icon-xxl"></i>
                <i class="batch-icon batch-icon-link-alt batch-icon-xxl"></i>
            </div>
            <h1 class="display-1">404</h1>
            <div class="display-4 mb-3">@lang('template.404.title')</div>
            <div class="lead">@lang('template.404.message') <a href="{{ url("/") }}">@lang('template.404.link')</a></div>
        </div>
    </div>
    <div class="row mb-5 justify-content-center">
        <div class="col-md-6">
            <form class="my-2 my-lg-0 no-waves-effect">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="@lang('template.search.placeholder')">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-gradient waves-effect waves-light" type="button">@lang('template.search.button')</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection