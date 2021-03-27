@extends('layouts.admin')
@php
    $depth = 0;
@endphp
@section('content')
    <div class="content-wrapper" style="min-height: 1200.88px;">
        <div class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Parent Category</h3>
                    </div>
{{--                                            {{ dd($categories ) }}--}}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Categories</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $id => $category)
                                @if ($category->parent === null)
                                    @if ($category->sub !== null)
                                        <tr>
                                            <td class="root_category">
                                                {{$category->name}}
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
                                        @include('admin.categories.subCategoryList', ['subcategories_id_array' => $category->sub, 'depth' => $depth + 1])
                                    @else
                                        <tr>
                                            <td class="root_category">
                                                {{$category->name}}
                                            </td>
                                            <td>
                                                    <a href=""
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
                                    @endif
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
