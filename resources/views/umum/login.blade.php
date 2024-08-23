@extends('umum.layout.app')

@section('content')

<main id="main">
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Login</h2>
                    <p>ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ</p>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="/tpq-baitijannati" style="color: #7cc576">Home</a>
            <span class="mx-3 fas fa-chevron-right"></span>
            <span class="current">Login</span>
        </div>
    </div>

    <form action="/loginproses" method="POST">
        @csrf
        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-lg"
                                    value="{{ old('username') }}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="pword">Password</label>
                                <input type="password" name="password" id="pword" class="form-control form-control-lg">

                                @if ($errors->has('password'))
                                    <div id="passwordError" class="alert alert-danger mt-2">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif

                                <p class="forgot-password"><a href="#" data-toggle="modal"
                                        data-target="#resetPasswordModal">Lupa Password?</a></p>

                                <!-- Modal -->
                                <div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Melupakan Password?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Silahkan menghubunggi Admin TPQ Baiti Jannati.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn"
                                    style="background-color: #7cc576; color: #ffffff !important;">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection