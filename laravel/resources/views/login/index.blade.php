<x-login-default>
    <form action="{{ route('loginSubmit') }}" method="POST" >
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-12 mb-2">
                    <h5>{{ env('APP_NAME') }} - Login</h5>
                </div>
                <div class="col-12">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Login" aria-label="Login" aria-describedby="basic-addon1" name="username" value="{{ old('username') }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                            </svg>
                        </span>
                        <input type="password" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="basic-addon1" name="password" value="{{ old('password') }}">
                    </div>
                </div>
                <div class="col-12">
                    @if ($errors->has('username'))
                        <div class="alert alert-danger">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-secondary w-100" onclick="window.location.href='{{ route('createLoginView') }}'">Cadastrar</button>
                </div>
            </div>
        </div>
    </form>
</x-login-default>