<div class="modal fade" id="newEventModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Create New Event
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('community.events.store') }}">
                @csrf
            <div class="modal-body">

                <div class="mb-3">
                    <label for="title" class="form-label">Event Title</label>
                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        id="title"
                        aria-describedby="helpId"
                        placeholder="Annual General Meeting"
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input
                        type="text"
                        class="form-control"
                        name="location"
                        id="location"
                        aria-describedby="helpId"
                        placeholder="event location"
                        required
                    />
                </div>



                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input
                                type="text"
                                class="form-control datepicker"
                                name="date"
                                id="date"
                                value="{{ now()->format('Y-m-d') }}"
                                placeholder="2025-01-01"
                                required
                            />
                        </div>

                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input
                                type="time"
                                class="form-control"
                                name="time"
                                id="time"
                                value="{{ date('H:i') }}"
                                placeholder="event time"
                                required
                            />
                        </div>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optional)</label>
                    <textarea
                        type="text"
                        class="form-control h-25"
                        name="description"
                        id="description"
                        placeholder="description"
                        required
                        rows="3"
                    ></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Create Event
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
