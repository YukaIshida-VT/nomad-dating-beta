@extends('layouts.app')

<body>
@if (Auth::user())
<nav class="navbar navbar-expand-md navbar-light bg-blue-400 shadow-sm p-3">
    {{ Auth::user()->name }}さん
    <a class="w-full bg-gray-400 py-2 px-3 uppercase rounded text-blue-800 font-bold" 
        href="{{ route('twitterLogout') }}">
        ログアウト
    </a>
</nav>
@endif
<div id="app">
</div>
<!-- Scripts -->
</body>
</html>