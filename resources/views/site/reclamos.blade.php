@extends('layouts.app')
@section('titulo')
<title> Reclamos y Sugerencias </title>


@endsection
@section('contenido')
<style>
        iframe:focus { 
            outline: none !important;
        }

        iframe[seamless] { 
            display: block !important;
        }
        iframe{
            width: 100% !important;
            height: 600px !important;
        }
    </style>
    <header class="active-navbar appsLand-header" id="home" style="background: #F8E82D !important; " >
        </header>
        <main class="entry-main back-main-color" >
                <section >
                    <div class="container">
                        <iframe src="/proxy" ></iframe>
                    </div>
                </section>
        </main>
@endsection
