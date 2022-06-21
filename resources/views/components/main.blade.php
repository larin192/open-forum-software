<main class="main-content">
    <div class="main-content__container container">
        <div class="main-content__breadcrumbs">
            Home
        </div>
        <div class="main-content__content">
            <div class="main-content__category-list">
                @foreach($categories as $category)
                    <div class="main-content__category-header">
                        {{ $category->name }}
                    </div>
                    @foreach($category->children as $child)
                        {{ $child->name }}
                    @endforeach
                @endforeach
            </div>
            <div class="main-content__widgets-list">
                Kolumna druga
            </div>
        </div>
</main>