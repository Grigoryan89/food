@foreach($subcategories_id_array as $subcategory_id)
    <tr>
        <td class="sub_category_{{$depth}}">
            {{$categories->get($subcategory_id)->name}}
        </td>
        <td>
            <a href="#"
               class="btn btn-info btn-sm float-left mr-1">
                <i class="fas fa-pencil-alt"></i>
            </a>

            <form
                action=""
                method="post" class="float-left">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('{{ __('admin-categories.Confirm deletion') }}')">
                    <i
                        class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>

    </tr>
    @if($categories->get($subcategory_id)->sub !== null)
        @include('admin.categories.subCategoryList',
            ['subcategories_id_array' => $categories->get($subcategory_id)->sub, 'depth' => $depth + 1])
    @endif
@endforeach
