<div style="margin-bottom: 15px; font-size: 14px; color: #6b7280;">
    <a href="{{ url('/') }}" style="color: #3B82F6; text-decoration: none;">Trang chủ</a> 
    
    @if(request()->routeIs('articles.*'))
        > <a href="{{ route('articles.index') }}" style="color: #3B82F6; text-decoration: none;">Articles</a>
    @endif

    @if(request()->routeIs('articles.create'))
        > <span>Tạo bài viết</span>
    @elseif(request()->routeIs('articles.edit'))
        > <span>Sửa bài viết</span>
    @elseif(request()->routeIs('articles.show'))
        > <span>Chi tiết bài viết</span>
    @endif
</div>