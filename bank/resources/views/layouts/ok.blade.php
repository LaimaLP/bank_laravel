@if (session('ok'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ session('ok') }}
            </div>
        </div>
    </div>
</div>
@endif