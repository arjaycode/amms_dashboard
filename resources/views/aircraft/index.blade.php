<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='aircrafts'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <x-navbars.navs.auth titlePage="Manage Aircrafts"></x-navbars.navs.auth>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
          <h1 class="mx-3">Hello madafakers</h1>
          <x-footers.auth></x-footers.auth>
      </div>
  </main>
  <x-plugins></x-plugins>
</x-layout>