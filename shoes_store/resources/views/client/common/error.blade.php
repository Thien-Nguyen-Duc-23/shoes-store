<style>
    .woocommerce-message-danger {
        background-color: #F78181;
    }
    .woocommerce-message-success {
        background-color: #6DD09D;
    }
</style>

@if(Session::has('message'))
    <div class="woocommerce-notices-wrapper">
        <div class="woocommerce-message-css woocommerce-message-{!! Session::get('flag') !!}" role="alert">
            <p class="with-button"></p>
            <p class="with-button">
                {!! Session::get('message') !!}</p>
            <p></p>
        </div>
    </div>
@endif
