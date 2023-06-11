<div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-6 grid-flow-row gap-5">
    @foreach ($books as $book)
        <livewire:components.book-card :book="$book" />
    @endforeach
</div>
