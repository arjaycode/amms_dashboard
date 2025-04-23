<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='aircrafts'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <x-navbars.navs.auth titlePage="Deleted Aircrafts"></x-navbars.navs.auth>
      <!-- End Navbar -->
      <div class="container-fluid py-4 px-0">
        @if(session('success'))
          <div class="alert alert-success text-white" role="alert">
            {{ session('success')}}
          </div>
        @endif
          <x-aircraft.content_nav></x-aircraft.content_nav>
          <div class="mx-3">
            <h4>Deleted Aircrafts</h4>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center" scope="col">Tail Number</th>
                <th class="text-center" scope="col">Aircraft Model</th>
                <th class="text-center" scope="col">Manufacturer</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Deleted At</th>
                <th class="text-center" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($aircrafts as $aircraft)
                @if($aircraft->is_deleted == 1)
                  <tr>
                    <th class="align-middle text-center" scope="row">{{ $aircraft->tail_number}}</th>
                    <td class="align-middle text-center">{{ $aircraft->model }}</td>
                    <td class="align-middle text-center">{{ $aircraft->manufacturer->name }}</td>
                    <td class="align-middle text-center">{{ $aircraft->status->name }}</td>
                    <td class="align-middle text-center">{{ $aircraft->deleted_at }}</td>
                    <td class="d-flex flex-row justify-content-center gap-2 align-middle">
                    <form action="{{ route('aircraft.restore', $aircraft->id) }}" method="POST" class="d-flex flex-row">
                      @csrf 
                      @method('PUT')
                      <button type="submit" class="btn btn-outline-secondary m-0">Restore</button>
                    </form>
                    <form action="{{ route('aircraft.destroy', $aircraft->id) }}" method="POST" class="d-flex flex-row">
                      @csrf 
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-primary m-0">Delete Permanently</button>
                    </form></td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
          <div class="py-4 px-3">
            {{ $aircrafts->links()}}
          </div>
          <x-footers.auth></x-footers.auth>
      </div>
  </main>
  <x-plugins></x-plugins>
</x-layout>