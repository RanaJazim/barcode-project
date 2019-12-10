
<div class="card">
    <div class="card-body">
        <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="{{ $icon ?? 'fa fa-usd' }}" aria-hidden="true" style="color: {{ $color ?? 'green' }}"></i></div>
            <div class="stat-content dib">
                <div class="stat-digit">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>