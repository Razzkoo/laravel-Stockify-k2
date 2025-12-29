@extends('layouts.auth')

@section('content')

<div class="w-full bg-white border border-gray-200 rounded-lg shadow p-6 lg:p-8">

    <h1 class="text-xl font-bold text-center mb-6">
        Daftar Akun
    </h1>

<form class="max-w-sm mx-auto">

  <!-- NAMA -->
  <div class="mb-5">
    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">
      Nama
    </label>
    <input
      type="text"
      id="name"
      class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
      placeholder="Nama lengkap"
      required
    />
  </div>

  <!-- ROLE (WAJIB) -->
  <div class="mb-5">
    <label for="role" class="block mb-2.5 text-sm font-medium text-heading">
      Role
    </label>
    <select
      id="role"
      class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs"
      required
    >
      <option value="" disabled selected>Pilih role</option>
      <option value="admin">Admin</option>
      <option value="staff">Staff</option>
      <option value="user">User</option>
    </select>
  </div>

  <!-- EMAIL -->
  <div class="mb-5">
    <label for="email" class="block mb-2.5 text-sm font-medium text-heading">
      Email
    </label>
    <input
      type="email"
      id="email"
      class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
      placeholder="name@email.com"
      required
    />
  </div>

  <!-- PASSWORD -->
  <div class="mb-5">
    <label for="password" class="block mb-2.5 text-sm font-medium text-heading">
      Password
    </label>
    <input
      type="password"
      id="password"
      class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
      placeholder=""
      required
    />
  </div>

  <!-- KONFIRMASI PASSWORD -->
  <div class="mb-6">
    <label for="password_confirmation" class="block mb-2.5 text-sm font-medium text-heading">
      Konfirmasi Password
    </label>
    <input
      type="password"
      id="password_confirmation"
      class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
      placeholder=""
      required
    />
  </div>

  <!-- BUTTON -->
  <button
    type="submit"
    class="w-full text-white rounded-lg bg-gradient-to-r from-indigo-400 via-indigo-400 to-indigo-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-base text-sm px-4 py-2.5 text-center leading-5"
  >
    Daftar
  </button>

  <!-- LINK KE LOGIN -->
<p class="mt-4 text-sm text-center text-body">
  Sudah punya akun?
  <a href="/auth/login" class="font-medium text-fg-brand hover:underline">
    Login
  </a>
</p>

</form>

@endsection