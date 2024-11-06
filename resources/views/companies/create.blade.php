<x-app-layout>
    <style>
        .custom-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            font-size: 1.2rem;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        /* Border and glow effect on hover */
        .custom-button:hover {
            background-color: #27ae60; /* Slightly lighter green */
            border-color: #1abc9c; /* Border color on hover */
            box-shadow: 0 0 10px rgba(26, 188, 156, 0.8); /* Glow effect */
        }

        /* Active state styling for click effect */
        .custom-button:active {
            transform: scale(0.98); /* Slightly shrink for a pressed effect */
            box-shadow: 0 0 8px rgba(26, 188, 156, 0.6);
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

    <div class="container mx-auto p-6 bg-black rounded-lg"> <!-- Background color is black -->

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-green-400">Company Name</label>
                <input type="text" name="name" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-green-400">Email</label>
                <input type="email" name="email" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="website" class="block text-green-400">Website</label>
                <input type="url" name="website" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="website" value="{{ old('website') }}">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-green-400">Address</label>
                <input type="text" name="address" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="address" value="{{ old('address') }}">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-green-400">Phone Number</label>
                <input type="text" name="phone" class="mt-1 block w-full rounded-md px-3 py-2 custom-input" id="phone" value="{{ old('phone') }}">
            </div>
           <div class="mt-10">
               <button type="submit" class="custom-button">Create a new Company</button>
           </div>
        </form>
    </div>
</x-app-layout>
