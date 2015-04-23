@extends('laradic/admin::layouts.default')

@section('page-title')
    Attributes
@stop

@section('styles')
    @parent
    <style type="text/css">
        #attributes-container table.dataTable tbody tr:hover{
            cursor: pointer;
        }
    </style>
@stop

@section('scripts.init')
    @parent
    <script>
        (function(){
            var packadic = (window.packadic = window.packadic || {});
            packadic.mergeConfig({
                pageLoadedOnAutoloaded: false,
                requireJS: {
                    paths  : {
                        'laradic/attributes': '{{ Asset::url('laradic-admin/attributes::') }}'
                    }
                }
            });

            packadic.bindEventHandler('booted', function(){
                require(['theme', 'laradic-admin/attributes/attributes'], function(theme, attributes){
                    attributes.init($('#attributes-container')).then(function(){
                        packadic.removePageLoader();
                        console.warn('LOADED IN ', packadic.getElapsedTime(), ' seconds');
                    });
                })
            });
        }.call());
    </script>
@stop

{{-- Content --}}
@section('content')
<div id="attributes-container">
</div>
@stop
