@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <h1>Blog Record</h1>
        </div>
        <div class="row">
            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark txt-white px-3 p-1" data-bs-toggle="modal" data-bs-target="#blogModal">
                    Add Blog <i class="bi bi-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalTitle" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="blogModalTitle">Add Blog Record</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form id="blogForm" method="POST" action="{{ route('blog.submit') }}"
                                    class="needs-validation">
                                        @csrf


                                    <div class="mb-3">
                                        <label for="inputTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="inputTitle" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputTextArea" class="form-label">Description</label>
                                        <textarea class="form-control" style="height: 100px" id="inputTextArea" required name="description"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputCateg">Category</label>
                                        <select class="form-select" id="inputCateg" name="category">
                                            <option selected>Choose...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputStatus">Status</label>
                                        <select class="form-select" id="inputStatus" name="status">
                                            <option selected>Choose...</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status['id'] }}">{{ $status['status'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close<i class="bi bi-x"></i></button>
                                <button type="submit" class="btn btn-dark txt-white" form="blogForm">Add Record<i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row p-2 py-2">
                <table class="table table-striped table-hover caption-top p-3">
                    {{-- <caption class="h5 text-center fw-bold text-dark">Blog Records</caption> --}}
                    <thead class="table-dark">
                        <tr>
                            @foreach ($columns as $column)
                            <th scope="col">{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $blog['id'] }}</th>
                            <th scope="row">{{ $blog['title'] }}</th>
                            <th scope="row">{{ $blog['description'] }}</th>
                            <th scope="row">{{ $blog['category_id'] }}</th>
                            <th scope="row">{{ $blog['status_id'] }}</th>
                            <th scope="row">{{ $blog['created_at'] }}</th>
                            <th scope="row">{{ $blog['updated_at'] }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>
@endsection
