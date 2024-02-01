@if (session('info'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="alert alert-info" role="alert">
                <strong>Info!</strong> {{ session('info') }}
            </div>
        </div>
    </div>
</div>
@endif