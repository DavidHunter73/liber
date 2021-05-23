<template>
  <div class="h-55 bg-blue-700 text-white text-center p-4">
    <!--LINK DE TAILWIND, IMPORTANTE QUITAR-->
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />

    <!--Link a la página home-->
    <router-link
      to="/dhernandez/ProyectoFinal/liber/Liber/public/"
      class="nav-link"
    >
      <img
        class="mx-auto"
        src="https://dawjavi.insjoaquimmir.cat/dhernandez/ProyectoFinal/liber/Liber/resources/js/img/Logo_White.png"
        alt="Logo Liber en blanco"
      />
    </router-link>

    <br />

    <!--Iconos de las redes sociales-->
    <div class="flex justify-center justify-evenly text-lg">
      <!--Icono de Github-->
      <div>
        <a href="https://github.com/"
          ><!--HAY QUE CAMBIAR ESTE LINK DE GITHUB AL DEL PROYECTO?-->
          <img
            class="mx-auto"
            src="https://dawjavi.insjoaquimmir.cat/dhernandez/ProyectoFinal/liber/Liber/resources/js/img/Logo_White.png"
            alt="Icono Github"
        /></a>
      </div>

      <!--Icono de Twitter-->
      <div>
        <a href="https://twitter.com/home">
          <img
            class="mx-auto"
            src="https://dawjavi.insjoaquimmir.cat/dhernandez/ProyectoFinal/liber/Liber/resources/js/img/Logo_White.png"
            alt="Icono Twitter"
        /></a>
      </div>

      <!--Icono de Instagram-->
      <div>
        <a href="https://www.instagram.com/">
          <img
            class="mx-auto"
            src="https://dawjavi.insjoaquimmir.cat/dhernandez/ProyectoFinal/liber/Liber/resources/js/img/Logo_White.png"
            alt="Icono Instagram"
        /></a>
      </div>

      <!--Icono de Facebook-->
      <div>
        <a href="https://es-es.facebook.com/">
          <img
            class="mx-auto"
            src="https://dawjavi.insjoaquimmir.cat/dhernandez/ProyectoFinal/liber/Liber/resources/js/img/Logo_White.png"
            alt="Icono Facebook"
        /></a>
      </div>
    </div>

    <br />

    <p>
      Hecha por Toni García y David Hernández. Todos los derechos reservados.
    </p>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
</style>
