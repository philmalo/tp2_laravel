<dialog id="modalConnexion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">@lang('lang.text_login')</h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('login.authentification') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <label for="email">@lang('lang.text_email')</label>
                        <input type="email" class="form-control mt-4" name="email" placeholder="@lang('lang.text_email_placeholder')" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <label for="password">@lang('lang.text_password')</label>
                        <input type="password" class="form-control mt-4" name="password" placeholder="@lang('lang.text_password_placeholder')">
                        @if($errors->has('password'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-footer d-grid mx-auto">
                        <input type="submit" value="@lang('lang.text_login')" class="btn btn-dark btn-block">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{ route('users.create') }}">Créer un compte</a>
            </div>
        </div>
    </div>
</dialog>