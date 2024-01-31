<!-- resources/views/components/tag-checkbox.blade.php -->

<div>
    <br>
    <h2>Purpose of property</h2>
    @foreach ($tags as $key => $label)
        <div class="form-check">
           
            <input
                class="form-check-input"
                type="checkbox"
                name="tags[]"
                value="{{ $key }}"
                id="tag-{{ $key }}"
                @if (in_array($key, $selectedTags)) checked @endif
            >
            <label class="form-check-label" for="tag-{{ $key }}">
                {{ $label }}
            </label>
        </div>
    @endforeach
    <br>
</div>
