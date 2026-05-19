@extends('layouts.tutor.tutor')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <h3 class="fw-bold mb-4">
                Driving Sessions
            </h3>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>Student</th>
                            <th>Car</th>
                            <th>Package</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th width="220">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($sessions as $item)

                        <tr>

                            <td>
                                {{ $item->userPackage->user->name }}
                            </td>

                            <td>
                                {{ $item->userPackage->car->name }}
                            </td>

                            <td>
                                {{ ucfirst($item->userPackage->package->transmission_type) }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->session_date)->format('d M Y H:i') }}
                            </td>

                            <td>

                                @if($item->status == 'scheduled')

                                    <span class="badge bg-warning">
                                        Scheduled
                                    </span>

                                @elseif($item->status == 'completed')

                                    <span class="badge bg-success">
                                        Completed
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Cancelled
                                    </span>

                                @endif

                            </td>
                            
                            <td>
                                {{ $item->note ?? '-' }}

                            </td>

                            <td>

                            

                     

                                <a href="{{ route('tutor.driving-session.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('tutor.driving-session.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection