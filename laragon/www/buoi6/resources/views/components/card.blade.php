<div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    @if(isset($title))
        <div style="border-bottom: 1px solid #eee; margin-bottom: 10px; padding-bottom: 8px;">
            <h3 style="margin: 0; color: #333;">{{ $title }}</h3>
        </div>
    @endif
    <div>
        {{ $slot }}
    </div>
</div>