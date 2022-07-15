<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="referrer" content="no-referrer">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <title> Sign In - Imgur</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=1138">


    <meta name="msapplication-TileImage" content="//s.imgur.com/images/favicon-144.png">
    <link rel="stylesheet" type="text/css" href="//s.imgur.com/min/global.css?1657555969">

    <link rel="stylesheet" type="text/css" href="//s.imgur.com/min/newregister.css?1657555969">


</head>

<body class="" data-new-gr-c-s-check-loaded="14.1068.0" data-gr-ext-installed="">
    <div class="signin-container">
        <div class="signin-callout text-center text-shadow">Sign In with</div>
        <div class="signin-social core-dark core-shadow br5">
            <a class="google   icon-google signin lvl1-dark br5 mr10 inline left" tabindex="4" href="/auth/google"
                id="Google"></a>
        </div>

        <div id="fade-content-break"><span class="fade-break"></span>
            <div class="signin-callout text-center text-shadow inline">or with Imgur</div><span
                class="fade-break fade-break-flip"></span>
            <form method="post" action="/login_submit">
                @csrf
                <div class="signin-imgur core-dark core-shadow br5">


                    <input title="Email" type="text" tabindex="5" name="email" maxlength="255" id="email"
                        class="br5 lvl1-dark valid placeholder" placeholder="Email">

                    <p class="password">
                        <input title="" type="password" tabindex="6" name="password" maxlength="255"
                            id="password" class="br5 last lvl1-dark placeholder" placeholder="Password">

                        <label class="forgot-password text-center">Password</a>
                    </p>

                    <input type="hidden" name="remember" value="remember">


                </div>

                <div class="signin-button">
                    <button class="btn btn-action right" name="submit" tabindex="8" type="submit">Sign In</button>

                    <div class="signin-register-link text-shadow right"><a href="/register">need an account?</a></div>
                    <div class="clear"></div>
                </div>

            </form>
        </div>
