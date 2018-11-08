<label for="size">Size</label>
<select class="selectpicker" data-live-search="true" name="size_id[]" multiple id="size">
    @foreach($allSizes as $size)
        <option data-tokens="ketchup mustard" value="{{$size['id']}}" {{ ($size->id == old('size_id'))?'selected' :'' }}> {{$size['size_1']}}</option>
    @endforeach
</select>