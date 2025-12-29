@extends('layouts.auth')

@section('content')

<div class="w-full bg-white border border-gray-200 rounded-lg shadow p-6 lg:p-8">

    <h1 class="text-2xl font-bold text-center mb-6">
        Login
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
          placeholder=""
          required
        />
      </div>

      <!-- EMAIL -->
      <div class="mb-5">
        <label for="email" class="block mb-2.5 text-sm font-medium text-heading">
          Your email
        </label>
        <input
          type="email"
          id="email"
          class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
          placeholder=""
          required
        />
      </div>

      <!-- PASSWORD -->
      <div class="mb-5">
        <label for="password" class="block mb-2.5 text-sm font-medium text-heading">
          Your password
        </label>
        <input
          type="password"
          id="password"
          class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
          placeholder=""
          required
        />
      </div>

      <!-- ROLE -->
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
          <option value="staff">Manajer Gudang</option>
          <option value="user">Staff Gudang</option>
        </select>
      </div>

      <!-- INGAT SAYA -->
      <div class="flex items-center justify-between mb-5">
  
  <!-- INGAT SAYA -->
  <label for="remember" class="flex items-center">
    <input
      id="remember"
      type="checkbox"
      class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
    />
    <span class="ms-2 text-sm font-medium text-heading select-none">
      Ingat saya
    </span>
  </label>

  <!-- LUPA PASSWORD -->
  <a
    href="/auth/lost-pass"
    class="text-sm font-medium text-fg-brand hover:underline"
  >
    Lupa password?
  </a>

</div>

      <!-- BUTTON -->
      <button
        type="submit"
        class="w-full text-white rounded-lg bg-gradient-to-r from-indigo-400 via-indigo-400 to-indigo-400 hover:bg-indigo-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-base text-sm px-4 py-2.5 text-center leading-5">
        Masuk
      </button>

      <p class="mt-4 text-sm text-center text-body">
   Belum punya akun?
  <a href="/auth/register" class="font-medium text-fg-brand hover:underline">
    Daftar
  </a>
</p>

    </form>

</div>

@endsection
