
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                @if ($category->children->isNotEmpty())
                    @include('category.category', ['categories' => $category->children])
                @endif
            </li>
        @endforeach
    </ul>
