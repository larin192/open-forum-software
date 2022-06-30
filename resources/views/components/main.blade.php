<main class="main-content">
    <div class="main-content__container container">
        <div class="main-content__breadcrumbs">
            Home >
        </div>
        <div class="main-content__content">
            <div class="main-content__category-list">
                @foreach($categories as $category)
                    <div class="main-content__category-header">
                        {{ $category->name }}
                    </div>
                    @foreach($category->children as $child)
                        <div class="main-content__category-row">
                            <div class="category-row__icon"></div>
                            <div class="category-row__name">
                                {{ $child->name }}
                            </div>
                            <div class="category-row__short-desc">
                                {{ $child->short_body }}
                            </div>
                            <div class="category-row__stats"></div>
                            <div class="category-row__last-post"></div>
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="main-content__widgets-list">
                Kolumna druga
            </div>
        </div>
</main>