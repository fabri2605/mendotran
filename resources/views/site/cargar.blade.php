@extends('layouts.web')

    @section('titulo')
    <title> Dónde Cargo </title>
    @endsection

    @section('contenido')
    <style>
        #map {
            height: 100%;
            min-height: 600px;
            overflow: hidden;
        }
    </style>
    <main class="entry-main back-main-color" >
            <section class="blog" id="mapa">
                <div id="map"></div>
            </section>
        </main>
    @endsection
    @section('scripts')
        <script src="/js/site/donde-cargar.js"></script>
    @endsection