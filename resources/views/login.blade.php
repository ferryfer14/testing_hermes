<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layout.css');
    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <form id="login_form">
                            <h3 class="text-center mb-5">Login</h3>
                            <div class="form-group mt-5">
                                <input type="text" name="username" placeholder="Username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input type="submit" value="LOGIN" class="form-control btn-primary col-md-3"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.js');
    {{ Html::script('js/login.js') }}
</body>
</html>