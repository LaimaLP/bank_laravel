<div class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <form action="{{ route('accounts-transfer') }}" method="get">
                    <button type="submit" class="btn-close"></button>
                    @csrf
                </form>
            </div>
            <div class="modal-body">
                <p> Operation more than 1000 euros need confirmation. </p>
            </div>
            <div class="modal-footer">

                <form action="{{ route('accounts-transfer') }}" method="get">
                    <button type="submit" data-close class="btn btn-secondary">Ne</button>
                    @csrf
                </form>
                <form action="{{ route('accounts-transferUp') }}" method="post">
                    <button type="submit" data-destroy class="btn btn-primary">Transfer</button>
                    @csrf
                    @method('put')
                </form>
            </div>
        </div>
    </div>
</div>