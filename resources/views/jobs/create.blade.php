<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new job listing</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Job title *</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" required placeholder="e.g. Software Engineer" />

                            <x-form-error name="title" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="salary">Salary *</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" required placeholder="e.g. £50,000 per year" />

                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>
                </div>
                {{-- PRINT ALL ERRORS --}}
                {{-- <div class="mt-10">
                @if ($errors->any())
                    <ul >
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 italic">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div> --}}
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button>Submit</x-form-button>

        </div>
    </form>

</x-layout>
