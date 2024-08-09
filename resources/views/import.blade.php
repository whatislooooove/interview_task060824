@extends('layouts.app')
@section('content')

            <main class="mt-6">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <form method="post" action="{{route('import.upload')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Выберите файл</label>
                            <input type="file" name="file" id="file" class="form-control">
                            <button type="submit" class="btn btn-success grid gap-6 lg:grid-cols-1 lg:gap-8 flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">Import</button>
                        </div>
                    </form>

                    <a
                        href="{{route('product.index')}}"
                        class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >

                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">Products</h2>
                        </div>
                    </a>
                </div>
            </main>
@endsection
