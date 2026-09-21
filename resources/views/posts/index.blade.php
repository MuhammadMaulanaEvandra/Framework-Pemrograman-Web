<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    <p>WhatsApp</p>
    @foreach ($posts as $post )
        <h2>{{ $post->title }}</h2>
        @if( $post -> published)
            <span>published</span>
        @else
            <span>draft</span>
        @endif
    @endforeach
</div>
