@extends('layouts.auth')

@section('content')

<div class="w-full bg-white border border-gray-200 rounded-lg shadow p-6 lg:p-8">

    <h1 class="text-xl font-bold text-center mb-6">
        Reset Password
    </h1>

<form class="max-w-sm mx-auto">
  <div class="mb-5">
    <label for="password baru" class="block mb-2.5 text-sm font-medium text-heading">Password baru</label>
    <input type="password baru" id="password" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow placeholder:text-body" placeholder="" required />
  </div>
  <div class="mb-5">
    <label for="konfirmasi password" class="block mb-2.5 text-sm font-medium text-heading">Konfirmasi Password</label>
    <input type="konfirmasi password" id="password" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow placeholder:text-body" placeholder="" required />
  </div>
  
  <!-- BUTTON -->
      <button
        type="submit"
        class="w-full text-white rounded-lg bg-gradient-to-r from-indigo-400 via-red-400 to-red-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-base text-sm px-4 py-2.5 text-center leading-5"
      >
        Reset Password
      </button>
</form>
</div>

@endsection