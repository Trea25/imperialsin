<!DOCTYPE html>
<html>
    <head>
        <title>404</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
				background-image: url("/img/404.png");
				background-size: 100% 100%;
				background-repeat:no-repeat;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
			
			.boto{
				padding: 10px;			
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 10px;
				background: #CC4A00;
				border: 2px solid #762d00;
				border-radius: 3px;
				min-width: 100px;
				text-align: center;
}
        </style>
    </head>
    <body>
	<div class="boto"><a href="/">{{trans('messages.404_return')}}</a></div>
        <div class="container">
		
            <div class="content">		
               <!-- <div class="title"><b>404</b><br/>Ooops. Page not found</div> -->
            </div>
        </div>
    </body>
</html>
