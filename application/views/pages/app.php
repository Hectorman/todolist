<?php
if (!isset($this->session->userdata['logged_in'])) {
  header("location: " . base_url());
}
?>
<?php $this->load->view('templates/header'); ?>


<!-- end of masterslider -->

<div id="app">

  <div class="content-wrapper">

    <transition name="slide-fade">

        <div v-if="!categoriaActiva" class="categorias nav-list">

            <div @click="openCategoria" class="cat-item" v-for="categoria in categorias">

                <img :src="'<?php echo base_url(); ?>assets/' + categoria.thumb" />

                <div>

                    <h2>{{ categoria.titulo }}</h2>

                    <p>{{ contarTareas( categoria.titulo ) }} {{ contarTareas( categoria.titulo ) == 1 ? 'tarea' : 'tareas' }}</p>

                </div>

            </div>

        </div>

    </transition>

    <transition name="slide-fade">

        <div v-if="categoriaActiva" class="single-categoria">

            <div class="volver">

                <a @click="verCategorias" href="#"><i class="icon-arrow-left"></i> Volver</a>

            </div>

            <header>

                <img :src="'<?php echo base_url(); ?>assets/' + categoriaActiva.thumb" />

                <div>

                    <p>{{ contarTareas( categoriaActiva.titulo ) }} tareas</p>

                    <h2>{{ categoriaActiva.titulo }}</h2>

                </div>

            </header>

            <div class="tareas">

                <div @click="borrarTarea" v-if="categoriaActiva.titulo == tarea.categoria" v-for="tarea in tareas" :data-id="tarea.id" :class="['tarea', tarea.eliminada && 'tachada']">

                    <i class="icon-checkbox-unchecked"></i>

                    <h3>{{ tarea.titulo }}</h3>

                </div>

            </div>

            <div class="nueva-tarea">

                <input type="text" class="nueva-tarea-input" placeholder="Agregar nueva tarea" />

                <a href="#" @click="enviarTarea" class="btn btn-primary">Enviar</a>

            </div>

        </div>

    </transition>

  </div>

</div>

<script>
    var phpSession = <?php echo json_encode( $session['logged_in'] ); ?>;
</script>

<?php $this->load->view('templates/footer'); ?>
