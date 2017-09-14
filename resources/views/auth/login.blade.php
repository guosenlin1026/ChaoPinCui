<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel-Login</title>
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
		                <div class="panel-heading">管理员登录</div>
		                <div class="panel-body">
		                    <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
		                        {{ csrf_field() }}
		                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                            <label for="name" class="col-md-4 control-label">用户</label>
		                            <div class="col-md-6">
		                                <input id="email" type="text" class="form-control" name="user" value="{{ old('name') }}" required autofocus placeholder="用户名/邮箱/手机号">
		                                @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
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
		                            <div class="col-md-6 col-md-offset-4">
		                                <div class="checkbox">
		                                    <label>
		                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
		                                        记住我
		                                    </label>
		                                </div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-8 col-md-offset-4">
		                                <button type="submit" class="btn btn-primary">
		                                    登录
		                                </button>
		                                <a class="btn btn-link" href="{{ url('password/request') }}">
		                                    忘记密码?
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
