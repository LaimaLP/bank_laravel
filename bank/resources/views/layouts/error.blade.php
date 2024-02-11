@if (session('error'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> {{ session('error') }}
            </div>
        </div>
    </div>
</div>
@endif