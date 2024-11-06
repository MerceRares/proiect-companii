<x-app-layout>
    <style>
        .custom-button {
            background-color: #04AA6D; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }
        .custom-button:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        </style>
    <style>
        .custom-input {
            border: 1px solid #ccc;
            background-color: #2c3e50;
            color: #ecf0f1;
            font-size: 1.2rem;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
    </style>

    <div class="container mx-auto p-6 bg-black rounded-lg">

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-white text-5xl mb-4">Edit Company</h1>
        <div class="mt-10"></div>

        <form action="{{ route('companies.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-green-400">Company Name</label>
                <input type="text" name="name" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="name" value="{{ old('name', $company->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-green-400">Email</label>
                <input type="email" name="email" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="email" value="{{ old('email', $company->email) }}" required>
            </div>

            <div class="mb-4">
                <label for="website" class="block text-green-400">Website</label>
                <input type="url" name="website" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="website" value="{{ old('website', $company->website) }}">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-green-400">Address</label>
                <input type="text" name="address" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="address" value="{{ old('address', $company->address) }}">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-green-400">Phone Number</label>
                <input type="text" name="phone" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="phone" value="{{ old('phone', $company->phone) }}">
            </div>

            <div class="mt-10">
                <button type="submit" class="custom-button">Update Company</button>
            </div>
        </form>
    </div>
</x-app-layout>
