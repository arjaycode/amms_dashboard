<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='aircrafts'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <x-navbars.navs.auth titlePage="Add New Aircraft"></x-navbars.navs.auth>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
          <x-aircraft.content_nav></x-aircraft.content_nav>
            <div class="mx-3">
              {{-- Error Messages  --}}
              @if ($errors->any())
              <div class="container">
                <ul class="d-flex flex-column gap-2 justify-content-center mt-5 list-group rounded-2xl">
                  @foreach($errors->all() as $error)
                    <li class="list-group-item text-primary border border-warning">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <form class="mt-5" action="{{ route('aircraft.store') }}" method="POST">
                @csrf 
                <div class="container d-flex flex-row gap-4">
                  {{-- Tail Number --}}
                  <div class="mb-3 col">
                    <label for="tail_number" class="form-label">Tail Number:</label>
                    <input type="text" name="tail_number" id="tail_number" class="form-control bg-white px-1"
                    value="{{ old('tail_number') }}">
                  </div>
                  {{-- Manufacturer --}}
                  <div class="mb-3 col">
                    <label for="manufacturer_id" class="form-label">Manufacturer:</label>
                    <select name="manufacturer_id" id="manufacturer_id" class="form-select bg-white px-1">
                      <option value="" disabled selected>Select a Manufacturer</option>
                      @foreach($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}" {{ old('manufacturer_id') == $manufacturer->id ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="container d-flex flex-row gap-4">
                  {{-- Model Name --}}
                  <div class="mb-3 col">
                    <label for="model" class="form-label">Model Name:</label>
                    <input type="text" name="model" id="model" class="form-control bg-white px-1" value="{{ old('model') }}">
                  </div>
                  {{-- Year of Manufacture --}}
                  <div class="mb-3 col">
                    <label for="year_of_manufacture" class="form-label">Year of Manufacture:</label>
                    <input type="number" name="year_of_manufacture" id="year_of_manufacture" class="form-control bg-white px-1" 
                    value="{{ old('year_of_manufacture') ?? ' ' }}"
                    >
                  </div>
                </div>
                <div class="container d-flex flex-row gap-4">
                  {{-- Total Flight Hours --}}
                  <div class="mb-3 col">
                    <label for="total_flight_hours" class="form-label">Total flight hours:</label>
                    <input type="number" name="total_flight_hours" id="total_flight_hours" class="form-control bg-white px-1" 
                    min="0"
                    step="0.01"
                    value="{{ old('total_flight_hours') ?? ' ' }}">
                  </div>
                  {{-- Total Landings  --}}
                  <div class="mb-3 col">
                    <label for="total_landings" class="form-label">Total landings:</label>
                    <input type="number" name="total_landings" id="total_landings" class="form-control bg-white px-1" 
                    min="0"
                    value="{{ old('total_landings') ?? ' ' }}">
                  </div>
                </div>
                <div class="container d-flex flex-row gap-4">
                  {{-- Last Maintenance Date --}}
                  <div class="mb-3 col">
                    <label for="last_maintenance_date" class="form-label">Last maintenance date:</label>
                    <input type="date" name="last_maintenance_date" id="last_maintenance_date" class="form-control bg-white px-1"
                    value="{{ old('last_maintenance_date') ?? ' ' }}">
                  </div>
                  {{-- Next Maintenance Due --}}
                  <div class="mb-3 col">
                    <label for="next_maintenance_due" class="form-label">Next maintenance due:</label>
                    <input type="date" name="next_maintenance_due" id="next_maintenance_due" class="form-control bg-white px-1"
                    value="{{ old('next_maintenance_due') ?? ' ' }}">
                  </div>
                </div>
                <div class="container d-flex flex-row gap-4 justify-content-center">
                  {{-- Status --}}
                  <div class="mb-3 col-4">
                    <label for="status_id" class="form-label">Status:</label>
                    <select name="status_id" id="status_id" class="form-select bg-white px-2">
                      <option value="" selected disabled>Select Status</option>
                      @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="container d-flex justify-content-center">
                  <button type="submit" class="btn btn-success m-0">Save Aircraft</button>
                </div>
              </form>
            </div>
          <x-footers.auth></x-footers.auth>
      </div>
  </main>
  <x-plugins></x-plugins>
</x-layout>