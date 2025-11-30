@props(['title'])
    <!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{$title}}</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="description" content="Fashion based E-Commerce Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kushal Saha">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body id="body" class="flex bg-base-200 flex-col min-h-screen max-h-max">
