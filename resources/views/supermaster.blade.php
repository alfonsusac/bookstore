<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Amazing E-Book</title>
    <style>
        body {
            margin: 0;
            font-family:'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

            display:flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background-color:white;
            flex-direction: column;
        }
        div {
            padding: 12px;
        }
        .contentwrapper{
            max-width: 48em;
            padding: 24px;
        }
        .header{
            display:flex;
        }
        .header{
            display:flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .menu{
            display:flex;
            flex-direction: column;
            align-items:flex-end;
        }
        .menuitem{
            padding:4px 8px;
        }
        .menuitem:hover{
            background-color:black;
            color:white;
        }
        .title{
            font-size:4em;
            font-weight: 800;
        }
        .navbar{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0px 0px;
            border-bottom: solid black 1px;
            border-top: solid black 1px;
        }
        .navitem{
            padding:12px 16px;
        }
        .navitem:hover{
            background-color:black;
            color:white;
        }
        mark{
            background-color:black;
            color:white;
        }
        .bigbutton{
            padding: 8px 24px;
        }
        .bigbutton:before{
            content:'> ';
        }
        .bigbutton:hover{
            background-color:black;
            color:white;
        }
        .content{
            margin-bottom: 24px;
        }

        a{
            text-decoration: none;
        }
        a:link, a:visited{
            color:inherit;
        }
        .page-title{
            text-align:center;
            font-size:3em;
            font-weight:800;
        }
        form{
            display:flex;
            flex-direction:column;
        }
        form > div {
            display:flex;
            flex-wrap:wrap;
            flex: 1;
        }
        form > div > div{
            display:flex;
            flex-direction:column;
            flex: 1 1 auto;
        }
        input{
            display:block;
            width:auto;
            padding:16px;
            margin:16px 0px;
            border: solid black 1px;
            font-size:1.2em;
            background-color: white;
        }
        input:autofil{
            background-color:white;
        }
        button{
            width:100%;
            margin:16px 0px;
            padding: 16px;
            border:none;
            font-size:1.0em;
            font-weight:800;
            font-family: inherit;
            cursor: pointer;
        }
        button:hover{
            background-color:black;
            color:white;
        }
        .radioselect{
            position: relative;
            display:flex;
            align-items: stretch;
            width: 100%;
            padding: 0;
        }
        .radioselect input{
            z-index: 10;
            opacity: 0;
            width:0;
            height:0;
        }
        .radioselect label{
            z-index: 10;
            flex: 1;
            padding:16px;
        }
        .radiogender{
            display:flex;
        }
        .toggle{
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            background-color:khaki;
        }
        .radioselect input:checked + label{
            background-color:black;
            color:white;
        }
        select{
            padding: 16px;
            font-size: 1.2em;
        }
        .file{
            margin:0;
            width: 16em;
        }
        label{
            text-align: center;
            padding:24px 0px 8px 0px;
            font-size:1.2em;
        }
        .bookgrid{
            margin:auto;
            display:flex;
            flex-wrap: wrap;
            padding:0;
        }
        .book{
            /* border: black 1px solid; */
            width: 10em;
            /* flex: 1 1 0; */
            position:relative;
            isolation: isolate;
            background: white;
        }

        .hover{
            background-color:white;
            position:absolute;
            left:0;
            top:0;
            width:0%;
            height:0%;
            mix-blend-mode: difference;
            /* z-index: 10; */
            transition: width 0.2s;
        }
        .book:hover > .hover{
            width:100%;
            transition: width 0.2s;
            height:100%;
        }
        .booktitle, .bookauthor{
            padding: 4px;
            color:white;
            position: relative;
            mix-blend-mode: difference;
            font-weight: 200;
            /* z-index: 1; */
        }
        .booktitle{
            font-weight: 800;
            font-size: 2em;
            word-wrap:break-word;
            line-height: 1;
        }
        .bookdeatillabel{
            font-size:0.8em;
            vertical-align: bottom;
            text-align: right;
            text-transform: uppercase;
        }
        .bookdeatillabeldesc{
            font-size:0.8em;
            vertical-align: top;
            text-transform: uppercase;
        }
        .bookdetailtitle{
            font-size: 2em;
            font-weight: 800;
        }
        .bookdetailauthor{
            font-size: 1.6em;
            font-weight: 400;
            font-style: italic;
        }
        td{
            padding: 4px 10px;
        }
        .errorbanner{
            background-color:black;
            color:white;
            margin: 2px;
        }
        .cover{
            background-color:white;
            mix-blend-mode: difference;
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            z-index: 10;
            pointer-events: none;
        }
        .tablebutton{
            padding-top:0;
        }
        .tablebutton > button{
            margin:0;
        }
        .rolelabel{
            font-weight:600;
            padding:2px 0px;
        }
        .admin{
            font-weight:600;
            background-color:black;
            color:white;
            padding:2px 4px;
        }
        .footer{
            border-top:black solid 1px;
            display:flex;
            justify-content: space-between;
        }
        .localeselector{
            display:flex;
            margin:0;
            padding:0;
        }
        .localeselector > a > button{
            font-size:1em;
            padding :8px;
            margin:0;
            width: 40px;
        }
        .selected{
            background-color:black;
            color:white;
        }
    </style>
</head>
<body>
<div class="contentwrapper">
    @yield('content')
    <div class="footer">
        <footer> <small>&copy; Copyright 2022, Alfonsus Ardani 2301900555</small> </footer>
        <a href="{{url('en/locale')}}"><div class="localeselector">
            <button @if (App::currentlocale()=='en')
                class="selected"
            @endif>EN</button></a>
        <a href="{{url('id/locale')}}"><button @if (App::currentlocale()=='id')
            class="selected"
            @endif>ID</button></a>
        </div>

    </div>
</div>
</body>
</html>
