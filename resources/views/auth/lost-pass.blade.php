@extends('layouts.auth')

@section('content')

<div class="w-full bg-white border border-gray-200 rounded-lg shadow p-6 lg:p-8">

  <h1 class="text-xl font-bold text-center mb-6">
    Lupa Password
  </h1>

  <p class="text-sm text-center text-body mb-6">
    Masukkan email yang terdaftar untuk menerima link reset password.
  </p>

  <form class="max-w-sm mx-auto">

    <!-- EMAIL -->
    <div class="mb-5">
      <label for="email" class="block mb-2.5 text-sm font-medium text-heading">
        Email
      </label>
      <input
        type="email"
        id="email"
        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow placeholder:text-body"
        placeholder="name@email.com"
        required
      />
    </div>

    <!-- BUTTON -->
    <button
      type="submit"
      class="w-full text-white rounded-lg bg-gradient-to-r from-indigo-400 via-indigo-400 to-indigo-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-base text-sm px-4 py-2.5 text-center leading-5"
    >
      Kirim Link Reset
    </button>

    <!-- BACK TO LOGIN -->
    <p class="mt-4 text-sm text-center text-body">
      Ingat password?
      <a href="/auth/login" class="text-fg-brand font-medium hover:underline">
        Login
      </a>
    </p>

  </form>

</div>

@endsection
