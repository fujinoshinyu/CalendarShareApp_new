<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<title>HOME</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      </head>
      <body>
          <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             <x-primary-button class="ml-3">
            <a href='/calendar'>Fill Out Calendar!</a>
        </x-primary-button>
        </h2>
    </x-slot>
          <h1>HOME</h1>
          
          </x-app-layout>
      </body>
  </html>
