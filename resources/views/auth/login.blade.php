<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
             <a href="." aria-label="Tabler" class="navbar-brand navbar-brand-autodark">
                 {{panel()->getBrandName()}}
             </a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">@lang('sentosa::base.login_to_your_account')</h2>
                @include('sentosa::components.partials.errors')
                <form method="post" autocomplete="off" novalidate="">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">@lang('sentosa::base.email_address')</label>
                        <input type="email" required name="email" class="form-control" placeholder="your@email.com"
                               autocomplete="off">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            @lang('sentosa::base.password')
                            <span class="form-label-description">
                  </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" required name="password" class="form-control" placeholder="Your password"
                                   autocomplete="off">
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">@lang('sentosa::base.login')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
