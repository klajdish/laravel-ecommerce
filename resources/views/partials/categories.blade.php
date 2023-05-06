<ul class="list-group">
    @foreach ($categories as $category)
        <li class="list-group-item">
            <a class="text-decoration-none h6" href="{{ route('shop', ['category' => $category->name, 'category_id' => $category->id]) }}">{{ $category->name }}</a>
            @if (count($category->children))
                @include('partials.categories', ['categories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>
