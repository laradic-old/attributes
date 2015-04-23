define([
    'jquery', 'fn/defined', 'fn/default', 'fn/cre', 'theme', 'datatable', 'Q', 'plugins/async', 'autoload',
    'plugins/jquery-rest', 'plugins/jquery-slugify'
], function( $, defined, def, cre, theme, datatable, Q, async, autoload ){
    var attr = {};

    attr.$el = null;

    var client = new $.RestClient('/admin/');
    client.add('attributes');
    client.show();

    attr.createAttributeEditor = function( id ){
        async.parallel({
            attribute: function(cb){
                if(!defined(id)){
                    return cb(null)
                }
                client.attributes.read(id).done(function(data, textStatus, xhrObject){
                    cb(null, data);
                });
            },
            template : function(cb){
                require(['laradic-admin/attributes/templates/editor'], function(template){
                    cb(null, template);
                });
            },
            $box    : function( cb ){
                theme.box('Editor', 'fa fa-pencil').then(function( $box ){
                    cb(null, $box);
                })
            },
            slideUp: function( cb ){
                if( !defined(attr.$right.$box) ){
                    return cb(null);
                }
                attr.$right.$box.fadeOut(function(){
                    attr.$right.$box.remove();
                    cb(null);
                });
            }
        }, function( err, results ){
            console.log('results', results);
            var $editor = $(results.template({
                values: results.attribute
            }));

            attr.$right.$box = results.$box;
            attr.$right.$box.$content.html($editor);
            attr.$right.$box.hide().appendTo(attr.$right).fadeIn();
            autoload.scan(attr.$right.$box);

        });

    };


    attr.createDatatable = function(){
        var nColNumber = -1;
        var datatableVars = datatable.getDefaultSSPVars({
            "columnDefs": [
                {targets: [ ++nColNumber ], 'title': 'ID', 'name': 'id', 'data': 'id'},
                {targets: [ ++nColNumber ], 'title': 'Label', 'name': 'label', 'data': 'label'},
                {targets: [ ++nColNumber ], 'title': 'Slug', 'name': 'slug', 'data': 'slug'},
                {targets: [ ++nColNumber ], 'title': 'Field Type', 'name': 'field_type', 'data': 'field_type'},
                {targets: [ ++nColNumber ], 'title': 'Description', 'name': 'description', 'data': 'description'},
                {targets: [ ++nColNumber ], 'title': 'Enabled', 'name': 'enabled', 'data': 'enabled'}
            ],
            "ajax"      : {
                "url": "/admin/attributes/datatable"
            }
        });
        return datatable.create(datatableVars);
    };

    attr.init = function( $el ){
        $el = $el || $('#attributes-container');
        var defer = Q.defer();

        attr.$el = $el.html('');
        attr.$row1 = cre().addClass('row').appendTo(attr.$el);
        attr.$left = cre().addClass('col-md-6').appendTo(attr.$row1);
        attr.$right = cre().addClass('col-md-6').appendTo(attr.$row1);

        console.warn('ATTR INIT');
        theme.box('Attributes', 'fa fa-pencil').then(function( $box ){
            attr.$left.$box = $box.appendTo(attr.$left);
            attr.createDatatable().then(function( $wrapper ){
                attr.$left.$wrapper = $wrapper.appendTo($box.$content);
                attr.$left.$table = $wrapper.$table;

                attr.$left.$table.on('click', 'tr', function( e ){
                    var $tr = $(this);
                    var id = parseInt($tr.children('td').first().text());

                    console.warn('clicked on tr, got id ', id);
                    attr.createAttributeEditor(id);
                });

                setTimeout(function(){
                    defer.resolve();
                }, 300);
            })
        });
        return defer.promise;
    };

    return attr;
});


