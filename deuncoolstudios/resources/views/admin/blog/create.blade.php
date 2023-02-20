@extends('admin.layout.master')
@section('title', 'Blog')
@section('body')

                <!-- Main -->
                <div class="app-main__inner">

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Blog
                                    <div class="page-title-subheading">
                                        View, create, update, delete and manage.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="p-0 m-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="admin/blog" enctype="multipart/form-data">
                                        @csrf
                                        <div class="position-relative row form-group">
                                            <label for="image"
                                                class="col-md-3 text-md-center col-form-label">Image</label>
                                            <div class="col-md-9 col-xl-8">
                                                <img style="height: 200px; cursor: pointer;"
                                                    class="thumbnail rounded-circle" data-toggle="tooltip"
                                                    title="Click to change the image" data-placement="bottom"
                                                    src="dashboard/assets/images/add-image-icon.jpg" alt="Avatar">
                                                <input name="image" type="file" onchange="changeImg(this)"
                                                    class="image form-control-file" style="display: none;" value="">
                                                
                                                <small class="form-text text-muted">
                                                    Click on the image to change (required)
                                                </small>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="title" class="col-md-3 text-md-center col-form-label">Title</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="title" id="title" placeholder="Title" type="text"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="category" class="col-md-3 text-md-center col-form-label">Category</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="category" id="category" placeholder="Category" type="text"
                                                    class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="content"
                                                   class="col-md-3 text-md-center col-form-label">Content</label>
                                            <div class="col-md-9 col-xl-8">
                                                <textarea name="content" id="content" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="./admin/blog" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                    <span>Cancel</span>
                                                </a>

                                                <button type="submit"
                                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Save</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
                <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('content')
                </script>

@endsection