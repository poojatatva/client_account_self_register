<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="referrer" content="no-referrer">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <title> Register - Imgur</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=1138">
    <meta name="robots" content="follow, index">
    <meta name="description" content="Imgur is the easiest way to discover and enjoy the magic of the Internet.">
    <meta name="copyright" content="Copyright 2022 Imgur, Inc.">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;">

    <meta name="msapplication-TileColor" content="#2cd63c">
    <meta name="msapplication-TileImage" content="//s.imgur.com/images/favicon-144.png">
    <link rel="stylesheet" type="text/css" href="//s.imgur.com/min/global.css?1657555969">


    <link rel="stylesheet" type="text/css" href="//s.imgur.com/min/newregister.css?1657555969">

    <!--[if IE 9]><link rel="stylesheet" href="//imgur.com/include/css/ie-sucks.css?0" type="text/css" /><![endif]-->

    <link rel="canonical" href="https://imgur.com/register?redirect=%2FkGE5vEJ">
    <meta property="og:url" content="https://imgur.com/register?redirect=%2FkGE5vEJ">

    <link rel="alternate" media="only screen and (max-width: 640px)"
        href="https://m.imgur.com/register?redirect=%2FkGE5vEJ">
</head>

<body class="" data-new-gr-c-s-check-loaded="14.1068.0" data-gr-ext-installed="">


    <div class="signin-container">

        <form method="post" action="/register">
            @csrf
            <div class="register-form register-two-step">
                <div class="register-step-one register-visible">
                    <div class="signin-callout text-center text-shadow">Register with</div>
                    <div class="signin-social core-dark core-shadow br5">
                        <a class="google icon-google signin lvl1-dark br5 mr10 inline left" tabindex="4"
                            href="/auth/google" id="Google"></a>
                    </div>
                    <div class="signin-imgur-register core-dark core-shadow br5">


                        <div class="error-phone-verification error nodisplay">
                            <p class="error-msg"></p>
                            <div class="learn-more">Can't register? <a
                                    href="https://help.imgur.com/hc/en-us/articles/360028910652">Learn more.</a></div>
                        </div>
                        <input type="text" tabindex="5" name="name" maxlength="255" id="name"
                            class="br5 lvl1-dark" placeholder="name" required>
                        <input type="text" tabindex="6" name="email" maxlength="255" id="email"
                            class="br5 lvl1-dark" placeholder="Email" required>
                        <input type="password" tabindex="7" name="password" maxlength="255" id="password"
                            class="br5 lvl1-dark" placeholder="Password" required>
                        <input type="password" tabindex="8" name="password_confirm" maxlength="255"
                            id="password_confirm" class="br5 lvl1-dark" placeholder="Retype Password" required>


                    </div>
                    <button class="btn btn-action right" name="submit" tabindex="8" type="submit">Register</button>
                </div>
            </div>

        </form>
    </div>
</body>

</html>
