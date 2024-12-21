<x-auth-layout title="Register">
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/ks/logobg.png') }}" alt="looginpage" width="150"><img
                                    class="img-fluid for-dark" src="{{ asset('assets/images/ks/logobg.png') }}"
                                    alt="looginpage" width="150"></a></div>
                        <div class="login-main">
                            <form class="theme-form" id="form_login">
                                <h4>Create your account</h4>
                                <div class="form-group">
                                    <label class="col-form-label form-label-title ">Username</label>
                                    <input class="form-control" type="text" name="fullname" required=""
                                        placeholder="Masukkan Username Anda">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label form-label-title ">Email Address</label>
                                    <input class="form-control" type="email" name="email" required=""
                                        placeholder="Masukkan Email Anda">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label form-label-title ">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="Masukkan Password Anda">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label form-label-title ">Ulangi Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password_confirmation"
                                            required="" placeholder="*********">
                                        {{-- <div class="show-hide"><span class="show"></span></div> --}}
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    {{-- <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Agree with<a class="ms-2"
                                                href="#">Privacy Policy</a></label>
                                    </div> --}}
                                    <button type="submit" id="tombol_login"
                                        onclick="handle_post('#tombol_login','#form_login','{{ route('auth.register') }}','POST');"
                                        class="btn btn-primary btn-block w-100">
                                        Sign Up
                                    </button>
                                </div>
                                <p class="mt-4 mb-0">Already have an account?<a class="ms-2"
                                        href="{{ route('auth.index') }}">Sign
                                        in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
