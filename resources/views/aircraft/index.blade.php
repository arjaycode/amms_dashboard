<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='aircrafts'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <x-navbars.navs.auth titlePage="Manage Aircrafts"></x-navbars.navs.auth>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
          <div class="container-fluid d-flex justify-content-end">
            <a href="" class="btn btn-outline-success">Add New Aircraft</a>
          </div>
          <table class="table table-hover mx-3">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Model</th>
                <th scope="col">Date of Manufacture</th>
                <th scope="col">Manufacturer ID</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
          <x-footers.auth></x-footers.auth>
      </div>
  </main>
  <x-plugins></x-plugins>
</x-layout>