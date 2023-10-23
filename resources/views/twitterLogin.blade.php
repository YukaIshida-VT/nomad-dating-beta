@extends('layouts.app')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="bg-blue-900 rounded-lg shadow-xl p-12">

        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-current text-white w-24 h-24 inline-block">
                <path d="M0 0h24v24H0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
            </svg>
            <h1 class="text-white text-3xl pt-8 pb-12">積み上げアプリ</h1>
            <a class="w-full bg-gray-400 py-2 px-3 uppercase rounded text-blue-800 font-bold" href="{{ route('twitterLogin') }}">
                ツイーターログイン
            </a>
        </div>
    </div>
</div>