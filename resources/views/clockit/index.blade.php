@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Time Tracking</h1>

        <!-- Display the records -->
        <table>
            <thead>
                <tr>
                    <th>Clock In</th>
                    <th>Clock Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->clock_in }}</td>
                        <td>{{ $record->clock_out }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Clock-in form -->
        <form action="{{ route('clockit.clockin') }}" method="post">
            @csrf
            <button type="submit">Clock In</button>
        </form>

        <!-- Clock-out form -->
        <form action="{{ route('clockit.clockout') }}" method="post">
            @csrf
            <button type="submit">Clock Out</button>
        </form>
    </div>
@endsection
