@php
    $route = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Sholat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

    <div class="w-full max-w-2xl bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Cari Jadwal Sholat</h2>

        <form action="{{ route('prayer.show') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="date" value="{{ now()->format('Y-m-d') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-indigo-300 focus:outline-none"
                    required>
            </div>

            <div>
                <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Negara</label>
                <select name="country"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-indigo-300 focus:outline-none"
                    required>
                    <option value="">-- Pilih Negara --</option>
                    <option selected value="{{ $route !== 'prayer.show' ? $countries : $country }}">
                        {{ $route !== 'prayer.show' ? $countries : $country }}
                    </option>
                </select>
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                <select name="city"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-indigo-300 focus:outline-none"
                    required>
                    <option value="">-- Pilih Kota --</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                    Cari
                </button>
            </div>
        </form>

        @if ($route == 'prayer.show')
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">
                    Jadwal Sholat -
                    {{ $country }} ({{ $date }})
                </h2>

                <ul class="grid grid-cols-2 gap-4">
                    @foreach ($timings as $name => $time)
                        @if (
                            $name !== 'Sunset' &&
                                $name !== 'Midnight' &&
                                $name !== 'Firstthird' &&
                                $name !== 'Lastthird' &&
                                $name !== 'Sunrise')
                            <li class="bg-gray-50 border rounded-lg p-3 shadow-sm text-center">
                                <p class="text-sm text-gray-500">{{ $name }}</p>
                                <p class="text-lg font-bold text-indigo-600">{{ $time }}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</body>

</html>
