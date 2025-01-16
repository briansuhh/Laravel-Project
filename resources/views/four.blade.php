@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-lg-3 p-3">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div></div>
                <form method="POST" action="{{ route('login.submit') }}" class="border p-3">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-end pe-0">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-3 col-form-label text-end pe-0">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword3" name="password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a class="link-opacity-100" href="#">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 p-3">
                <h1 class="text-center">Pricing</h1>
                <p class="text-center px-5">
                    Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text
                    ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </p>
                <div class="row pt-5">
                    @foreach ($datas as $data)
                        <div class="col-lg-4 p-2">
                            <div class="card h-100">
                                <img src="{{ $data['picture'] }}" class="card-img h-100" alt="...">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class=""></div>

                <div class="row d-flex justify-content-center pt-5">
                    <div class="col-lg-10">
                        <table class="table table-striped table-hover caption-top p-3">
                            <caption class="h5 text-center fw-bold text-dark">Compare plans</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Free</th>
                                    <th scope="col">Pro</th>
                                    <th scope="col">Enterprise</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Public</th>
                                    <td><i class="bi bi-check-lg"></i></td>
                                    <td><i class="bi bi-check-lg"></i></td>
                                    <td><i class="bi bi-check-lg"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">Private</th>
                                    <td><i class="bi bi-check-lg"></i></td>
                                    <td><i class="bi bi-check-lg"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Permissions</th>
                                    <td></td>
                                    <td><i class="bi bi-check-lg"></i></td>
                                    <td><i class="bi bi-check-lg"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
