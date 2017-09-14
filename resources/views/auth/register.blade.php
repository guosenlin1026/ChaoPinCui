<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel-Register</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">管理员注册</div>
		                <div class="panel-body">
		                    <form class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
		                        {{ csrf_field() }}
		                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                            <label for="name" class="col-md-4 control-label">用户名</label>
		                            <div class="col-md-6">
		                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="6-18位的用户名">
		                                @if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                            <label for="name" class="col-md-4 control-label">邮箱</label>
		                            <div class="col-md-6">
		                                <input id="email" type="text" class="form-control" name="email" value="{{ old('name') }}" required autofocus placeholder="正确的邮箱格式">
		                                @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
		                            <label for="phone" class="col-md-4 control-label">手机</label>
		                            <div class="col-md-6">
		                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus placeholder="11位数字">
		                                @if ($errors->has('phone'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('phone') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                            <label for="password" class="col-md-4 control-label">密码</label>
		                            <div class="col-md-6">
		                                <input id="password" type="password" class="form-control" name="password" required placeholder="6-18位的密码">
		                                @if ($errors->has('password'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                       <div class="form-group">
		                            <label for="password-confirm" class="col-md-4 control-label">重复密码</label>
		                            <div class="col-md-6">
		                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="重复输入密码">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-8 col-md-offset-4">
		                                <button type="submit" class="btn btn-primary">
		                                    注册
		                                </button>
		                                <a class="btn btn-link" href="{{ url('login') }}">
		                                    有账号，去登录
		                                </a>
		                            </div>
		                        </div>
		                        
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    </div>
</body>
</html>
