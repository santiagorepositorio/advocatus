<div>
    @forelse ($this->templates as $templ)
        <div>{{ $templ }}</div>
    @empty
        
    @endforelse
</div>
