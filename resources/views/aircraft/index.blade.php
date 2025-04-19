<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='aircrafts'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <x-navbars.navs.auth titlePage="Manage Aircrafts"></x-navbars.navs.auth>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
        @if(session('success'))
          <div class="alert alert-success text-white" role="alert">
            {{ session('success')}}
          </div>
        @endif
          <x-aircraft.content_nav></x-aircraft.content_nav>
          <table class="table table-hover mx-3">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Aircraft Model</th>
                <th scope="col">Date of Manufacture</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($aircrafts as $aircraft)
                <tr>
                  <th scope="row">{{ $aircraft->id}}</th>
                  <td>{{ $aircraft->model }}</td>
                  <td>{{ $aircraft->date_of_manufacture }}</td>
                  <td>{{ $aircraft->manufacturer->name }}</td>
                  <td>{{ $aircraft->status->name }}</td>
                  <td class="d-flex flex-row justify-content-start gap-2"><a href="{{ route('aircraft.edit', $aircraft->id) }}}" class="btn btn-outline-secondary m-0" role="button">Edit</a>
                  <form action="{{ route('aircraft.destroy', $aircraft->id) }}" method="POST" class="d-flex flex-row">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary m-0">Delete</button>
                  </form></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="py-4">
            {{ $aircrafts->links()}}
          </div>
          <x-footers.auth></x-footers.auth>
      </div>
  </main>
  <x-plugins></x-plugins>
</x-layout>