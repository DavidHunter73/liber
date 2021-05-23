<template>
  <html lang="es">
    <head>
      <!--LINK DE TAILWIND, IMPORTANTE QUITAR-->
      <link
        href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
        rel="stylesheet"
      />
    </head>
    <body>
      <div class="w-full">
        <h1 class="text-center font-bold text-4xl">ERROR 404</h1>

        <!--Link a la página home-->
        <router-link
          to="/dhernandez/ProyectoFinal/liber/Liber/public/"
          class="nav-link"
        >
          <img
            class="mx-auto"
            src="https://dawjavi.insjoaquimmir.cat/dhernandez/ProyectoFinal/liber/Liber/resources/js/img/YouShallNotPass.png"
            alt="Error 404"
          />

          <br />

          <p class="text-center sm:text-2xl text-xl" lang="es">
            Vuelve sobre tus pasos antes de que sea demasiado tarde
          </p>
        </router-link>
      </div>
    </body>
  </html>
</template>

<script>
</script>

<style>
</style>