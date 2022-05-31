@extends('layouts.app')

@section('title','ログインフォーム')

@section('content')
    <div class="main-container">
        <div class="row justify-content-center">
            <div class="user-infomation-contents">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="user-infomation-title">
                    login
                    </div>                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" autocomplete="email">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" autocomplete="new-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="">
                            <div class="login">
                                <button type="submit" class="btn btn-dark user-infomation-login-button">
                                    {{ __('login') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="register">
            <div class="registerurl">会員でない方はこちら&emsp;<a href="{{ url('/register') }}">新規会員登録</a></div>
        </div>
    </div>
</div>
@endsection
