@if ($image)
    <img id="preview" src="{{ 'public/task/' . $image }}" alt="Preview" class="form-group hidden" width="50"
        height="50">
@else
    <img id="preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="50"
        height="50">
@endif
