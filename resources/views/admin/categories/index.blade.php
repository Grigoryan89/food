@extends('layouts.admin')

@section('content')
    <div class="content-wrapper" style="min-height: 1200.88px;">
        <div class="content">
            <div class="container-fluid">
                {{--               Add Category--}}
                <div class="card card-default collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="post" action="{{ route('add.category') }}">
                            @csrf @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Add Category</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Add Category">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>

                            </div>

                            <!-- /.row -->
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{--                Select Parent--}}
                <div class="card card-default collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Select Parent</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus  "></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('add.parent') }}">
                            @csrf @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" class="form-control select2bs4 select2-hidden-accessible"
                                                style="width: 100%;" aria-hidden="true">
                                            <option selected="selected">Select Parent Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select name="sub" class="form-control select2bs4 select2-hidden-accessible"
                                                style="width: 100%;" aria-hidden="true">
                                            <option selected="selected">Select SubCategory</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Parent</button>
                            </div>
                        </form>
                        <!-- /.row -->
                    </div>


                </div>

            </div>
        </div>
    </div>


@endsection
