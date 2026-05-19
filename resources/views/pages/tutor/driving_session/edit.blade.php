@extends('layouts.tutor.tutor')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-4 p-md-5">

                    <div class="mb-4">

                        <h3 class="fw-bold mb-1">
                            Edit Driving Session
                        </h3>

                        <p class="text-muted mb-0">
                            Update driving session information
                        </p>

                    </div>

                    <form action="{{ route('tutor.driving-session.update', $session->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        {{-- STUDENT --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Student
                            </label>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $session->userPackage->user->name }}"
                                   readonly>

                        </div>

                        {{-- DATE --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Session Date
                            </label>

                            <input type="text"
                                   class="form-control"
                                   value="{{ \Carbon\Carbon::parse($session->session_date)->format('d M Y H:i') }}"
                                   readonly>

                        </div>

                        {{-- USED HOURS --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Used Hours
                            </label>

                            <input type="number"
                                   name="used_hours"
                                   value="{{ old('used_hours', $session->used_hours) }}"
                                   class="form-control">

                        </div>

                        {{-- STATUS --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Status
                            </label>

                            <select name="status"
                                    class="form-select">

                                <option value="scheduled"
                                    {{ $session->status == 'scheduled' ? 'selected' : '' }}>
                                    Scheduled
                                </option>

                                <option value="completed"
                                    {{ $session->status == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>

                                <option value="cancelled"
                                    {{ $session->status == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>

                            </select>

                        </div>

                        {{-- NOTE --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Notes
                            </label>

                            <textarea name="note"
                                      rows="4"
                                      class="form-control">{{ old('note', $session->note) }}</textarea>

                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex gap-2">

                            <button class="btn btn-warning px-4 rounded-pill fw-semibold">

                                Save Changes

                            </button>

                            <a href="{{ route('tutor.driving-session.index') }}"
                               class="btn btn-dark rounded-pill px-4">

                                Back

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection