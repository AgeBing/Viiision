<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learn Laravel 5</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<div id="title" style="text-align: center;">
    <h1>ComVision</h1>
    <div style="padding: 5px; font-size: 16px;">ComVision</div>
</div>
<hr>
    <div id="content">
        <ul>
            @foreach ($spbfqs as $spbfq)
                <li style="margin: 50px 0;">
                    <div class="title">
                        <a href="{{ url('spbfq/'.$spbfq->id) }}">
                            <h4>{{ $spbfq->comment_place }}</h4>
                        </a>
                    </div>
                    <div class="body">
                        <p>{{ $spbfq->comment }}</p>
                    </div>
                    <div>
                        {{ $spbfq->score }}
                    </div>
                    <div>
                        {{ $spbfq->comment_time }}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</html>
