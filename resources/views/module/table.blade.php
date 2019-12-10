
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">{{ $title ?? 'All Record' }}</p>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-bordered">
                    {{ $slot }}
                </table>
            </div>
        </div>
    </div>
</div>
