@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-lg-3 p-3">
                <form method="POST" data-action="{{ route('blog.add') }}" id="createBlogForm">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputTitle3" class="col-sm-3 col-form-label text-end pe-0">Title:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputTitle3" name="title_input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDescription3" class="col-sm-3 col-form-label text-end pe-0">Description:</label>
                        <div class="col-sm-9">
                            <input type="Description" class="form-control" id="inputDescription3" name="description_input">
                        </div>
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

                    <div class="row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 ">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <table id="table" class="table table-hover caption-top p-3">
                            <caption class="h5 text-center fw-3 text-dark">BLOG RECORDS</caption>
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
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
        })

        function createBlog() {
            $(form).on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('blog.add') }}',
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
                    row += '<td>' + response.title + '</td>';
                    row += '<td>' + response.description + '</td>';
                    row += '<td>' + response.category.name + '</td>';
                    row += '<td>' + response.status.status + '</td>';

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
