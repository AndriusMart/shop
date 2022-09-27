<select name="sub_category"  class="form-select mt-3 mb-3">
    @foreach($subCategories as $subCategory)
    <option value="{{$subCategory->id}}" >{{$subCategory->sub_category}}</option>
    @endforeach
</select>