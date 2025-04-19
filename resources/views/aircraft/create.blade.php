<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='aircrafts'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <x-navbars.navs.auth titlePage="Add New Aircraft"></x-navbars.navs.auth>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
          <x-aircraft.content_nav></x-aircraft.content_nav>
            <div class="mx-3">
              <form action="{{ route('aircraft.store') }}" method="POST">
                @csrf 
                <div class="container d-flex flex-row gap-4">
                  {{-- Model Name --}}
                  <div class="mb-3 col">
                    <label for="model" class="form-label">Model Name:</label>
                    <input type="text" name="model" id="model" class="form-control bg-white px-1" required>
                  </div>
                  {{-- Date of Manufacture --}}
                  <div class="mb-3 col">
                    <label for="date_of_manufacture" class="form-label">Date of Manufacture:</label>
                    <input type="date" name="date_of_manufacture" id="date_of_manufacture" class="form-control bg-white px-1" required>
                  </div>
                </div>
                <div class="container d-flex flex-row gap-4">
                  {{-- Manufacturer Select --}}
                  <div class="mb-3 col">
                    <label for="manufacturer_id" class="form-label">Manufacturer:</label>
                    <select name="manufacturer_id" id="manufacturer_id" class="form-select bg-white px-1" required>
                      <option value="" disabled selected>Select a Manufacturer</option>
                      @foreach($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  {{-- Status Select --}}
                  <div class="mb-3 col">
                    <label for="status_id" class="form-label">Status:</label>
                    <select name="status_id" id="status_id" class="form-select bg-white px-1" required>
                      <option value="" disabled selected>Select a Status</option>
                      @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="container d-flex justify-content-center">
                  <button type="submit" class="btn btn-success m-0">Save Aircraft</button>
                </div>
              </form>
              {{-- Error Messages  --}}
              @if ($errors->any())
              <div class="container d-flex justify-content-start">
                <ul class="mt-5 list-group">
                  @foreach($errors->all() as $error)
                    <li class="list-group-item text-primary border border-warning">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
          <x-footers.auth></x-footers.auth>
      </div>
  </main>
  <x-plugins></x-plugins>
</x-layout>