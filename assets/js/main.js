var movinApps = new Vue({
    el: '#app',
    data: {
        usuario: {},
        errors: {},
        editor: false,
        tareas: [],
        categorias: [
            {
                titulo: 'estudio',
                thumb: 'img/libro.png'
            },
            {
                titulo: 'trabajo',
                thumb: 'img/maletin.png'
            },
            {
                titulo: 'hogar',
                thumb: 'img/lavadora.png'
            },
            {
                titulo: 'mercado',
                thumb: 'img/refrigerador.png'
            },
            {
                titulo: 'viajes',
                thumb: 'img/carro.png'
            },
        ],
        categoriaActiva: false
    },
    beforeMount: function() {

        var vueObj = this;

        if ( phpSession ) {

            this.usuario = phpSession;

            $.ajax({
                url: "https://madmonkeystudio.com.co/todolist/tareas_ajax/" + this.usuario.id,
                method: "POST",                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                context: document.body
            }).done(function( data ) {
       
                vueObj.tareas = data;
       
                console.log( data );
       
            })
            .fail(function( error ) {
                console.log( error );
            });

        }

        console.log( this.usuario );

    },
    mounted: function() {

        var vueObj = this;

        $('.register-form').ajaxForm({
            dataType: 'json',
            beforeSubmit: function() {

                vueObj.errors = {};

                if ( !vueObj.usuario.nombre ) vueObj.errors.nombre = true;

                if ( !vueObj.usuario.email ) vueObj.errors.email = true;

                if ( !vueObj.usuario.password ) vueObj.errors.password = true;

                if ( vueObj.usuario.password !== vueObj.usuario.confirm_password ) vueObj.errors.confirm_password = true;

                vueObj.$forceUpdate();

                if ( !$.isEmptyObject( vueObj.errors ) ) return false; 

            },
            success: function( data ) { 

                console.log(data);
                
                if ( data == 'exito' ) {

                    alert('Cuenta creada exitósamente, ahora puedes ingresar!');

                    $('#register-pop').removeClass('open');

                    $('#login-pop').addClass('open');

                } else {

                    alert('El email ya está registrado');

                }

            }
        });

        $('.open-pop').on('click', function(e){

            $('.pop-wrapper.open').removeClass('open');

            $( $(this).attr('href') ).addClass('open');
      
            e.preventDefault();
      
        });
      
        $('.pop-wrapper').on('click', function(e){
      
            var $target = $(e.target);
      
            if ( $target.hasClass('pop-wrapper') ) {
      
                $(this).removeClass('open')
      
            }
      
        });
        
    },
    methods: {

        openCategoria: function(e) {

            var vueObj = this;

            var $target = $(e.target),
                $parent = $target.hasClass('cat-item') ? $target : $target.parents('.cat-item'),
                catIdex = $parent.index();

            var body = $("html, body");
            body.animate({scrollTop:0}, body.scrollTop() == 0 ? 0 : 300, 'swing', function() { 
               
                vueObj.categoriaActiva = vueObj.categorias[catIdex];

            });

        },

        verCategorias: function(e) {

            this.categoriaActiva = false;

            e.preventDefault();

        },

        enviarTarea: function(e) {

            e.preventDefault();

            var vueObj = this,
                $tareaInput = $('.nueva-tarea-input');

            var data = {
                    titulo: $tareaInput.val(),
                    categoria: this.categoriaActiva.titulo,
                    id_usuario: this.usuario.id
            };

            if ( !data.titulo.length ) return false;

            $.ajax({
                url: "https://madmonkeystudio.com.co/todolist/tareas/crear-tarea/",
                data: data,
                method: "POST",                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                context: document.body
            }).done(function( id_tarea ) {
    
                if ( id_tarea ) {

                    data.id = id_tarea;

                    vueObj.tareas.push( data );

                    $tareaInput.val('');

                }
      
            })
            .fail(function( error ) {
                console.log( error );
            });

        },
        borrarTarea: function(e) {

            e.preventDefault();

            var $target = $(e.target),
                $parent = $target.hasClass('tarea') ? $target : $target.parents('.tarea'),
                id_tarea = $parent.data('id');

            if ( $parent.hasClass('tachada') ) return;

            console.log( id_tarea );

            $.ajax({
                url: "https://madmonkeystudio.com.co/todolist/tareas/borrar/" + id_tarea,
                method: "POST",                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                context: document.body
            }).done(function( data ) {
       
                $parent.addClass('tachada');
       
                console.log( data );
       
            })
            .fail(function( error ) {
                console.log( error );
            });

        },
        contarTareas: function( categoria ) {

            var contador = 0;

            for (let index = 0; index < this.tareas.length; index++) {
                const tarea = this.tareas[index];

                if ( tarea.categoria == categoria ) contador++;
                
            }

            return contador;

        } 

    }
});





