@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-1">
            <h1>Blog Record</h1>
        </div>
        <div class="row">
            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark txt-white px-3 p-1" data-bs-toggle="modal"
                    data-bs-target="#blogModal">
                    Add Blog <i class="bi bi-plus"></i>
                </button>

                {{-- make this floatable mamaya --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

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

                                <form method="POST" data-action="{{ route('blog.create') }}" id="createBlogForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="inputTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="inputTitle" name="title_input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputTextArea" class="form-label">Description</label>
                                        <textarea class="form-control" style="height: 100px" id="inputTextArea" name="description_input"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputCateg">Category</label>
                                        <select class="form-select" id="inputCateg" name="category_input">
                                            <option value="">Choose...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputStatus">Status</label>
                                        <select class="form-select" id="inputStatus" name="status_input">
                                            <option value="">Choose...</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close<i
                                        class="bi bi-x"></i></button>
                                <button type="submit" class="btn btn-dark txt-white" data-bs-dismiss="modal"
                                    form="createBlogForm">Add Record<i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row p-2 py-2">
                    <table id="table" class="table table-striped table-hover caption-top p-3">
                        {{-- <caption class="h5 text-center fw-bold text-dark">Blog Records</caption> --}}
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td scope="row">{{ $blog->id }}</td>
                                    <td scope="row">{{ $blog->title }}</td>
                                    <td scope="row">{{ $blog->description }}</td>
                                    <td scope="row">{{ $blog->category->name }}</td>
                                    <td scope="row">{{ $blog->status->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toastSuccess" class="toast text-bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Success Input!!
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bsdismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script type="module">
        const form = '#createBlogForm'

        $(document).ready(function() {
            createBlog();
            printConsolse();
        })

        function printConsolse(){
            console.log('hello');
        }

        function createBlog() {
            // eto ung mangyayari after submitting ung form
            $(form).on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('blog.create') }}',
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(response) {
                        populateData(response);
                        resetField();

                        $('#toastSuccess').removeClass('d-none').fadeIn(100);
                        setTimeout(() => {
                            $('#toastSuccess').fadeOut(1000);
                        }, 5000);

                    },
                    error: function(response) {
                        console.log(response.responseJSON.message);
                    }
                })

                function populateData(response) {
                    var row = '<tr>';
                    row += '<td>' + response.id + '</td>';
                    row += '<td>' + response.title + '</td>';
                    row += '<td>' + response.description + '</td>';
                    row += '<td>' + response.category.name + '</td>';
                    row += '<td>' + response.status.status + '</td>';
                    // row += '<td>' + formatDate(response.created_at) + '</td>';

                    $('#table').find('tbody').prepend(row);
                }

                function resetField() {
                    $(form).find("input[type=text], textarea").val('');
                    $(form).find("option[selected]").prop('selected', true);
                }

            })
        }
    </script>
@endsection
